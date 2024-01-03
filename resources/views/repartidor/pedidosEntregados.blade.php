@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    <h1>Pedidos por entregar/entregados</h1>
@stop

@section('content')
    @php
        $contPedidosPorEntregar = 0;
        $pedidosEntregados = 0;
    @endphp


    <div class="d-flex flex-column">
        <div>

            <x-adminlte-card title="Pedidos por entregar" theme="danger" icon="fas fa-lg fa-exclamation-triangle"
                collapsible="collapsed">

                {{-- Setup data for datatables --}}
                @php
                    $heads = ['ID_Pedido', ['label' => 'Dirección', 'width' => 40], ['label' => 'Teléfono Contacto', 'width' => 10], ['label' => 'Total', 'no-export' => true, 'width' => 5], ['label' => 'Acción', 'no-export' => true, 'width' => 5]];

                @endphp

                {{-- Minimal example / fill data using the component slot --}}
                <x-adminlte-datatable id="table1" :heads="$heads">
                    @foreach ($pedidos as $pedido)
                        @if ($pedido->estado == 'En camino')
                            <tr>
                                <td>{{ $pedido->userVenta->id }}</td>
                                <td>{{ $pedido->userVenta->direccion }}</td>
                                <td>{{ $pedido->userVenta->numTelefono }}</td>
                                <td> $ {{ $pedido->userVenta->total }}</td>
                                <td>
                                    <a href="{{route('pedidos.entregarPedidos' , $pedido->id)}}" class="btn btn-warning btn-sm float-center" title="Visualizar productos">
                                        Entregar</a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </x-adminlte-datatable>


            </x-adminlte-card>

        </div>
        <div>
            <x-adminlte-card title="Pedidos entregados" theme="success" icon="fas fa-lg fa-thumbs-up"
                collapsible="collapsed">

                {{-- Setup data for datatables --}}
                @php
                    $heads = ['ID_Pedido', ['label' => 'Dirección', 'width' => 40], ['label' => 'Teléfono Contacto', 'width' => 10], ['label' => 'Total', 'no-export' => true, 'width' => 5]];

                @endphp

                {{-- Minimal example / fill data using the component slot --}}
                <x-adminlte-datatable id="table2" :heads="$heads">
                    @foreach ($pedidos as $pedido)
                        @if ($pedido->estado == 'Entregado')
                            <tr>
                                <td>{{ $pedido->userVenta->id }}</td>
                                <td>{{ $pedido->userVenta->direccion }}</td>
                                <td>{{ $pedido->userVenta->numTelefono }}</td>
                                <td> $ {{ $pedido->userVenta->total }}</td>
                            </tr>
                        @endif
                    @endforeach
                </x-adminlte-datatable>


            </x-adminlte-card>
        </div>
    </div>




@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
