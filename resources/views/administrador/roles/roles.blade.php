@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <h1>Administración de roles</h1>
@stop

@section('content')
    <p>Lista de Roles</p>

    <div class="card">

        <div class="card-header">
            <x-adminlte-button label="Nuevo" data-toggle="modal" data-target="#modalPurple" theme="primary" icon="fas fa-key" class="float-right"></x-adminlte-button>
        </div>

        <div class="card-body">

            @php
                $heads = ['ID','Nombre',['label' => 'Actions', 'no-export' => true, 'width' => 15]];

                $btnEdit = '';
                $btnDelete = '<button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                  <i class="fa fa-lg fa-fw fa-trash"></i>
              </button>';
                $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                   <i class="fa fa-lg fa-fw fa-eye"></i>
               </button>';

                $config = [
                    'language'=> [
                        'url' => '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
                    ]
                ];
            @endphp

            {{-- Minimal example / fill data using the component slot --}}
            <x-adminlte-datatable id="tablaUsuarios" :heads="$heads" :config="$config">
                @foreach ($roles as $role)
                    <tr>

                        <td>{{$role->id}}</td>
                        <td>{{$role->name}}</td>

                        <td><a href="{{route('roles.edit' , $role)}} " class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </a>
                                <form style="display: inline" action="{{route('roles.destroy', $role)}}" method="post" class="formEliminarProducto">
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


    {{-- Modal para registrar un nuevo rol --}}
<x-adminlte-modal id="modalPurple" title="Nuevo rol" theme="purple"
icon="fas fa-bolt" size='lg' disable-animations>
    <form action="{{route('roles.store')}}" method="post">
        @csrf

        <div class="row">
            <x-adminlte-input name="nombre" label="Nombre" placeholder="Aquí el rol..."
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
