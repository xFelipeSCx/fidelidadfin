@extends('layouts.admin')

@section('template_title')
    {{ $marcasDescuento->name ?? __('Show') . " " . __('Marcas Descuento') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Marcas Descuento</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('marcas-descuentos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre:</strong>
                                    {{ $marcasDescuento->nombre }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Correo Electronico:</strong>
                                    {{ $marcasDescuento->correo_electronico }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Numero Telefono:</strong>
                                    {{ $marcasDescuento->numero_telefono }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Activo:</strong>
                                    {{ $marcasDescuento->activo ? 'Activo' : 'Inactivo'}}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
