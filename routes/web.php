<?php

use App\Models\UserExtra;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify' => true]);

Route::get('lang/{locale}', function ($locale) {
    session(['locale' => $locale]);
    return redirect('/');
})->name('idioma');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home.inicio');
Route::get('noticias', [App\Http\Controllers\HomeController::class, 'noticias'])->name('home.noticias');
Route::get('noticias/{id}', [App\Http\Controllers\HomeController::class, 'noticia'])->name('home.noticias.i');
Route::get('ofertas', [App\Http\Controllers\HomeController::class, 'ofertas'])->name('home.ofertas');
Route::get('ofertas/{id}', [App\Http\Controllers\HomeController::class, 'oferta'])->name('home.ofertas.i');
Route::post('ofertas/{id}/inscribir', [App\Http\Controllers\HomeController::class, 'inscribir'])->name('home.ofertas.inscribir');
Route::get('about', [App\Http\Controllers\HomeController::class, 'about'])->name('home.about');

Route::post('about/enviarCorreo', [App\Http\Controllers\HomeController::class, 'enviarCorreo'])->name('home.about.enviarCorreo');

//CLIENT
Route::group(['middleware' => 'user', 'prefix' => 'candidate', 'namespace' => 'candidate'], function () {
    Route::get('/', [App\Http\Controllers\Candidate\HomeController::class, 'home'])->name('candidate.inicio');

    Route::get('ofertas', [App\Http\Controllers\Candidate\HomeController::class, 'ofertas'])->name('candidate.ofertas');
    Route::get('ajustes', [App\Http\Controllers\Candidate\HomeController::class, 'cuenta'])->name('candidate.cuenta');
    Route::get('usuario/{id}/eliminarCV', [App\Http\Controllers\Candidate\HomeController::class, 'usuario_eliminarCV'])->name('candidate.usuario.eliminarCV');
    Route::get('ajustes/cv', [App\Http\Controllers\Candidate\HomeController::class, 'previewCV'])->name('candidate.previewCV');

    Route::post('ajustes/save', [App\Http\Controllers\Candidate\HomeController::class, 'cuentaP'])->name('candidate.cuentaS');
});

//BUSINESS
Route::group(['middleware' => 'business', 'prefix' => 'business', 'namespace' => 'business'], function () {
    Route::get('/', [App\Http\Controllers\Business\HomeController::class, 'home'])->name('business.inicio');

    Route::get('ofertas/', [App\Http\Controllers\Business\HomeController::class, 'ofertas'])->name('business.ofertas');
    Route::get('ofertas/publicar', [App\Http\Controllers\Business\HomeController::class, 'publicarOferta'])->name('business.ofertas.publicar');
    Route::get('oferta/{id}/candidatos', [App\Http\Controllers\Business\HomeController::class, 'ofertaCandidatos'])->name('business.oferta.candidatos');
    Route::get('oferta/{id}/editar', [App\Http\Controllers\Business\HomeController::class, 'ofertaEditar'])->name('business.oferta.editar');
    Route::post('oferta/{id}/editar', [App\Http\Controllers\Business\HomeController::class, 'ofertaEditarU'])->name('business.oferta.editarU');
    Route::get('oferta/{id}/eliminar', [App\Http\Controllers\Business\HomeController::class, 'ofertaEliminar'])->name('business.oferta.eliminar');

    Route::get('oferta/{id}/candidatos/cv/{idUser}', [App\Http\Controllers\Business\HomeController::class, 'previewCV'])->name('business.oferta.previewCV');
    Route::get('oferta/{id}/candidatos/{idUser}/seleccionar', [App\Http\Controllers\Business\HomeController::class, 'seleccionarCandidato'])->name('business.oferta.seleccionarCandidatos');
    Route::get('oferta/{id}/candidatos/{idUser}/descartar', [App\Http\Controllers\Business\HomeController::class, 'eliminarCandidato'])->name('business.oferta.descartarCandidatos');

    Route::get('ajustes', [App\Http\Controllers\Business\HomeController::class, 'cuenta'])->name('business.cuenta');

    Route::post('mensaje', [App\Http\Controllers\Business\HomeController::class, 'mensaje'])->name('business.mensaje.enviar');
    Route::post('ofertas/publicar/save', [App\Http\Controllers\Business\HomeController::class, 'guardarOferta'])->name('business.ofertas.guardar');
    Route::post('ajustes/save', [App\Http\Controllers\Business\HomeController::class, 'cuentaP'])->name('business.cuentaS');
});

//TEACHER
Route::group(['middleware' => 'teacher', 'prefix' => 'dashboard', 'namespace' => 'teacher'], function () {
    Route::get('/', [App\Http\Controllers\Teacher\HomeController::class, 'home'])->name('teacher.inicio');

    Route::get('ofertas', [App\Http\Controllers\Teacher\HomeController::class, 'ofertas'])->name('teacher.ofertas');

    Route::get('oferta/{id}/editar', [App\Http\Controllers\Teacher\HomeController::class, 'oferta_editar'])->name('teacher.oferta.editar');
    Route::get('oferta/{id}/eliminar', [App\Http\Controllers\Teacher\HomeController::class, 'oferta_eliminar'])->name('teacher.oferta.eliminar');
    Route::post('oferta/{id}/actualizar', [App\Http\Controllers\Teacher\HomeController::class, 'oferta_actualizar'])->name('teacher.oferta.actualizar');

    Route::get('usuarios', [App\Http\Controllers\Teacher\HomeController::class, 'usuarios'])->name('teacher.usuarios');

    Route::get('usuario/{id}/editar1', [App\Http\Controllers\Teacher\HomeController::class, 'usuario_editar'])->name('teacher.usuario.editar1');
    Route::post('usuario/guardar1', [App\Http\Controllers\Teacher\HomeController::class, 'usuario_guardar1'])->name('teacher.usuario.guardar1');

    Route::get('usuario/{id}/editar2', [App\Http\Controllers\Teacher\HomeController::class, 'empresa_editar'])->name('teacher.usuario.editar2');
    Route::post('usuario/guardar2', [App\Http\Controllers\Teacher\HomeController::class, 'usuario_guardar2'])->name('teacher.usuario.guardar2');

    Route::get('usuario/{id}/editar3', [App\Http\Controllers\Teacher\HomeController::class, 'profesor_editar'])->name('teacher.usuario.editar3');
    Route::post('usuario/guardar3', [App\Http\Controllers\Teacher\HomeController::class, 'usuario_guardar3'])->name('teacher.usuario.guardar3');

    Route::get('usuario/{id}/eliminar', [App\Http\Controllers\Teacher\HomeController::class, 'usuario_eliminar'])->name('teacher.usuario.eliminar');

    Route::get('usuario/{id}/eliminarCV', [App\Http\Controllers\Teacher\HomeController::class, 'usuario_eliminarCV'])->name('teacher.usuario.eliminarCV');

    Route::get('articulos', [App\Http\Controllers\Teacher\HomeController::class, 'articulos'])->name('teacher.articulos');
    Route::get('articulo/publicar', [App\Http\Controllers\Teacher\HomeController::class, 'articulos_publicar'])->name('teacher.articulos.publicar');

    Route::get('articulo/{id}/editar', [App\Http\Controllers\Teacher\HomeController::class, 'articulo_editar'])->name('teacher.articulo.editar');
    Route::get('articulo/{id}/eliminar', [App\Http\Controllers\Teacher\HomeController::class, 'articulo_eliminar'])->name('teacher.articulo.eliminar');
    Route::post('articulo/{id}/actualizar', [App\Http\Controllers\Teacher\HomeController::class, 'articulo_actualizar'])->name('teacher.articulo.actualizar');

    Route::get('categorias', [App\Http\Controllers\Teacher\HomeController::class, 'categorias'])->name('teacher.categorias');
    Route::get('categoria/publicar', [App\Http\Controllers\Teacher\HomeController::class, 'categorias_publicar'])->name('teacher.categorias.publicar');
    Route::get('categoria/{id}/eliminar', [App\Http\Controllers\Teacher\HomeController::class, 'categorias_eliminar'])->name('teacher.categoria.eliminar');
    Route::get('categoria/{id}/editar', [App\Http\Controllers\Teacher\HomeController::class, 'categorias_editar'])->name('teacher.categoria.editar');
    Route::post('categoria/{id}/actualizar', [App\Http\Controllers\Teacher\HomeController::class, 'categorias_actualizar'])->name('teacher.categoria.actualizar');

    Route::get('ajustes', [App\Http\Controllers\Teacher\HomeController::class, 'cuenta'])->name('teacher.cuenta');

    Route::post('ajustes/save', [App\Http\Controllers\Teacher\HomeController::class, 'cuentaP'])->name('teacher.cuentaS');
    Route::post('articulo/publicar', [App\Http\Controllers\Teacher\HomeController::class, 'articuloP'])->name('teacher.articulo.publicar');
    Route::post('categoria/publicar', [App\Http\Controllers\Teacher\HomeController::class, 'categoriaP'])->name('teacher.categoria.publicar');
});

Route::group(['prefix' => 'storage'], function () {
    Route::get('portada/{img}', function ($img) {
        $file = Storage::disk('portada')->get($img);
        return response($file, 200);
    })->name('storage.portada');

    Route::get('avatar/{img}', function ($img) {
        $file = Storage::disk('avatar')->get($img);
        return response($file, 200);
    })->name('storage.avatar');
});
