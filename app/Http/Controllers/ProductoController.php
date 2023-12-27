<?php

namespace App\Http\Controllers;


use App\Models\Producto as ModelsProducto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Variable producto que recibe todos los registros de la tabla;
        $productos = ModelsProducto::all();



        return view('administrador.listaProducto', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view ('administrador.addProducto');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Guardar un producto


        //Realizar validaciones a la request
        $validacion = $request-> validate([
            'nombreProd' =>'required|max:100',
            'codigoBarras' => 'required|numeric|max:10000000000|unique:productos,codigoBarras',
            'descripcionProd' => 'required|max:500',
            'precioProd' => 'required|numeric',
            'fechaVencProd' => 'required|date',
            'stock' => 'required|numeric',
            'imagenUrlProd' => 'required'
        ]);

        $producto = new ModelsProducto();

        $producto->nombreProd = $request->input('nombreProd');
        $producto->codigoBarras = $request->input('codigoBarras');
        $producto->descripcionProd = $request->input('descripcionProd');
        $producto->precioProd = $request->input('precioProd');
        $producto->fechaVencProd = $request->input('fechaVencProd');
        $producto->stock = $request->input('stock');
        $producto->imagenUrlProd = $request->input('imagenUrlProd');

        $producto->save();


        return back()->with('message', 'ProductoCreado');

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
        //Encontar el producto según el id para utilizar la lógica de la vista editProducto
        $producto = ModelsProducto::find($id);
        return view('administrador.editProducto',compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $producto = ModelsProducto::find($id);

        $producto->nombreProd = $request->input('nombreProd');
        $producto->codigoBarras = $request->input('codigoBarras');
        $producto->descripcionProd = $request->input('descripcionProd');
        $producto->precioProd = $request->input('precioProd');
        $producto->fechaVencProd = $request->input('fechaVencProd');
        $producto->stock = $request->input('stock');
        $producto->imagenUrlProd = $request->input('imagenUrlProd');

        $producto->save();

        return back()->with('message','ActualizadoCorrectamente');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $producto = ModelsProducto::find($id);

        $producto->delete();
        return back();
    }
}
