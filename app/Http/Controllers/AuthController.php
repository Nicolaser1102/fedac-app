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

            $id_currentUser = Auth::id();
            $user = User::find($id_currentUser);




            if ($user->rol == "Administrador") {
                return redirect()->route('producto.index');
             }
            elseif ($user->rol == "Repartidor") {
                return redirect()->route('pedidos.create');
            } elseif ($user->rol == "Vendedor"){
                return redirect()->route('ventas.create');

            } elseif($user->rol == "Cliente"){

                $user->roles()->sync(4);
                return redirect()->route('comprar.index');
            }else{
                return redirect()->route('comprar.index');
            }

             }
         }


