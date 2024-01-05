@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Aceptar pedido</h1>

@stop

@section('content')
<p>Seleccione los pedidos a aceptar</p>


<div class="d-flex flex-col">

    <div class="card col-12 mr-0 mr-1 p-4">
        <div class="card-body">
            @if (sizeof($ventasNoAceptadas) > 0)
                @php
                $heads = [
                    'Cod. Venta',
                    ['label' => 'Dirección', 'width' => 40],
                    ['label' => 'Num. Teléfono', 'width' => 10],
                    ['label' => 'Total', 'no-export' => true, 'width' => 5],
                    ['label' => 'Aceptar pedido', 'no-export' => true, 'width' => 15]
                ];

                $btnAccept = '<button onclick= class="btn btn-xs btn-default text-primary mx-1 shadow justify-content-center" title="Edit">
                                <i class="fa fa-lg fa-fw fa-check-square"></i>
                            </button>';
                $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                                <i class="fa fa-lg fa-fw fa-trash"></i>
                            </button>';
                $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                <i class="fa fa-lg fa-fw fa-eye"></i>
                            </button>';

                            $config = [
                    'language'=> [
                        'url' => '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
                    ]
                ];
                @endphp

                {{-- Minimal example / fill data using the component slot --}}
                <x-adminlte-datatable id="table1" :heads="$heads">
                    @foreach($ventasNoAceptadas as $venta)
                        <tr>
                                <td>{{$venta->codVenta}}</td>
                                <td>{{$venta->direccion}}</td>
                                <td>{{$venta->numTelefono}}</td>
                                <td>$ {{$venta->total}}</td>
                                <td>
                                    <a href="{{route('pedidos.show' , $venta->id)}} " class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                        <i class="fa fa-lg fa-fw fa-check-square"></i>
                                    </a>
                                </td>

                        </tr>
                    @endforeach
                </x-adminlte-datatable>
            @else
            <h2>Vaya, parece que no hay pedidos por aceptar...</h2>

            <div class="d-flex justify-content-between">
            <p class=".text-light-emphasis">
                Puedes pasar por la pestaña "Administrar pedidos" para ver tus pedidos :)
            </p>
            <a class="btn btn-outline-dark" href="{{route('pedidos.index')}}" role="button">Ir a administrar productos</a>
            </div>
            @endif
        </div>
    </div>
</div>
    @stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@if (session("message"))
<script>
    $(document).ready(function(){

    Swal.fire({
            title: "Guardado!",
            text: "El pedido ha sido aceptado",
            icon: "success"
            });

})
</script>
@endif
@stop
