@extends('adminlte::page')

@section('title', 'Ventas realizadas')

@section('content_header')
    <h1>Lista de las ventas realizadas</h1>
@stop

@section('content')

    <div class="d-flex flex-row">

        <div class="card col-6 mr-0 mr-1 p-4">


            @php
                $heads = [
                    'Cod. venta',
                    ['label' => 'Total', 'width' => 5],
                    ['label' => 'Estado', 'width' => 5],
                    ['label' => 'Visualizar productos', 'no-export' => true, 'width' => 5],
                ];
                $cont = 0;
                $direccion = "";
                $telefonoContacto = "";
            @endphp

            {{-- Tabla para visualizar las ventas por usuario --}}
            <x-adminlte-datatable id="table1" :heads="$heads">


                        @foreach($ventasPorIdVendedor as $venta)
                                    <tr>
                                        <td>{{$venta->codVenta}}</td>
                                        <td>{{$venta->total}}</td>
                                        <td>{{$venta->estado}}</td>
                                        <td>
                                            <a href="{{route('ventas.edit' , $venta->codVenta)}}" class="btn btn-xs btn-default text-teal mx-1 shadow float-right" title="Visualizar productos">
                                                <i class="fa fa-lg fa-fw fa-eye"></i>
                                                @php
                                                    $direccion = $venta->direccion;
                                                    $telefonoContacto = $venta->numTelefono;
                                                @endphp
                                            </a>
                                        </td>
                                    </tr>
                        @endforeach

            </x-adminlte-datatable>
        </div>





        <div class="card col-6 mr-0 p-3">

            @if ($ventasPorCodVenta != "" && $codVenta != "")
                <div class="card-header">
                    <p class="text-warning-emphasis">Lista de productos de la venta:
                    <strong> {{$codVenta}} </strong></p>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
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
                                <td>{{$productoCodigoVenta->productos->nombreProd}}</td>
                                <td>{{$productoCodigoVenta->cant_Producto}}</td>
                            </tr>
                          @endforeach
                        </tbody>

                      </table>
                      <hr>
                      <p><strong>- Dirección: </strong>{{$direccion}}</p>
                      <p><strong>- Teléfono de contacto: </strong>{{ $telefonoContacto}}</p>
                </div>

            @else
                <div class="card-body">
                    <h2>No se ha seleccionado ninguna venta</h2>
                    <p class=".text-light-emphasis">Seleccione una venta de la tabla de la izquierda, para
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


