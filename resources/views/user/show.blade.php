@extends('layouts.admin')

@section('template_title')
{{ $user->name ?? __('Show') . " " . __('User') }}
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                    <div class="float-left">
                        <span class="card-title">{{ __('Datos') }} de usuario</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary btn-sm" href="{{ route('users.index') }}"> {{ __('Back') }}</a>
                    </div>
                </div>

                <div class="card-body bg-white">

                    <div class="form-group mb-2 mb20">
                        <strong>Tarjeta: </strong>
                        {{ $user->card }}
                    </div>
                    <div class="form-group mb-2 mb20">
                        <strong>Nombres: </strong>
                        {{ $user->name }}
                    </div>
                    <div class="form-group mb-2 mb20">
                        <strong>Apellidos: </strong>
                        {{ $user->lastname }}
                    </div>
                    <div class="form-group mb-2 mb20">
                        <strong>Correo electronico:</strong>
                        {{ $user->email }}
                    </div>
                    <div class="form-group mb-2 mb20">
                        <strong>Telefono:</strong>
                        {{ $user->phone }}
                    </div>
                    <div class="form-group mb-2 mb20">
                        <strong>Direccion:</strong>
                        {{ $user->direccion }}
                    </div>
                    <div class="form-group mb-2 mb20">
                        <strong>Estado:</strong>
                        {{ $user->estado }}
                    </div>
                    <div class="form-group mb-2 mb20">
                        <strong>Ciudad:</strong>
                        {{ $user->ciudad }}
                    </div>
                    <div class="form-group mb-2 mb20">
                        <strong>Puntos:</strong>
                        {{ $user->puntos }}
                    </div>
                    <div class="form-group mb-2 mb20">
                        <strong>Rol:</strong>
                        {{ $user->rol }}
                    </div>
                    <div class="form-group mb-2 mb20">
                        <strong>Activo:</strong>
                        {{ $user->activo ? 'Activo' : 'Inactivo' }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection