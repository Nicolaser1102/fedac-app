<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Producto;
use App\Models\UsersVenta;
use App\Models\Venta;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        //
        //Obtener id actual (vendedor)
        $id_currentUser = Auth::id();

        session()->forget('codVentaId');

        $ventasPorIdVendedor = UsersVenta::where('user_id', $id_currentUser)->get();

        $ventasPorCodVenta = "";

        return view('vendedor.listaVenta', compact( 'ventasPorIdVendedor','ventasPorCodVenta'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Id del usuario actual (vendedor)
        $id = Auth::id();


        //Valor de la sesión para obtener el codVenta
        if (session()->has('codVentaId')) {
            $codVenta= session('codVentaId');
        } else {
            //Número de la venta aleatorio cada vez que se aplaste
            $codVenta = 'Venta_'.Str::random(4);
            session(['codVentaId' => $codVenta]);
            $codVenta= session('codVentaId');
        }

        //Obtener las ventas según un código de venta
        $productosCodigoVenta = Venta::where('codigoVenta', $codVenta)->get();




        //Lista de productos disponibles para la venta
        $productos = Producto::all();
        return view('vendedor.addVenta', compact('id','codVenta' ,'productos', 'codVenta','productosCodigoVenta'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //Guardando una venta
        //Realizar validaciones a la request
        // $validacion = $request-> validate([

        //     'codigoVenta' => 'required',
        //     'id_producto' => 'required',
        //     'cantProducto' => 'required',
        // ]);

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

        return back();

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $codVenta)
    {
        //
        //
        //Obtener id actual (vendedor)
        $id_currentUser = Auth::id();

        //Filtrar las ventas según su codigoVenta
        $ventasPorCodVenta = Venta::where('codigoVenta', $codVenta)->get();

        $ventasPorIdVendedor = UsersVenta::where('user_id', $id_currentUser)->get();

        return view('vendedor.listaVenta', compact('ventasPorCodVenta','ventasPorIdVendedor'));
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
        $venta = Venta::find($id);

        $venta->delete();
        return back();
    }

    public function nuevaVenta(){
        return "Estoy en la nueva venta";
    }
}
