<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\UsersVenta;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Obtener id actual (vendedor)
        $id_currentUser = Auth::id();

        //Obtener todos los pedidos del usuario vendedor
        $pedidos = Pedido::where('vendedor_id', $id_currentUser)->get();

        //Obtener las
        $ventasPorCodVenta = "";

        return view('repartidor.administrarPedidos', compact('pedidos', 'ventasPorCodVenta'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        //Se toman todos los datos user_venta que no estén aceptados
        $ventasNoAceptadas = UsersVenta::where('estado', 'porAceptar')->get();

        return view('repartidor.aceptarPedido', compact('ventasNoAceptadas'));
    }



    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    public function store($codVenta)
    {

        // $userVentaEncontrada = UsersVenta::where('codVenta', $codVenta)->first();


        // $pedido = Pedido::where('id_UserVenta', $userVentaEncontrada->id)->first();

        // $pedido->estado = "En camino";
        // $pedido->save();

        return $codVenta;
    }


    public function despachar($codVenta){


        $idUserVenta = UsersVenta::where('codVenta', $codVenta)->first();

        $pedidoParaDespachar = Pedido::where('id_UserVenta', $idUserVenta->id)->first();

        $pedidoParaDespachar->estado = "En camino";
        $pedidoParaDespachar->save();

        return $this->index();
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //Obtener id actual (vendedor)
        $id_currentUser = Auth::id();

        //Obtener el codigo de la venta aceptada


        $ventaAceptada = UsersVenta::find($id);

        if ($ventaAceptada) {
            $ventaAceptada->estado = 'aceptado';
            $ventaAceptada->save();

            $nuevoPedido = new Pedido();
            $nuevoPedido->id_UserVenta = $ventaAceptada->id;
            $nuevoPedido->vendedor_id = $id_currentUser;
            $nuevoPedido->estado = 'Solicitado';

            $nuevoPedido->save();
        }

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $codVenta)
    {
        //
        //Obtener id actual (vendedor)
        $id_currentUser = Auth::id();

        //Filtrar las ventas según su codigoVenta
        $ventasPorCodVenta = Venta::where('codigoVenta', $codVenta)->get();

        //Obtener todos los pedidos del usuario vendedor
        $pedidos = Pedido::where('vendedor_id', $id_currentUser)->get();

        return view('repartidor.administrarPedidos', compact('ventasPorCodVenta','pedidos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( string $codVenta)
    {
        return $codVenta;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


}
