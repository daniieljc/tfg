<?php

namespace App\Http\Controllers;

use App\Mail\ContactoEmail;
use App\Models\Articulo;
use App\Models\CategoriaArticulo;
use App\Models\Inscripcion;
use App\Models\Oferta;
use App\Models\OfertaCategoria;
use App\Models\OfertaTipo;
use App\Models\User;
use App\Models\UserExtra;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            App::setLocale(session('locale'));
            return $next($request);
        });
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {

        $articulos = Articulo::select('articulos.id as idA', 'categorias_articulos.nombre as nombreCategoria', 'titulo', 'descripcion', 'portada', 'articulos.created_at')->join('categorias_articulos', 'categorias_articulos.id', '=', 'categoria_id')->orderBy('idA', 'DESC')->take(3)->get();

        $oferta_categoria = DB::select("SELECT oferta_categoria.id, oferta_categoria.nombre, COUNT(*) as total FROM oferta_categoria INNER JOIN ofertas ON ofertas.categoria = oferta_categoria.id GROUP BY oferta_categoria.id LIMIT 4");

        $oferT = Oferta::count();
        $userT = User::where('role', '1')->count();
        $businessT = User::where('role', '2')->count();

        return view('home.index', ['articulos' => $articulos, 'oferta_categoria' => $oferta_categoria, 'userT' => $userT, 'businessT' => $businessT, 'oferT' => $oferT]);
    }

    public function ofertas(Request $request)
    {
        if (!Auth::user()) return redirect('login');

        $ofertas = Oferta::select('oferta_tipo.nombre as tipoN', 'users.image_profile', 'ofertas.id as idO', 'ofertas.titulo', 'ofertas.descripcion', 'ofertas.localizacion', 'salario_min', 'salario_max', 'ofertas.created_at', 'tipo', 'categoria')->join('users', 'users.id', '=', 'empresa_id')->join('oferta_tipo', 'oferta_tipo.id', 'ofertas.tipo');

        if ($request->get('local') != null) {
            $ofertas = $ofertas->where('ofertas.localizacion', 'LIKE', "%" . $request->get('local') . "%");
        }

        if ($request->get('titulo') != null) {
            $ofertas = $ofertas->where('ofertas.titulo', 'LIKE', "%" . $request->get('titulo') . "%");
        }

        if ($request->get('categoria') != null) {
            $ofertas = $ofertas->where('ofertas.categoria', 'LIKE', "%" . $request->get('categoria') . "%");
        }

        if ($request->get('tipo') != null) {
            $ofertas = $ofertas->where('ofertas.tipo', 'LIKE', "%" . $request->get('tipo') . "%");
        }

        if ($request->get('salario_min') != null && $request->get('salario_max') != null) {
            $ofertas = $ofertas->where('ofertas.salario_min', '>=', $request->get('salario_min'))->where('ofertas.salario_max', '<=', $request->get('salario_max'));
        }

        $ofertas = $ofertas->orderBy('ofertas.id', 'desc')->paginate(15);

        $tipoTrabajo = OfertaTipo::get();
        $categoriaTrabajo = OfertaCategoria::get();

        return view('home.ofertas.index', ['ofertas' => $ofertas, 'tipoTrabajo' => $tipoTrabajo, 'categoriaTrabajo' => $categoriaTrabajo]);
    }

    public function noticias(Request $request)
    {
        $noticiasF = Articulo::where('featured', '=', '1')->count();

        $noticias = Articulo::select('articulos.id as idA', 'nombre', 'categorias_articulos.id as idCat', 'articulos.created_at as fecha', 'descripcion', 'titulo', 'portada', 'status', 'featured')->join('categorias_articulos', 'categorias_articulos.id', '=', 'categoria_id');

        if ($request->get('categoria') != null) {
            $noticias = $noticias->where('categorias_articulos.id', $request->get('categoria'));
        }

        $noticias = $noticias->orderBy('idA', 'DESC')->paginate(5);

        $noticiaR = Articulo::inRandomOrder()->take(3)->get();

        $categorias = CategoriaArticulo::get();

        return view('home.noticias.index', ['noticias' => $noticias, 'noticiasF' => $noticiasF, 'categorias' => $categorias, 'noticiaR' => $noticiaR]);
    }

    public function noticia($id)
    {
        $noticias = Articulo::join('categorias_articulos', 'categorias_articulos.id', 'categoria_id')->find($id);

        $categorias = CategoriaArticulo::get();

        $noticiaN = Articulo::find($id + 1);
        $noticiaA = Articulo::find($id - 1);
        $noticiaR = Articulo::inRandomOrder()->take(3)->get();

        return view('home.noticias.noticia', ['noticias' => $noticias, 'categorias' => $categorias, 'noticiaN' => $noticiaN, 'noticiaA' => $noticiaA, 'noticiaR' => $noticiaR]);
    }

    public function oferta($id)
    {
        $oferta = Oferta::select('ofertas.id', 'titulo', 'descripcion', 'localizacion', 'users.nombre', 'salario_min', 'salario_max', 'tipo', 'oferta_tipo.nombre as tipoN', 'oferta_categoria.nombre as categoriaN', 'users.image_profile')->join('users', 'users.id', '=', 'ofertas.empresa_id')->join('oferta_tipo', 'oferta_tipo.id', 'ofertas.tipo')->join('oferta_categoria', 'oferta_categoria.id', 'ofertas.categoria')->find($id);

        $status = false;
        $inscripciones = Inscripcion::where('idUsuario', '=', Auth::user()->id)->get();

        $user = UserExtra::where('user_id', '=', Auth::user()->id)->first();

        foreach ($inscripciones as $item) {
            if ($item->idUsuario == Auth::user()->id && $item->idOferta == $id)
                $status = true;
        }

        $ofertaSimilares = Oferta::select('ofertas.id', 'titulo', 'descripcion', 'localizacion', 'nombre', 'salario_min', 'salario_max', 'tipo', 'image_profile')->where('tipo', $oferta->tipo)->where('ofertas.id', '<>', $id)->join('users', 'users.id', '=', 'ofertas.empresa_id')->take(2)->get();

        return view('home.ofertas.oferta', ['oferta' => $oferta, 'status' => $status, 'user' => $user, 'ofertaSimilares' => $ofertaSimilares]);
    }

    public function inscribir(Request $request, $id)
    {
        if (Auth::user()->role != 'teacher' && !Auth::user()->business) {
            $status = false;
            $inscripciones = Inscripcion::where('idUsuario', '=', Auth::user()->id)->get();

            foreach ($inscripciones as $item) {
                if ($item->idUsuario == Auth::user()->id && $item->idOferta == $id)
                    $status = true;
            }

            if ($status)
                return back()->with('error', '<strong>' . Auth::user()->nombre . '</strong>, ya te encuentras inscrito en esta oferta');

            $inscribir = new Inscripcion();
            $inscribir->idUsuario = Auth::user()->id;
            $inscribir->idOferta = $id;

            $cv = $request->file('cv');

            if ($cv) {
                $inscribir->cv = $cv;
            }

            $presentacion = $request->presentacion;

            if ($presentacion) {
                $inscribir->presentacion = $presentacion;
            }

            $inscribir->save();

            return back()->with('success', 'Inscripción correcta');
        } else {
            return back()->with('error', '<strong>' . Auth::user()->nombre . '</strong>, no puedes inscribirte a esta oferta');
        }
    }

    public function about()
    {
        return view('home.about');
    }

    public function enviarCorreo(Request $request)
    {
        $data = ['message' => $request->comments . "\n\n$request->email", 'subject' => $request->subject];

        Mail::to('me@danieljimenez.info')->send(new ContactoEmail($data));

        return back();
    }
}
