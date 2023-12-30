<?php

use App\Http\Controllers\AsignarController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\UserVentaController;
use App\Http\Controllers\VentaController;
use App\Models\Pedido;

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

    //Ruta de recursos para controlar los roles de Usuario
    Route::resource('/roles', RoleController::class)->names('roles');


    //Ruta de recursos para controlar los permisos de los usuarios
    Route::resource('/permisos', PermisoController::class)->names('permisos');

    //Ruta de recursos para controlar la vista de la lista de Usuarios
    Route::resource('/usuarios', AsignarController::class)->names('asignar');


     //Ruta de recursos para controlar la vista de añadir una nueva venta
     Route::resource('/ventas', VentaController::class)->names('ventas');


     //Ruta de recursos para controlar la vista de la tabla user_venta;
     Route::resource('/user_venta', UserVentaController::class)->names('users_ventas');



    //  Ruta personalizada para despachar el pedido;
    //  Route::get('/pedidos/despachar', 'PedidoController@create');



    //Ruta de recursos para controlar las vistas de Pedidos;
     Route::resource('/pedidos', PedidoController::class)->names('pedidos');


     //  Ruta personalizada para despachar el pedido según su código de venta;
    Route::get('/pedidos/despachar/{codVenta}', [PedidoController::class, 'despachar'])->name('pedidos.despachar');
    //Ruta personalizada para visualizar la lista de pedidos
    Route::get('/pedidos/pedidosEntregados', [PedidoController::class, 'pedidosEntregados'])->name('pedidos.pedidosEntregados');






});
