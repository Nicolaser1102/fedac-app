@extends('adminlte::page')

@section('title', 'Lista de Productos')

@section('content_header')
    <h1>Administración de productos</h1>
@stop

@section('content')
    <p>Lista de Productos</p>

    <div class="d-flex justify-content-end mb-1">
    <a href="{{route('producto.generarReporte')}}" type="button" class="btn btn-primary">Generar reporte de productos</a>
    </div>

    <div class="card">
        <div class="card-body">

            @php
                $heads = ['Código Barras', 'Nombre', 'Descripción', 'Precio', ['label' => 'Fecha de Vencimiento', 'width' => 20], 'Stock' ,['label' => 'Acciones', 'no-export' => true, 'width' => 15]];

                $btnEdit = '';
                $btnDelete = '<button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                  <i class="fa fa-lg fa-fw fa-trash"></i>
              </button>';


                $config = [
                    'language'=> [
                        'url' => '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
                    ]
                ];
            @endphp

            {{-- Minimal example / fill data using the component slot --}}
            <x-adminlte-datatable id="tablaProductos" :heads="$heads" :config="$config">
                @foreach ($productos as $producto)
                    <tr>

                        <td>{{$producto->codigoBarras}}</td>
                        <td>{{$producto->nombreProd}}</td>
                        <td>{{$producto->descripcionProd}}</td>
                        <td>{{$producto->precioProd}}</td>
                        <td>{{$producto->fechaVencProd}}</td>
                        <td>{{$producto->stock}}</td>
                        <td><a href="{{route('producto.edit' , $producto)}} " class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </a>
                                <form style="display: inline" action="{{route('producto.destroy', $producto)}}" method="post" class="formEliminarProducto">
                                    @csrf
                                    @method('delete')
                                    {!!$btnDelete!!}
                                </form>


                        </td>

                    </tr>
                @endforeach
            </x-adminlte-datatable>

        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $(document).ready(function(){
            $('.formEliminarProducto').submit(function(e){
                e.preventDefault();
                Swal.fire({
                    title: "Estás seguro?",
                    text: "Se eliminará el registro",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                    }).then((result) => {
                    if (result.isConfirmed) {

                        this.submit();

                        Swal.fire({
                        title: "Borrado!",
                        text: "El producto ha sido borrado.",
                        icon: "success"
                        });
                    }
                    });
            })
        })
    </script>
@stop
