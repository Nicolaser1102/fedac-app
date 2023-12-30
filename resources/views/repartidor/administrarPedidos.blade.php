@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Administrar pedidos</h1>
@stop

@section('content')
    <p>Aquí se podrán administrar todos los pedidos</p>

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


                        @foreach($pedidos as $pedido)

                            @if ($pedido->estado == "Solicitado")


                                 {{-- @foreach ($pedido->userVenta as $userVenta) --}}

                                    {{-- {{$pedido->userVenta->ventas->productos}} --}}
                                    <tr>
                                        <td>{{$pedido->userVenta}}</td>
                                        <td>a</td>
                                        <td></td>
                                        <td>
                                            <a href="{{route('pedidos.edit' , $pedido->userVenta->codVenta)}}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                                <i class="fa fa-lg fa-fw fa-check-square"></i>
                                            </a>

                                        </td>
                                    </tr>
                                {{-- @endforeach --}}
                            @endif
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
            <button class="btn btn-primary" onclick="location.href = '{{ route('pedidos.update', $pedido) }}'">Despachar</button>
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
