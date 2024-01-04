@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Nueva venta</h1>
@stop

@section('content')
    <div class="d-flex flex-row">



        <div class="card col-8 mr-0">
            <div class="card-header mb-2 mt-2">
                <h4>
                    <strong>Lista de productos</strong>
                </h4>
            </div>
            <div class="card-body">

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

                {{-- TABLA QUE MUESTRAN TODOS LOS PRODUCTOS --}}
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
                </div>
                <div class="card-body">
                    Total productos de venta:

                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Cant.</th>
                            <th scope="col">Total</th>
                            <th scope="col">Acción</th>
                          </tr>
                        </thead>
                        <tbody>
                    @foreach ($productosCodigoVenta as $productoVenta)
                          <tr>
                            <th scope="row">{{$productoVenta->productos->nombreProd}}</th>
                            <td>{{$productoVenta->cant_Producto}}</td>
                            <td>$ {{($productoVenta->cant_Producto)*$productoVenta->productos->precioProd}}</td>

                                {{-- Sumatorio del valor total --}}
                                {{$valorTotal = $valorTotal+(($productoVenta->cant_Producto)*$productoVenta->productos->precioProd)}}

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

                      <p>Valor a pagar:  <strong>$ {{$valorTotal}}</strong></p>

                      @if (count($productosCodigoVenta) > 0)
                        <x-adminlte-button label="Finalizar Venta" theme="success" icon="fas fa-thumbs-up" data-toggle="modal" data-target="#modalPurple" class="float-right"/>
                      @endif

                </div>
            </div>

    </div>


    {{-- Modal para registrar un nuevo registro en user_venta --}}
<x-adminlte-modal id="modalPurple" title="Datos de entrega" theme="purple"
icon="fas fa-bolt" size='lg' disable-animations>
    <form action="{{route('users_ventas.store')}}" method="post">
        @csrf

        <div class="row">
            <x-adminlte-input name="direccion" label="Dirección de entrega" placeholder="Aquí su dirección..."
            fgroup-class="col-md-6" disable-feedback></x-adminlte-input>
        </div>
        <div class="row">
            <x-adminlte-input name="numTelefono" label="Número de teléfono" placeholder="Aquí el número de teléfono de contacto..."
            fgroup-class="col-md-6" disable-feedback></x-adminlte-input>
        </div>

        {{-- Campos escondidos para valor Total y el estado, e incluido el user_id + codVenta --}}
        <div class="row">
            <x-adminlte-input type="hidden" name="total" label="" value="{{$valorTotal}}"
            fgroup-class="col-md-6" disable-feedback></x-adminlte-input>
        </div>
        <div class="row">
            <x-adminlte-input type="hidden" name="estado" label="" value="porAceptar" placeholder="Aquí el permiso..."
            fgroup-class="col-md-6" disable-feedback></x-adminlte-input>
        </div>
        <div class="row">
            <x-adminlte-input type="hidden" name="user_id" label="" value="{{$id}}" placeholder="Aquí el permiso..."
            fgroup-class="col-md-6" disable-feedback></x-adminlte-input>
        </div>
        <div class="row">
            <x-adminlte-input type="hidden" name="codVenta" label="" value="{{$codVenta}}" placeholder="Aquí el permiso..."
            fgroup-class="col-md-6" disable-feedback></x-adminlte-input>
        </div>

        <x-adminlte-button type="submit" label="Guardar" theme="outline-danger" icon="fas fa-key"></x-adminlte-button>

    </form>
</x-adminlte-modal>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')
    <script> console.log('Hi!');

    </script>

@stop
