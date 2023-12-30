@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista ventas</h1>
@stop

@section('content')
    <P>Aquí se encontrará la tabla de ventas</P>
    {{-- {{$userVentaVar}} --}}
    AQUÍ SE TIENE QUE TRAER LOS DATOS DE TODAS LAS VENTAS DE ACUERDO AL ID DEL USUARIO

    @foreach ($ventasPorIdVendedor as $venta)
            {{$venta->ventas}}
    @endforeach

    <div class="d-flex flex-row">
        <div>

                {{-- Setup data for datatables --}}
            @php
            $heads = [
                'ID',
                'Name',
                ['label' => 'Phone', 'width' => 40],
                ['label' => 'Actions', 'no-export' => true, 'width' => 5],
            ];


            @endphp

            {{-- Minimal example / fill data using the component slot --}}
            <x-adminlte-datatable id="table1" :heads="$heads">


                        @foreach($ventasPorIdVendedor as $venta)



                                 {{-- @foreach ($pedido->userVenta as $userVenta) --}}

                                    {{-- {{$pedido->userVenta->ventas->productos}} --}}
                                    <tr>
                                        <td>{{$venta->codVenta}}</td>
                                        <td>{{$venta->total}}</td>
                                        <td></td>
                                        <td>
                                            <a href="{{route('ventas.edit' , $venta->codVenta)}}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                                <i class="fa fa-lg fa-fw fa-check-square"></i>
                                            </a>

                                        </td>
                                    </tr>
                                {{-- @endforeach --}}

                        @endforeach




            </x-adminlte-datatable>
        </div>





        <div class="mt-10">
            @if ($ventasPorCodVenta != "")
            <ul class="list-group">
                @foreach ( $ventasPorCodVenta as $productoCodigoVenta )
                    <li class="list-group-item" aria-current="true">
                        {{$productoCodigoVenta->productos->nombreProd}}
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"  id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                              Default checkbox
                            </label>

                            <a href="{{ route('pedidos.despachar', $productoCodigoVenta->codigoVenta) }} " class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                <i class="fa fa-lg fa-fw fa-bath"></i>
                            </a>
                        </div>
                    </li>
                @endforeach

            </ul>

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
