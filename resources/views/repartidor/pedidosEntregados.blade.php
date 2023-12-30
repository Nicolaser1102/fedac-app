@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Pedidos entregados</h1>
@stop

@section('content')
    <p>Vista que permitirá ver los pedidos que ya fueron entregados</p>


    <div class="d-flex flex-column">
        <div>
            Pedidos por entregar
            @foreach ($pedidos as $pedido)
                @if ($pedido->estado == "En camino")
                    {{$pedido}}
                @endif
            @endforeach
        </div>
        <div>
            Pedidos entregados
            @foreach ($pedidos as $pedido)
                @if ($pedido->estado == "Entregado")
                    {{$pedido}}
                @endif
            @endforeach
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
