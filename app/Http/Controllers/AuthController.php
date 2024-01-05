<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Producto;
use App\Models\User;
use App\Models\Venta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    //

    public function redirect(){
        return Socialite::driver('google')->redirect();
    }

    public function callback(){

        $fecha = Carbon::now();
        $userGoogle = Socialite::driver('google')->user();


        dd($userGoogle);

        // $user = User::updateOrCreate([
        //     'google_id' => $userGoogle->id,
        // ], [
        //     'name' => $userGoogle->name,
        //     'email' => $userGoogle->email,
        //     'email_verified_at' =>$fecha,
        //     'google_token' => $userGoogle->token,
        // ]);

        // Auth::login($user);

        // return redirect('/dashboard');
         }


         public function dashboard(){

            // $id_currentUser = Auth::id();
            // $user = User::find($id_currentUser);

            // $roles = Role::all();

            // $rolEncontrado = "";

            // foreach ($roles as $rol) {
            //     if($rol->name == $user->rol){
            //         $rolEncontrado = $rol->name;
            //     }
            // }


            // if ($rolEncontrado == "Administrador") {
            //     return redirect()->route('producto.index');
            // }elseif ($rolEncontrado == "Repartidor") {
            //     $id_currentUser = Auth::id();
            //     $pedidos = Pedido::where('vendedor_id', $id_currentUser)->get();
            //     $ventasPorCodVenta = "";
            //     return view('repartidor.administrarPedidos', compact('pedidos', 'ventasPorCodVenta'));
            // } elseif ($rolEncontrado == "Vendedor"){
            //     $id = Auth::id();
            //     if (session()->has('codVentaId')) {
            //         $codVenta= session('codVentaId');
            //     } else {
            //         $codVenta = 'Venta_'.Str::random(4);
            //         session(['codVentaId' => $codVenta]);
            //         $codVenta= session('codVentaId');
            //     }
            //     $productosCodigoVenta = Venta::where('codigoVenta', $codVenta)->get();
            //     $productos = Producto::all();
            //     return view('vendedor.addVenta', compact('id','codVenta' ,'productos','productosCodigoVenta'));
            // } elseif($rolEncontrado == "Cliente"){
            //     $id = Auth::id();
            //     if (session()->has('codVentaId')) {
            //         $codVenta= session('codVentaId');
            //     } else {
            //         $codVenta = 'Online_'.Str::random(3);
            //         session(['codVentaId' => $codVenta]);
            //         $codVenta= session('codVentaId');
            //     }
            //     $productos = Producto::all();
            //     return view('cliente.comprar', compact('productos','codVenta'));
            // }else{
            //     $id = Auth::id();
            //     if (session()->has('codVentaId')) {
            //         $codVenta= session('codVentaId');
            //     } else {
            //         $codVenta = 'Online_'.Str::random(3);
            //         session(['codVentaId' => $codVenta]);
            //         $codVenta= session('codVentaId');
            //     }
            //     $productos = Producto::all();
            //     return view('cliente.comprar', compact('productos','codVenta'));
            }



            // }
         }


