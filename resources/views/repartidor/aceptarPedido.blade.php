@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Aceptar pedido</h1>
@stop

@section('content')
    <p>En esta página se podrán aceptar las solicitudes de pedidos que lleguen</p>

    {{-- Setup data for datatables --}}
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
    @stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
