@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Productos</h1>
@stop

@section('content')
    <h4>Lista de productos disponibles para comprar</h4>
    <hr>


    <div class="grid">

        @foreach($productos->chunk(4) as $chunk)
            <div class="card-group">
                @foreach($chunk as $producto)
                    @if ($producto->stock > 0)


                    <div class="card mr-1 mb-2" style="width: 18rem;">
                        <img src="{{$producto->imagenUrlProd}}" class="card-img-top" alt="..." width="100px" height="200px">
                        <div class="card-body">

                            <div class="d-flex justify-content-start">
                                <h4><strong>$ {{$producto->precioProd}}</strong></h4>
                            </div>
                            <h5 class="card-title"> <strong>{{$producto->nombreProd}}</strong></h5>
                            <p class="card-text">{{$producto->descripcionProd}}</p>

                            <div class="d-flex justify-content-end">
                                <a href="{{route('comprar.show' , $producto->id)}} " class="btn btn-success" title="Agregar al carrito">
                                Agregar al carrito
                                </a>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        @endforeach


    </div>




@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
