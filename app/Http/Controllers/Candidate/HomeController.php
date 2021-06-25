<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\Curriculum;
use App\Models\Inscripcion;
use App\Models\Oferta;
use App\Models\User;
use App\Models\UserExtra;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
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
        $ofertas = Oferta::select('ofertas.id', 'users.nombre', 'oferta_inscripciones.created_at', 'ofertas.localizacion', 'ofertas.titulo', 'oferta_tipo.nombre as ofertaTipo', 'oferta_inscripciones.status', 'oferta_inscripciones.updated_at')->join('oferta_inscripciones', 'oferta_inscripciones.idOferta', 'ofertas.id')->join('users', 'users.id', 'ofertas.empresa_id')
            ->join('oferta_tipo', 'oferta_tipo.id', 'ofertas.tipo')->where('oferta_inscripciones.idUsuario', Auth::user()->id)->orderBy('oferta_inscripciones.updated_at', 'DESC')->take(5)->get();

        $tOferta = Inscripcion::where('idUsuario', Auth::user()->id)->count();
        $tOferta1 = Inscripcion::where('idUsuario', Auth::user()->id)->where('status', 1)->count();
        $tOferta2 = Inscripcion::where('idUsuario', Auth::user()->id)->where('status', 2)->count();

        return view('candidate.index', ['ofertas' => $ofertas, 'tOferta' => $tOferta, 'tOferta1' => $tOferta1, 'tOferta2' => $tOferta2]);
    }

    public function ofertas()
    {
        $ofertas = Oferta::select('ofertas.id', 'users.nombre', 'users.email', 'oferta_inscripciones.created_at', 'ofertas.localizacion', 'ofertas.titulo', 'oferta_tipo.nombre as ofertaTipo', 'oferta_inscripciones.status')->join('oferta_inscripciones', 'oferta_inscripciones.idOferta', 'ofertas.id')->join('users', 'users.id', 'ofertas.empresa_id')
            ->join('oferta_tipo', 'oferta_tipo.id', 'ofertas.tipo')->where('oferta_inscripciones.idUsuario', Auth::user()->id)->paginate(5);

        return view('candidate.ofertas', ['ofertas' => $ofertas]);
    }

    public function cuenta()
    {
        $infoE = UserExtra::where('user_id', Auth::user()->id)->first();

        return view('candidate.ajustes', ['infoE' => $infoE]);
    }

    public function cuentaP(Request $request)
    {
        try {
            $this->validate($request, [
                'nombre' => 'required',
                'apellidos' => 'required',
                'email' => 'required',
                'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'upload' => 'file|mimes:pdf',
            ]);

            $cv = $request->file('upload');
            $cvN = null;

            if ($cv) {
                $cvN = time() . str_replace(' ', '', $cv->getClientOriginalName());
                Storage::disk('cv')->put($cvN, File::get($cv));

                UserExtra::where('user_id', Auth::user()->id)->update(array('nacionalidad' => $request->nacionalidad, 'ficheros' => $cvN));
            } else {
                UserExtra::where('user_id', Auth::user()->id)->update(array('nacionalidad' => $request->nacionalidad));
            }

            $avatar = $request->file('avatar');
            $avatarN = null;

            if ($avatar) {
                $avatarN = time() . $avatar->getClientOriginalName();
                Storage::disk('avatar')->put($avatarN, File::get($avatar));

                User::where('id', Auth::user()->id)->update(array('nombre' => $request->nombre, 'apellidos' => $request->apellidos, 'email' => $request->email, 'telf' => $request->telf, 'image_profile' => $avatarN));
            } else {
                User::where('id', Auth::user()->id)->update(array('nombre' => $request->nombre, 'apellidos' => $request->apellidos, 'email' => $request->email, 'telf' => $request->telf));
            }

            return back()->with('success', 'Usuario guardado correctamente');
        } catch (Exception $e) {
            return back()->with('error', 'Error al guardar el usuario');
        }
    }

    public function usuario_eliminarCV($id)
    {
        UserExtra::where('user_id', $id)->update(array('ficheros' => null));
        return back();
    }

    public function previewCV()
    {
        $user = UserExtra::where('user_id', Auth::user()->id)->get();

        return response()->file(storage_path("app/cv/{$user[0]->ficheros}"));
    }
}
