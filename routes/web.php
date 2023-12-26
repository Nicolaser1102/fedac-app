<?php

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //Ruta para acceder a las opciones de perfil
    Route::get('/profile',[UsuarioController::class, 'profile']);
    Route::get('/changePassword', [UsuarioController::class, 'changePassword']);

    //Ruta que me permite utilizar el controlador de Producto
    Route::resource('/producto', ProductoController::class) ->names('producto');
});
