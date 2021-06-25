<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\CategoriaArticulo;
use App\Models\Curriculum;
use App\Models\Empresa;
use App\Models\Oferta;
use App\Models\OfertaCategoria;
use App\Models\OfertaTipo;
use App\Models\User;
use App\Models\UserExtra;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use function Symfony\Component\String\b;

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
        $ofertaP = Oferta::where('status', '<>', '1')->count();
        $oferta = Oferta::count();

        $userP = User::where('status', '<>', '1')->count();
        $user = User::count();

        $users = User::orderBy('created_at', 'DESC')->take(5)->get();

        return view('teacher.index', ['userP' => $userP, 'user' => $user, 'ofertaP' => $ofertaP, 'oferta' => $oferta, 'users' => $users]);
    }

    public function ofertas()
    {
        $ofertas = Oferta::select('ofertas.id', 'users.nombre', 'users.apellidos', 'titulo', 'localizacion', 'tipo', 'categoria', 'salario_min', 'salario_max', 'ofertas.created_at', 'oferta_categoria.nombre as nombre_cat', 'oferta_tipo.nombre as nombre_tipo')->join('oferta_categoria', 'oferta_categoria.id', '=', 'ofertas.categoria')->join('oferta_tipo', 'oferta_tipo.id', '=', 'ofertas.tipo')->join('users', 'users.id', '=', 'empresa_id')->get();

        return view('teacher.ofertas.index', ['ofertas' => $ofertas]);
    }

    public function usuarios()
    {
        $usuarios = User::get();

        return view('teacher.usuarios.index', ['usuarios' => $usuarios]);
    }

    public function usuario_eliminar($id)
    {
        try {
            User::find($id)->delete();
            return back()->with('success', 'Usuario eliminado correctamente');
        } catch (Exception $e) {
            return back()->with('error', 'El usuario que esta intentado borrar no existe');
        }
    }

    public function usuario_editar($id)
    {
        $user = User::select('users.id', 'status', 'nombre', 'apellidos', 'email', 'role', 'ficheros', 'nacionalidad', 'telf', 'image_profile')->join('info_user', 'info_user.user_id', 'users.id')->where('users.id', $id)->first();
        $habilidades = Curriculum::where('user_id', $id)->get();

        return view('teacher.usuarios.editar.usuario', ['user' => $user, 'habilidades' => $habilidades]);
    }

    public function empresa_editar($id)
    {
        $user = User::select('users.id', 'status', 'nombre', 'apellidos', 'email', 'role', 'telf', 'image_profile', 'ident_fis')->join('empresa', 'empresa.user_id', 'users.id')->where('users.id', $id)->first();

        return view('teacher.usuarios.editar.empresa', ['user' => $user]);
    }

    public function profesor_editar($id)
    {
        $user = User::select('users.id', 'status', 'nombre', 'apellidos', 'email', 'role', 'telf', 'image_profile')->where('users.id', $id)->first();
        $habilidades = Curriculum::where('user_id', $id)->get();

        return view('teacher.usuarios.editar.profesor', ['user' => $user]);
    }


    public function usuario_eliminarCV($id)
    {
        UserExtra::where('user_id', $id)->update(array('ficheros' => ''));
        return back();
    }

    public function usuario_guardar1(Request $request)
    {
        try {
            $validate = $this->validate($request, [
                'nombre' => 'required',
                'email' => 'required',
                'upload' => 'file|mimes:pdf',
            ]);

            $cv = $request->file('upload');
            $cvN = null;
            if ($cv) {
                $cvN = time() . str_replace(' ', '', $cv->getClientOriginalName());
                Storage::disk('cv')->put($cvN, File::get($cv));
                UserExtra::where('user_id', $request->userID)->update(array('ficheros' => $cvN, 'nacionalidad' => $request->nacionalidad));
            } else {
                UserExtra::where('user_id', $request->userID)->update(array('nacionalidad' => $request->nacionalidad));
            }

            $avatar = $request->file('avatar');
            $avatarN = null;
            if ($avatar) {
                $avatarN = time() . $avatar->getClientOriginalName();
                Storage::disk('avatar')->put($avatarN, File::get($avatar));

                User::where('id', $request->userID)->update(array('nombre' => $request->nombre, 'apellidos' => $request->apellidos, 'email' => $request->email, 'telf' => $request->telf, 'image_profile' => $avatarN, 'role' => $request->role, 'status' => $request->status));
            } else {
                User::where('id', $request->userID)->update(array('nombre' => $request->nombre, 'apellidos' => $request->apellidos, 'email' => $request->email, 'telf' => $request->telf, 'role' => $request->role, 'status' => $request->status));
            }

            if ($request->role == 1) {
                if (UserExtra::where('user_id', $request->userID)->count() == 0) {
                    $user = new UserExtra();
                    $user->user_id = $request->userID;
                    $user->save();
                }
            }

            if ($request->role == 2) {
                if (Empresa::where('user_id', $request->userID)->count() == 0) {
                    $user = new Empresa();
                    $user->user_id = $request->userID;
                    $user->save();
                }
            }

            return redirect()->route('teacher.usuarios')->with('success', 'Usuario actualizado correctamente');
        } catch (Exception $e) {
            return redirect()->route('teacher.usuarios')->with('error', 'Error al actualizar el usuario');
        }
    }

    public function usuario_guardar2(Request $request)
    {
        try {
            $validate = $this->validate($request, [
                'nombre' => 'required',
                'email' => 'required',
            ]);

            $avatar = $request->file('avatar');
            $avatarN = null;
            if ($avatar) {
                $avatarN = time() . $avatar->getClientOriginalName();
                Storage::disk('avatar')->put($avatarN, File::get($avatar));

                User::where('id', $request->userID)->update(array('nombre' => $request->nombre, 'apellidos' => $request->apellidos, 'email' => $request->email, 'telf' => $request->telf, 'image_profile' => $avatarN, 'role' => $request->role, 'status' => $request->status));
            } else {

                User::where('id', $request->userID)->update(array('nombre' => $request->nombre, 'apellidos' => $request->apellidos, 'email' => $request->email, 'telf' => $request->telf, 'role' => $request->role, 'status' => $request->status));
            }

            Empresa::where('user_id', $request->userID)->update(array('ident_fis' => $request->ident_fis));
            return back()->with('success', 'Usuario actualizado correctamente');
        } catch (Exception $e) {
            return back()->with('error', 'Error al actualizar el usuario');
        }
    }

    public function usuario_guardar3(Request $request)
    {
        try {
            $validate = $this->validate($request, [
                'nombre' => 'required',
                'email' => 'required',
            ]);

            $avatar = $request->file('avatar');
            $avatarN = null;
            if ($avatar) {
                $avatarN = time() . $avatar->getClientOriginalName();
                Storage::disk('avatar')->put($avatarN, File::get($avatar));
                User::where('id', $request->userID)->update(array('nombre' => $request->nombre, 'apellidos' => $request->apellidos, 'email' => $request->email, 'telf' => $request->telf, 'image_profile' => $avatarN, 'role' => $request->role, 'status' => $request->status));
            } else {
                User::where('id', $request->userID)->update(array('nombre' => $request->nombre, 'apellidos' => $request->apellidos, 'email' => $request->email, 'telf' => $request->telf, 'role' => $request->role, 'status' => $request->status));
            }

            return back()->with('success', 'Usuario actualizado correctamente');
        } catch (Exception $e) {
            return back()->with('error', 'Error al actualizar el usuario');
        }
    }

    public function cuenta()
    {
        $infoE = UserExtra::where('user_id', Auth::user()->id)->first();
        return view('teacher.ajustes', ['infoE' => $infoE]);
    }

    public function cuentaP(Request $request)
    {
        try {
            $validate = $this->validate($request, [
                'nombre' => 'required',
                'apellidos' => 'required',
                'email' => 'required',
                'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $avatar = $request->file('avatar');

            if ($avatar) {
                $avatarN = null;
                $avatarN = time() . $avatar->getClientOriginalName();
                Storage::disk('avatar')->put($avatarN, File::get($avatar));

                User::where('id', Auth::user()->id)->update(array('nombre' => $request->nombre, 'apellidos' => $request->apellidos, 'email' => $request->email, 'telf' => $request->telf, 'image_profile' => $avatarN));
            } else {
                User::where('id', Auth::user()->id)->update(array('nombre' => $request->nombre, 'apellidos' => $request->apellidos, 'email' => $request->email, 'telf' => $request->telf));
            }


            return back()->with('success', 'Usuario actualizado correctamente');
        } catch (Exception $e) {
            return back()->with('error', 'Error al actualizar el usuario');
        }
    }

    public function articulos()
    {
        $articulos = Articulo::select('articulos.id as idA', 'titulo', 'users.nombre as nombreUsuario', 'users.apellidos as apellidosUsuario', 'categorias_articulos.nombre as nombreCategoria', 'articulos.created_at as fecha')->join('users', 'users.id', '=', 'articulos.user_id')->join('categorias_articulos', 'categorias_articulos.id', '=', 'articulos.categoria_id')->orderBy('idA', 'DESC')->get();

        return view('teacher.articulos.index', ['articulos' => $articulos]);
    }

    public function articulos_publicar()
    {
        $articulos = Articulo::join('users', 'users.id', '=', 'articulos.user_id')->get();
        $categoria = CategoriaArticulo::get();
        return view('teacher.articulos.publicar', ['articulos' => $articulos, 'categoria' => $categoria]);
    }

    public function articuloP(Request $request)
    {
        $validate = $this->validate($request, [
            'titulo' => 'required',
            'categoria' => 'required',
            'descripcion' => 'required',
            'portada' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $articulo = new Articulo();
        $articulo->user_id = Auth::user()->id;
        $articulo->titulo = $request->titulo;
        $articulo->categoria_id = $request->categoria;
        $articulo->descripcion = $request->descripcion;

        $portada = $request->file('portada');

        if ($portada) {
            $executable_name = time() . $portada->getClientOriginalName();
            Storage::disk('portada')->put($executable_name, File::get($portada));
            $articulo->portada = $executable_name;
        }

        $articulo->status = 1;
        $articulo->featured = 0;
        $articulo->save();

        return back()->with('success', 'Artículo publicado correctamente');
    }

    public function categorias()
    {
        $categorias = CategoriaArticulo::get();
        return view('teacher.categorias.index', ['categorias' => $categorias]);
    }

    public function categorias_publicar()
    {
        $categorias = CategoriaArticulo::get();
        return view('teacher.categorias.publicar', ['categorias' => $categorias]);
    }

    public function categoriaP(Request $request)
    {
        $categoria = new CategoriaArticulo();
        $categoria->nombre = $request->categoria;
        $categoria->save();

        return response()->json('true');
    }

    public function oferta_eliminar($id)
    {
        try {
            Oferta::find($id)->delete();
            return back()->with('success', 'Oferta eliminada correctamente');
        } catch (Exception $e) {
            return back()->with('error', 'La oferta que esta intentado borrar no existe');
        }
    }

    public function oferta_editar($id)
    {
        $oferta = Oferta::find($id);

        $categoria = OfertaCategoria::get();
        $tipo = OfertaTipo::get();

        return view('teacher.ofertas.editar', ['oferta' => $oferta, 'categoria' => $categoria, 'tipo' => $tipo]);
    }

    public function oferta_actualizar(Request $request, $id)
    {
        $validate = $this->validate($request, [
            'titulo' => 'required',
            'tipo' => 'required',
            'categoria' => 'required',
            'localizacion' => 'required',
            'salMin' => 'numeric',
            'salMax' => 'numeric',
            'descripcion' => 'required',
            'estado' => 'required'
        ]);

        Oferta::where('id', $id)->update(array('titulo' => $request->titulo, 'tipo' => $request->tipo, 'categoria' => $request->categoria, 'localizacion' => $request->localizacion, 'salario_min' => $request->salMin, 'salario_max' => $request->salMax, 'upload' => $request->upload, 'descripcion' => $request->descripcion, 'status' => $request->estado));

        return redirect()->route('teacher.ofertas');
    }

    public function articulo_eliminar($id)
    {
        try {
            Articulo::find($id)->delete();
            return back()->with('success', 'Artículo eliminado correctamente');
        } catch (Exception $e) {
            return back()->with('error', 'La oferta que esta intentado borrar no existe');
        }
    }

    public function articulo_editar($id)
    {
        $oferta = Articulo::find($id);
        $cat = CategoriaArticulo::get();
        return view('teacher.articulos.editar', ['oferta' => $oferta, 'cat' => $cat]);
    }

    public function articulo_actualizar(Request $request, $id)
    {
        try {
            $validate = $this->validate($request, [
                'titulo' => 'required',
                'categoria' => 'required',
                'descripcion' => 'required',
                'portada' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            $portada = $request->file('portada');
            $portadaN = null;

            if ($portada) {
                $portadaN = time() . $portada->getClientOriginalName();
                Storage::disk('portada')->put($portadaN, File::get($portada));
                Articulo::where('id', $id)->update(array('titulo' => $request->titulo, 'categoria_id' => $request->categoria, 'portada' => $portadaN));
            } else {
                Articulo::where('id', $id)->update(array('titulo' => $request->titulo, 'categoria_id' => $request->categoria));
            }


            return back()->with('success', 'Artículo actualizado correctamente');
        } catch (Exception $e) {
            return back()->with('error', 'Error al actualizar el artículo');
        }
    }

    public function categorias_eliminar($id)
    {
        try {
            CategoriaArticulo::find($id)->delete();
            return back()->with('success', 'Categoria eliminada correctamente');
        } catch (Exception $e) {
            return back()->with('error', 'La categoria que esta intentado borrar no existe');
        }
    }

    public function categorias_editar($id)
    {
        try {
            $cat = CategoriaArticulo::find($id);
            return view('teacher.categorias.editar', ['cat' => $cat]);
        } catch (Exception $e) {
            return back()->with('error', 'La categoria que esta intentado borrar no existe');
        }
    }

    public function categorias_actualizar(Request $request, $id)
    {
        try {
            CategoriaArticulo::where('id', $id)->update(array('nombre' => $request->nombre));
            return back()->with('success', 'Categoria eliminada correctamente');
        } catch (Exception $e) {
            return back()->with('error', 'La categoria que esta intentado borrar no existe');
        }
    }
}
