@extends('adminlte::page')



@section('title', 'Carrito')

@section('content_header')
    <h1>Carrito de compras: <strong>{{$codVenta}}</strong></h1>
@stop

@section('content')

@php
    $cont = 0;
    $valorTotal = 0;
    $btnDelete = '<button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                    <i class="fa fa-lg fa-fw fa-trash"></i>
                </button>';
@endphp

<div class="card col-6 mr-0 p-3">

    @if ($ventasPorCodVenta != "" && $codVenta != "" )
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
                    <th scope="col">Precio</th>
                    <th scope="col">Accción</th>
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
                        <td>$ {{($productoCodigoVenta->cant_Producto)*$productoCodigoVenta->productos->precioProd}}</td>
                        <td>
                            <form style="display: inline" action="{{route('ventas.destroy', $productoCodigoVenta)}}" method="post" class="formEliminarProducto">
                                @csrf
                                @method('delete')
                                {!!$btnDelete!!}
                            </form>
                        </td>

                                {{-- Sumatorio del valor total --}}
                                @php
                                $valorTotal = $valorTotal+(($productoCodigoVenta->cant_Producto)*$productoCodigoVenta->productos->precioProd);
                                @endphp

                    </tr>
                  @endforeach
                </tbody>

              </table>
              <hr>
              <div class="d-flex flex-row justify-content-between">
                <div>
                    <p> Total: <strong>$ {{$valorTotal}}</strong></p>
                </div>
                <div class="d-flex justify-content-end">
                    <a class="btn btn-info mr-1" href="{{route('comprar.index')}}" role="button">Agregar productos</a>
                    <x-adminlte-button label="Finalizar compra" theme="success" icon="fas fa-thumbs-up" data-toggle="modal" data-target="#modalPurple" class="float-right"/>
                </div>


              </div>

        </div>

    @else
        <div class="card-body">
            <h2>No se ha agregado nada al carrito de compras</h2>
            <p class=".text-light-emphasis">Puedes agregar los productos que quieras desde la tienda....
            </p>
            <a class="btn btn-outline-dark" href="{{route('comprar.index')}}" role="button">Ir a la tienda</a>
        </div>
    @endif


</div>

    {{-- Modal para registrar un nuevo registro en user_venta --}}
    <x-adminlte-modal id="modalPurple" title="Datos de entrega" theme="purple"
    icon="fas fa-truck" size='lg' disable-animations>
        <form action="{{route('users_ventas.guardarVentaOnline')}}" method="post">
            @csrf

            <div class="row">
                <x-adminlte-input name="direccion" label="Dirección de entrega" placeholder="Aquí su dirección..."
                fgroup-class="col-md-6" ></x-adminlte-input>
            </div>
            <div class="row">
                <x-adminlte-input name="numTelefono" label="Número de teléfono" placeholder="Aquí el número de teléfono de contacto..."
                fgroup-class="col-md-6" ></x-adminlte-input>
            </div>

            {{-- Campos escondidos para valor Total y el estado, e incluido el user_id + codVenta --}}
            <div class="row">
                <x-adminlte-input type="hidden" name="total" label="" value="{{$valorTotal}}"
                fgroup-class="col-md-6" ></x-adminlte-input>
            </div>
            <div class="row">
                <x-adminlte-input type="hidden" name="estado" label="" value="porAceptar" placeholder="Aquí el permiso..."
                fgroup-class="col-md-6" ></x-adminlte-input>
            </div>
            <div class="row">
                <x-adminlte-input type="hidden" name="user_id" label="" value="{{$id_currentUser}}" placeholder="Aquí el permiso..."
                fgroup-class="col-md-6" ></x-adminlte-input>
            </div>
            <div class="row">
                <x-adminlte-input type="hidden" name="codVenta" label="" value="{{$codVenta}}" placeholder="Aquí el permiso..."
                fgroup-class="col-md-6" ></x-adminlte-input>
            </div>

            <x-adminlte-button type="submit" label="Guardar" theme="outline-danger" icon="fas fa-key"></x-adminlte-button>

        </form>
    </x-adminlte-modal>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
