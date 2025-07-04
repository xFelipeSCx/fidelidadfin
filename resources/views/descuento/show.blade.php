@extends('layouts.admin')

@section('template_title')
    {{ $descuento->name ?? __('Show') . " " . __('Descuento') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Descuento</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('descuentos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Marca Id:</strong>
                                    {{ $descuento->marca_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Descuento:</strong>
                                    {{ $descuento->descuento }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Descripcion:</strong>
                                    {{ $descuento->descripcion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Activo:</strong>
                                    {{ $descuento->activo }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
