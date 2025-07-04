@extends('layouts.admin')

@section('template_title')
{{ $producto->name ?? __('Show') . " " . __('Producto') }}
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                    <div class="float-left">
                        <span class="card-title">{{ __('Show') }} Producto</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary btn-sm" href="{{ route('productos.index') }}"> {{ __('Back') }}</a>
                    </div>
                </div>

                <div class="card-body bg-white">

                    <div class="form-group mb-2 mb20">
                        <strong>Codigo:</strong>
                        {{ $producto->codigo }}
                    </div>
                    <div class="form-group mb-2 mb20">
                        <strong>Nombre:</strong>
                        {{ $producto->nombre }}
                    </div>
                    <div class="form-group mb-2 mb20">
                        <strong>Precio:</strong>
                        {{ $producto->precio }}
                    </div>
                    <div class="form-group mb-2 mb20">
                        <strong>Precio Puntos:</strong>
                        {{ $producto->precio_puntos }}
                    </div>
                    <div class="form-group mb-2 mb20">
                        <strong>Marca:</strong>
                        {{ $producto->marca }}
                    </div>
                    <div class="form-group mb-2 mb20">
                        <strong>Regalo:</strong>
                        {{ $producto->regalo ? 'Activo' : 'Inactivo' }}
                    </div>
                    <div class="form-group mb-2 mb20">
                        <strong>Activo:</strong>
                        {{ $producto->activo ? 'Activo' : 'Inactivo' }}
                    </div>
                    <div class="form-group mb-2 mb20">
                        <strong>Foto:</strong>
                        @if ($producto->foto)
                            <img src="{{ asset('images/' . $producto->foto) }}" alt="Foto de {{ $producto->nombre }}"
                                style="width: 60px; height: 60px; object-fit: cover;" class="img-thumbnail">
                        @else
                            <img src="https://via.placeholder.com/60x60?text=Sin+Imagen" alt="Sin imagen"
                                class="img-thumbnail">
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection