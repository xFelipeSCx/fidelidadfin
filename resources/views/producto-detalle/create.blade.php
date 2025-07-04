@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Producto Detalle
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Producto Detalle</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('producto-detalles.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('producto-detalle.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
