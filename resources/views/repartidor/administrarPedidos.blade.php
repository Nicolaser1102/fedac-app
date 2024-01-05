@extends('adminlte::page')

@section('title', 'Administrar pedidos')

@section('content_header')
    <h1>Administrar pedidos</h1>
@stop

@section('content')
    <p>Pedidos para despachar</p>

    <div class="d-flex flex-row">

        <div class="card col-7 mr-0 mr-1 p-4">

                {{-- Setup data for datatables --}}
            @php
            $heads = [
                ['label'=> 'Cod. venta', 'width' => 5],
                ['label'=> 'Dirección', 'width' => 40],
                ['label' => 'Total', 'width' => 5],
                ['label' => 'Ver productos', 'no-export' => true, 'width' => 5],
            ];

            $cont =0;
            @endphp

            {{-- Minimal example / fill data using the component slot --}}
            <x-adminlte-datatable id="table1" :heads="$heads">


                        @foreach($pedidos as $pedido)

                            @if ($pedido->estado == "Solicitado")


                                    <tr>
                                        <td>{{$pedido->userVenta->codVenta}}</td>
                                        <td> <strong>{{$pedido->userVenta->direccion}}</strong></td>
                                        <td>$ {{$pedido->userVenta->total}}</td>
                                        <td>
                                            <a href="{{route('pedidos.edit' , $pedido->userVenta->codVenta)}}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                                <i class="fa fa-lg fa-fw fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                {{-- @endforeach --}}
                            @endif
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
                        <th scope="col">Check</th>

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
                            <td class="d-flex justify-content-center"><input class="form-check-input " type="checkbox" value="" id="check_{{$productoCodigoVenta->id}}"
                                onclick="javacript:enableDespacharButton(this);"></td>
                        </tr>
                      @endforeach
                    </tbody>

                  </table>


                <hr>
                <button class="btn btn-danger float-right mt-3" onclick="location.href = '{{ route('pedidos.despachar', $productoCodigoVenta->codigoVenta) }}';" id="btnDespachar" disabled>Despachar</button>
            </div>
            @else
                <div class="card-body">
                    <h2>No se ha seleccionado ningún pedido</h2>
                    <p class=".text-light-emphasis">Seleccione un pedido de la tabla de la izquierda, para
                        despachar sus productos
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
    <script> console.log('Hi!');

    let contCheckBoxes = 0;
    let cont = {{$cont}};



    let cmpBoton;
    cmpBoton = document.getElementById('btnDespachar');

    enableDespacharButton = function (cb){

        if (cb.checked == 1) {
            contCheckBoxes = contCheckBoxes+1;

            }

            if (cb.checked == 0) {
             contCheckBoxes = contCheckBoxes-1;
            }

        if (contCheckBoxes == cont){
            cmpBoton.disabled = false;
        }
    }


</script>

@if (session("message"))
        <script>
            $(document).ready(function(){

            Swal.fire({
                    title: "Guardado!",
                    text: "El producto ha sido editado correctamente.",
                    icon: "success"
                    });

    })
        </script>
    @endif

@stop
