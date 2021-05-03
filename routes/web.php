<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//CLIENT
Route::group(['prefix' => 'dashboard', 'namespace' => 'Client'], function () {
    Route::get('/', [App\Http\Controllers\ClientController::class, 'home'])->name('client.inicio');
    Route::get('ofertas', [App\Http\Controllers\ClientController::class, 'ofertas'])->name('client.ofertas');
    Route::get('ajustes', [App\Http\Controllers\ClientController::class, 'cuenta'])->name('client.cuenta');

    Route::post('ajustes/save', [App\Http\Controllers\ClientController::class, 'cuentaP'])->name('client.cuentaS');
});
