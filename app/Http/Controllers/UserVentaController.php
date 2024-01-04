<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UsersVenta;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserVentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //


        $newUserVenta = new UsersVenta();

        $newUserVenta->direccion = $request->input('direccion');
        $newUserVenta->numTelefono = $request->input('numTelefono');
        $newUserVenta->estado = $request->input('estado');
        $newUserVenta->total = $request->input('total');
        $newUserVenta->codVenta = $request->input('codVenta');
        $newUserVenta->user_id = $request->input('user_id');
        $newUserVenta->save();


         //Obtener id actual (vendedor)
         $id_currentUser = Auth::id();

         //Filtrar las ventas según su codigoVenta
         $ventasPorCodVenta = Venta::where('codigoVenta',$request->input('codVenta'))->get();

         $ventasPorIdVendedor = UsersVenta::where('user_id', $id_currentUser)->get();
         $codVenta = "";

         session()->forget('codVentaId');

        return view('vendedor.listaVenta', compact('ventasPorCodVenta','ventasPorIdVendedor','codVenta'));
    }

    public function guardarVentaOnline(Request $request){

        $newUserVenta = new UsersVenta();

        $newUserVenta->direccion = $request->input('direccion');
        $newUserVenta->numTelefono = $request->input('numTelefono');
        $newUserVenta->estado = $request->input('estado');
        $newUserVenta->total = $request->input('total');
        $newUserVenta->codVenta = $request->input('codVenta');
        $newUserVenta->user_id = $request->input('user_id');
        $newUserVenta->save();

        session()->forget('codVentaId');

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
    public function edit(string $id)
    {
        //
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
