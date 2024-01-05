@extends('adminlte::page')

@section('title', 'Pedidos')

@section('content_header')
    <h1>Historial de pedidos</h1>
@stop

@section('content')

<div class="d-flex flex-row">

    <div class="card col-7 mr-0 mr-1 p-4">

            {{-- Setup data for datatables --}}
        @php
        $heads = [
            ['label'=> 'Cod. venta', 'width' => 5],
            ['label'=> 'Estado', 'width' => 40],
            ['label' => 'Total', 'width' => 5],
            ['label' => 'Ver productos', 'no-export' => true, 'width' => 5],
        ];

        $cont =0;
        @endphp

        {{-- Minimal example / fill data using the component slot --}}
        <x-adminlte-datatable id="table1" :heads="$heads">


                    @foreach($pedidos as $pedido)


                                <tr>
                                    <td>{{$pedido->codVenta}}</td>
                                    <td>


                                    @if ($pedido->estado == 'porAceptar')
                                    <strong>Solicitado</strong>
                                    @elseif ($pedido->estado == 'aceptado')
                                    <strong>En camino</strong>
                                    @else
                                    <strong>Entregado</strong>
                                    @endif
                                    </td>
                                    <td>$ {{$pedido->total}}</td>
                                    <td>
                                        <a href="{{route('comprar.edit' , $pedido->codVenta)}}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Ver productos">
                                            <i class="fa fa-lg fa-fw fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            {{-- @endforeach --}}

                    @endforeach




        </x-adminlte-datatable>
    </div>





    <div class="card col-5 mr-0 p-3">
        @if ($ventasPorCodVenta != ""  && $codVenta != "")

        <div class="card-header">
            <p class="text-warning-emphasis">Lista de productos del pedido:
            <strong> {{$codVenta}} </strong></p>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Cod. barras</th>
                    <th scope="col">Nombre Prod.</th>
                    <th scope="col">Cant</th>


                  </tr>
                </thead>
                <tbody>

                    @foreach ($ventasPorCodVenta as $productoCodigoVenta)
                    @php
                        $cont = $cont+1;
                    @endphp
                    <tr>
                        <th scope="row">{{$cont}}</th>
                        <td>{{$productoCodigoVenta->productos->codigoBarras}}</td>
                        <td>{{$productoCodigoVenta->productos->nombreProd}}</td>
                        <td>{{$productoCodigoVenta->cant_Producto}}</td>

                    </tr>
                  @endforeach
                </tbody>

              </table>

        </div>
        @else
            <div class="card-body">
                <h2>No se ha seleccionado ningún pedido</h2>
                <p class=".text-light-emphasis">Seleccione un pedido de la tabla de la izquierda, para
                    visualizar sus productos
                </p>
            </div>
        @endif

    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
