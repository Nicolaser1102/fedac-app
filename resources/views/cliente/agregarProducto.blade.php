@extends('adminlte::page')

@section('title', 'Agregar producto')



@section('content')
    <div class="grid">
        <div class="col-12">
            <div class="d-flex justify-content-center pt-3">
            <h2><strong>{{$producto->nombreProd}}</strong></h2>
            </div>
            <hr>
        </div>
        <div class="row">
            <div class="col-6 pl-3">
                <img src="{{$producto->imagenUrlProd}}" class="card-img-top" alt="..." width="100px" height="300px">
            </div>
            <div class="col-6 pl-5 pt-3">
                <div class="row">
                    <h2> <strong>$ {{$producto->precioProd}}</h2>
                </div>
                <div class="row">
                    @if ($producto->stock > 0)
                    <p> DISPONIBILIDAD: <span style="color:red;"> EN STOCK </span> </p>
                    @else
                    <p> DISPONIBILIDAD: <span style="color:red;"> NO DISPONIBLE </span> </p>
                    @endif
                </div>
                <div class="col">
                    <h3>DESCRIPCIÓN:</h3>
                    <p style="color: #C6C5C5">{{$producto->descripcionProd}}</p>
                </div>
                <div class="col">



                    <form style="display: inline" action="{{route('comprar.store')}}" method="post" class="formAgregarVenta">
                        @csrf
                        {{-- Input código de venta --}}
                        <input type="hidden" name="codigoVenta" value=" {{session('codVentaId')}}" id="inputCodVenta">
                        {{-- Input id_producto --}}
                        <input type="hidden" name="id_producto" value="{{ $producto->id }}">

                        <div class="col-6">
                        {{-- Input de cantidad de producto --}}
                        <x-adminlte-input name="cant_Producto" label="Cantidad de productos" placeholder="" type="number"
                        igroup-size="sm" min=1 max=5>
                        </x-adminlte-input>
                        </div>

                        <div class="col-6 ">
                        <button type="submit" class="btn btn-danger" title="Agregar un producto al carrito">
                            Agregar al carrito
                        </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
