@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Nueva venta</h1>
@stop

@section('content')
    <P>La pagina nueva Pagina está funcionando</P>
    <h2>El id del current user (vendedor) es: <span class="strong">{{ $id }}</span></h2>


    <p>Lista de Productos</p>

    <div class="d-flex flex-row">



        <div class="card col-8 mr-0">
            <div class="card-body p-0">

                @php
                    $heads = [['label' => 'Cod.', 'width' => 3], ['label' => 'Nombr.', 'no-export' => true, 'width' => 5], ['label' => 'Desc.', 'no-export' => true, 'width' => 5], ['label' => '$', 'no-export' => true, 'width' => 2], ['label' => 'Stock', 'no-export' => true, 'width' => 3] ,['label' => 'Agr. Producto', 'no-export' => true, 'width' => 7]];

                    $btnEdit = '';
                    $btnDelete = '<button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                    <i class="fa fa-lg fa-fw fa-trash"></i>
                </button>';
                    $btnAddVenta = '<button type="submit" class="btn btn-xs btn-default text-teal mx-1 shadow" title="AddVenta">
                    <i class="fa fa-lg fa-fw fa-plus-square"></i>
                </button>';

                    $config = [
                        'language'=> [
                            'url' => '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
                        ]
                    ];



                $valorTotal = 0;

                @endphp

                {{-- Minimal example / fill data using the component slot --}}
                <x-adminlte-datatable id="tablaProductos" :heads="$heads" :config="$config">
                    @foreach ($productos as $producto)
                        <tr>

                            <td>{{$producto->codigoBarras}}</td>
                            <td>{{$producto->nombreProd}}</td>
                            <td>{{$producto->descripcionProd}}</td>
                            <td>{{$producto->precioProd}}</td>

                            <td>{{$producto->stock}}</td>

                            <td>
                                <div class="d-flex flex-row justify-content-center">
                                    <div class="mt-2">
                                    <form style="display: inline" action="{{route('ventas.store')}}" method="post" class="formAgregarProducto">
                                        @csrf
                                        {{-- Input código de venta --}}
                                        <input type="hidden" name="codigoVenta" value=" {{session('codVentaId')}}" id="inputCodVenta">
                                        {{-- Input id_producto --}}
                                        <input type="hidden" name="id_producto" value="{{ $producto->id }}">

                                        {{-- Input de cantidad de producto --}}
                                        <x-adminlte-input name="cant_Producto" placeholder="# items" type="number"
                                        igroup-size="sm" min=0 max=10>
                                        </x-adminlte-input>
                                    </div>
                                    <div class="m-2 ml-0">
                                        {!!$btnAddVenta!!}
                                    </div>
                                    </form>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                </x-adminlte-datatable>

            </div>
        </div>

            <div class="card mr-0 ml-1 col-4">
                <div class="card-header">
                    <h2>ID Venta: <span style="color:#808080" id="spanCodVenta">{{$codVenta}}</span></h2>
                    <input type="button" value="Nueva Venta" onclick="">
                </div>
                <div class="card-body">
                    Total productos de venta:

                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Cod.</th>
                            <th scope="col">Cant.</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Total</th>
                            <th scope="col">Acción</th>
                          </tr>
                        </thead>
                        <tbody>
                    @foreach ($productosCodigoVenta as $productoVenta)
                          <tr>
                            <th scope="row">{{$productoVenta->id_producto}}</th>
                            <td>{{$productoVenta->cant_Producto}}</td>



                            @foreach ($productos as $producto)
                                @if ($producto->id == $productoVenta->id_producto)
                                    <td>{{$producto->nombreProd}}</td>
                                    <td>$ {{($productoVenta->cant_Producto)*$producto->precioProd}}</td>
                                    {{$valorTotal = $valorTotal+(($productoVenta->cant_Producto)*$producto->precioProd)}}
                                @endif

                            @endforeach
                            <td>
                                <form style="display: inline" action="{{route('ventas.destroy', $productoVenta)}}" method="post" class="formEliminarProducto">
                                    @csrf
                                    @method('delete')
                                    {!!$btnDelete!!}
                                </form>
                            </td>
                    @endforeach
                          </tr>

                        </tbody>
                      </table>

                      <p>Valor a pagar: $ {{$valorTotal}}</p>

                </div>
            </div>

    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')
    <script> console.log('Hi!');
    generarCodigoAleatorio = function(){

        let result = '';
        const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        const charactersLength = characters.length;
        let counter = 0;
        while (counter < 4) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
        counter += 1;
        }

        let cmpTextCodigoVenta;
        let cmpInputCodigoVenta;

        cmpTextCodigoVenta = document.getElementById('spanCodVenta');
        let codVentaFinal = 'Venta_'+result
        cmpTextCodigoVenta.innerText =  codVentaFinal;

        cmpInputCodigoVenta = document.getElementById('inputCodVenta');
        cmpInputCodigoVenta.value = codVentaFinal;

        }
    </script>

@stop
