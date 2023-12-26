@extends('adminlte::page')

@section('title', 'Cambiar contraseña')

@section('content_header')
    <h1>Cambiar Contraseña</h1>
@stop

@section('content')



    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">


            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-section-border />
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
