<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Producto;
use App\Models\UsersVenta;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        //Id del usuario actual (cliente)
        $id = Auth::id();


        //Valor de la sesión para obtener el codVenta
        if (session()->has('codVentaId')) {
            $codVenta= session('codVentaId');
        } else {
            //Número de la venta aleatorio cada vez que se aplaste
            $codVenta = 'Online_'.Str::random(3);
            session(['codVentaId' => $codVenta]);
            $codVenta= session('codVentaId');
        }

        //Variable producto que recibe todos los registros de la tabla para presentarlo al cliente
        $productos = Producto::all();

        return view('cliente.comprar', compact('productos','codVenta'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        if (session()->has('codVentaId')) {
            $codVenta= session('codVentaId');
        } else {
            //Número de la venta aleatorio cada vez que se aplaste
            $codVenta= "";
        }

        //Filtrar las ventas según su codigoVenta
        $ventasPorCodVenta = Venta::where('codigoVenta', $codVenta)->get();

        //Obtener id actual (cliente)
        $id_currentUser = Auth::id();

        return view('cliente.carrito', compact('codVenta','ventasPorCodVenta','id_currentUser'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        //Se registra la nueva venta
        $venta = new Venta();
        $venta->codigoVenta = $request->input('codigoVenta');
        $venta->id_producto = $request->input('id_producto');
        $venta->cant_Producto = $request->input('cant_Producto');


        $venta->save();

        //Cambiando el stock
        $producto = Producto::find($request->input('id_producto'));

        $cantProducto = $request->input('cant_Producto');
        $producto->stock = $producto->stock-$cantProducto;
        $producto->save();

        return $this->index();
    }

    public function infoPedidos(){

        //Id del usuario actual (cliente)
        $id_currentUser = Auth::id();

        $pedidos = UsersVenta::where('user_id', $id_currentUser)->get();

        $codVenta= "";
        $ventasPorCodVenta = "";

        return view('cliente.listaPedidos', compact('pedidos', 'codVenta', 'ventasPorCodVenta'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

        $producto = Producto::find($id);

        return view ('cliente.agregarProducto', compact('producto'));
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

        $pedidos = UsersVenta::where('user_id', $id_currentUser)->get();

        return view('cliente.listaPedidos', compact('ventasPorCodVenta','pedidos','codVenta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //


    }
}
