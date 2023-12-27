@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Administración de Productos</h1>
@stop

@section('content')

{{-- Código html para mostrar el formulario de agregar un Nuevo producto --}}

<h4>Ingrese la información del nuevo producto</h4>
<hr>

<form action="{{route('producto.store')}}" method="post">
    @csrf

    <div class="row">
            {{-- Input nombreProd--}}
        <x-adminlte-input type="text" name="nombreProd" label="Nombre del producto" placeholder="" label-class="text-lightblue" fgroup-class="col-md-6">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fa fa-lemon text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>


        {{-- Input codBarras del Producto --}}
        <x-adminlte-input name="codigoBarras" label="Código de barras del producto" fgroup-class="col-md-6">
            <x-slot name="prependSlot">
                <div class="input-group-text text-purple">
                    <i class="fas fa-barcode"></i>
                </div>
            </x-slot>
            <x-slot name="bottomSlot">
                <span class="text-sm text-gray">
                    [El codigo debe tener 10 dígitos]
                </span>
            </x-slot>
        </x-adminlte-input>
    </div>

    <div class="row">

    {{-- Input de descripcion del producto --}}
    <x-adminlte-input name="descripcionProd" label="Descripción del producto" placeholder=""
            fgroup-class="col-md-12" disable-feedback></x-adminlte-input>


    </div>

    {{-- Input del precio del producto --}}
    <div class="row">

        <x-adminlte-input name="precioProd" label="Precio del producto" placeholder="" label-class="text-danger"  fgroup-class="col-md-4">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fa fa-usd text-danger"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        {{-- Input de la fecha de Vencimento del producto --}}

        <x-adminlte-input name="fechaVencProd" label="Fecha Vencimiento del Producto" fgroup-class="col-md-4">
            <x-slot name="prependSlot">
                <div class="input-group-text text-olive">
                    <i class="fas fa-calendar"></i>
                </div>
            </x-slot>
            <x-slot name="bottomSlot">
                <span class="text-sm text-gray">
                    [Formato: "24/11/2022"]
                </span>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="stock" label="Stock del Producto" placeholder="" type="number"
        igroup-size="sm" min=1 max=10 fgroup-class="col-md-4">
        <x-slot name="appendSlot">
            <div class="input-group-text bg-dark">
                <i class="fas fa-hashtag"></i>
            </div>
        </x-slot>
    </x-adminlte-input>

    </div>

    <div class="row">

            <x-adminlte-input name="imagenUrlProd" label="URL de la imagen del producto" placeholder=""
                fgroup-class="col-md-10" disable-feedback/>

    </div>
            {{-- <x-adminlte-button theme="primary" label="Guardar" fgroup-class="col-md-2 mt-4"/> --}}
            <x-adminlte-button class="btn btn-success btn-sm" type="submit" label="Guardar" theme="success" icon="fas fa-lg fa-save"/>

</form>



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
