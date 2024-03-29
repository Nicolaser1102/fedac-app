<?php

use App\Http\Controllers\AsignarController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;
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


    // Route::get('/dashboard', [AuthController::class, 'dashboard']);

    // Route::middleware([
    //     'auth:sanctum',
    //     config('jetstream.auth_session'),
    //     'verified',
    // ])->group(function () {
        Route::get('/dashboard', [AuthController::class, 'dashboard'] );



    Route::get('/auth/redirect', [AuthController::class,'redirect']);


    Route::get('/auth/callback-url', [AuthController::class,'callback']);

    //Ruta para acceder a las opciones de perfil
    Route::get('/profile',[UsuarioController::class, 'profile']);
    Route::get('/changePassword', [UsuarioController::class, 'changePassword']);

    //Ruta que me permite utilizar el controlador de Producto
    Route::resource('/producto', ProductoController::class) ->names('producto');
    //Ruta para llamar a los reportes
    Route::get('/reporteProductos', [ProductoController::class, 'generarReporte'])->name('producto.generarReporte');



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
     Route::post('/guardarVentaOnline', [UserVentaController::class, 'guardarVentaOnline'])->name('users_ventas.guardarVentaOnline');


    //Ruta de recursos para controlar las vistas de Pedidos;
     Route::resource('/pedidos', PedidoController::class)->names('pedidos');
     //  Ruta personalizada para despachar el pedido según su código de venta;
    Route::get('/pedidos/despachar/{codVenta}', [PedidoController::class, 'despachar'])->name('pedidos.despachar');
    //Ruta personalizada para visualizar la lista de pedidos
    Route::get('/pedidosEntregados', [PedidoController::class, 'pedidosEntregados'])->name('pedidos.pedidosEntregados');
    //Ruta personalizada para entregar los pedidos
    Route::get('/pedidos/entregar/{codVenta}', [PedidoController::class, 'entregarPedidos'])->name('pedidos.entregarPedidos');


    //Ruta de recursos para controlar la vista que tendrá el usuario para realizar las compras en línea
    Route::resource('/comprar', ClienteController::class)->names('comprar');
    Route::get('/infoPedidos', [ClienteController::class, 'infoPedidos'])->name('comprar.infoPedidos');
    Route::get('/comprobanteVenta/{codVenta}', [ClienteController::class, 'generarComprobante'])->name('comprar.generarComprobante');
    //Ruta para generar el pdf









});
