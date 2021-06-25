<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Mail\EstadoCV;
use App\Mail\MensajeEmail;
use App\Models\Empresa;
use App\Models\Inscripcion;
use App\Models\Message;
use App\Models\Oferta;
use App\Models\OfertaCategoria;
use App\Models\OfertaTipo;
use App\Models\User;
use App\Models\UserExtra;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            App::setLocale(session('locale'));
            if (Auth::user()->email_verified_at)
                return $next($request);
            else
                return redirect()->route('home.inicio');
        });
    }

    public function home()
    {
        $tOfertas = Oferta::where('empresa_id', Auth::user()->id)->count();
        $tOfertasCandidatos = Inscripcion::where('ofertas.empresa_id', Auth::user()->id)->join('ofertas', 'ofertas.id', 'oferta_inscripciones.idOferta')->count();

        return view('business.index', ['tOfertas' => $tOfertas, 'tOfertasCandidatos' => $tOfertasCandidatos]);
    }

    public function ofertas()
    {
        $tOfertas = Oferta::where('empresa_id', Auth::user()->id)->count('id');
        $ofertas = Oferta::select('ofertas.id', 'titulo', 'localizacion', 'ofertas.created_at as publicado', 'nombre')->join('users', 'users.id', '=', 'empresa_id')->where('empresa_id', Auth::user()->id)->get();

        $inscripciones = DB::select("SELECT id, idOferta, count(*) as total FROM oferta_inscripciones GROUP BY idOferta");

        return view('business.ofertas.index', ['tOfertas' => $tOfertas, 'ofertas' => $ofertas, 'inscripciones' => $inscripciones]);
    }

    public function publicarOferta()
    {
        $tOfertas = Oferta::where('id', Auth::user()->id)->count('id');

        $cat = OfertaCategoria::get();
        $tip = OfertaTipo::get();

        return view('business.ofertas.publicar', ['tOfertas' => $tOfertas, 'cat' => $cat, 'tip' => $tip]);
    }

    public function guardarOferta(Request $request)
    {
        $validate = $this->validate($request, [
            'titulo' => 'required',
            'tipo' => 'required',
            'categoria' => 'required',
            'localizacion' => 'required',
            'descripcion' => 'required',
        ]);

        $oferta = new Oferta();
        $oferta->empresa_id = Auth::user()->id;
        $oferta->titulo = $request->titulo;
        $oferta->tipo = $request->tipo;
        $oferta->categoria = $request->categoria;
        $oferta->descripcion = $request->descripcion;
        $oferta->localizacion = $request->localizacion;
        $oferta->salario_min = $request->salMin;
        $oferta->salario_max = $request->salMax;
        $oferta->save();

        return back()->with('success', 'Oferta de trabajo publicada correctamente');
    }

    public function cuenta()
    {
        $infoE = Empresa::where('user_id', Auth::user()->id)->first();
        return view('business.ajustes', ['infoE' => $infoE]);
    }

    public function cuentaP(Request $request)
    {
        try {
            $avatar = $request->file('avatar');
            $avatarN = null;

            if ($avatar) {
                $avatarN = time() . $avatar->getClientOriginalName();
                Storage::disk('avatar')->put($avatarN, File::get($avatar));

                User::where('id', Auth::user()->id)->update(array('nombre' => $request->nombre, 'apellidos' => $request->apellidos, 'email' => $request->email, 'telf' => $request->telf, 'image_profile' => $avatarN));
            } else {
                User::where('id', Auth::user()->id)->update(array('nombre' => $request->nombre, 'apellidos' => $request->apellidos, 'email' => $request->email, 'telf' => $request->telf));
            }

            Empresa::where('user_id', Auth::user()->id)->update(array('ident_fis' => $request->ident_fis));

            return back()->with('success', 'Usuario guardado correctamente');
        } catch (Exception $e) {
            return back()->with('error', 'Error al guardar el usuario');
        }
    }

    public function ofertaCandidatos($id)
    {
        $inscripciones = Inscripcion::where('idOferta', $id)->groupBy('idOferta')->count();

        $candidatos = User::select('users.id', 'users.nombre', 'users.image_profile', 'users.email', 'users.telf', 'oferta_inscripciones.presentacion', 'ficheros', 'oferta_inscripciones.idOferta', 'oferta_inscripciones.status')->join('oferta_inscripciones', 'oferta_inscripciones.idUsuario', '=', 'users.id')->join('info_user', 'user_id', 'users.id')->where('idOferta', $id)->groupBy('users.id')->get();

        return view('business.ofertas.candidatos', ['candidatos' => $candidatos, 'inscripciones' => $inscripciones, 'oferta' => $id]);
    }

    public function mensaje(Request $request)
    {
        try {
            $messages = new Message();
            $messages->sender_id = Auth::user()->id;
            $messages->receiver_id = $request->user;
            $messages->message = $request->mensaje;
            $messages->save();

            $user = User::find($request->user);

            $data = ['message' => $request->mensaje, 'subject' => Auth::user()->nombre . '' . Auth::user()->apellidos, 'idOferta' => $request->oferta];

            Mail::to($user->email)->send(new MensajeEmail($data));

            if ($user->status <= 2) {
                Inscripcion::where('idOferta', $request->oferta)->where('idUsuario', $request->user)->update(array('status' => 2));
            }

            return back()->with('success', 'Mensaje enviado correctamente');
        } catch (Exception $e) {
            return back()->with('error', 'Error al enviar el mensaje');
        }
    }

    public function previewCV($id, $idUser)
    {
        $user = UserExtra::where('user_id', $idUser)->get();

        $oferta = Oferta::join('users', 'users.id', 'ofertas.empresa_id')->find($id);

        if ($user[0]->status <= 1) {
            $u = User::find($idUser);

            $data = ['message' => "$oferta->nombre ha leido su CV", 'subject' => $u->nombre . '' . $u->apellidos, 'oferta' => $id];

            Mail::to($u->email)->send(new EstadoCV($data));

            Inscripcion::where('idOferta', $id)->where('idUsuario', $idUser)->update(array('status' => 1));
        }

        return response()->file(storage_path("app/cv/{$user[0]->ficheros}"));
    }

    public function seleccionarCandidato($id, $idUser)
    {
        $user = UserExtra::where('user_id', $idUser)->get();

        $oferta = Oferta::join('users', 'users.id', 'ofertas.empresa_id')->find($id);

        if ($user[0]->status <= 1) {
            $u = User::find($idUser);

            $data = ['message' => "$oferta->nombre has sido seleccionado para la oferta de trabajo", 'subject' => $u->nombre . '' . $u->apellidos, 'oferta' => $id];

            Mail::to($u->email)->send(new EstadoCV($data));

            Inscripcion::where('idOferta', $id)->where('idUsuario', $idUser)->update(array('status' => 3));
        }

        return back();
    }

    public function eliminarCandidato($id, $idUser)
    {
        $user = UserExtra::where('user_id', $idUser)->get();

        $oferta = Oferta::join('users', 'users.id', 'ofertas.empresa_id')->find($id);

        if ($user[0]->status <= 1) {
            $u = User::find($idUser);

            $data = ['message' => "$oferta->nombre ha descatado su CV.", 'subject' => $u->nombre . '' . $u->apellidos, 'oferta' => $id];

            Mail::to($u->email)->send(new EstadoCV($data));

            Inscripcion::where('idOferta', $id)->where('idUsuario', $idUser)->update(array('status' => 4));
        }

        return back();
    }

    public function ofertaEditar($id)
    {
        $oferta = Oferta::find($id);
        $cat = OfertaCategoria::get();
        $tip = OfertaTipo::get();

        return view('business.ofertas.editar', ['oferta' => $oferta, 'cat' => $cat, 'tip' => $tip]);
    }

    public function ofertaEliminar($id)
    {
        try {
            Oferta::find($id)->delete();
            return back()->with('success', 'Oferta eliminada correctamente');
        } catch (Exception $e) {
            return back()->with('error', 'La oferta que esta intentado borrar no existe');
        }
    }

    public function ofertaEditarU(Request $request, $id)
    {
        try {
            Oferta::where('id', $id)->update(array('titulo' => $request->titulo, 'localizacion' => $request->localizacion, 'descripcion' => $request->descripcion, 'tipo' => $request->tipo, 'categoria' => $request->categoria, 'salario_min' => $request->salario_min, 'salario_max' => $request->salario_max,));

            return back()->with('success', 'Oferta actualizada correctamente');
        } catch (Exception $e) {
            return back()->with('error', 'Error al actualizar la oferta');
        }
    }
}
