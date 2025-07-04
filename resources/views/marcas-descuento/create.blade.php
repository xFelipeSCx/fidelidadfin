@extends('layouts.admin')
@section('template_title')
    {{ __('Create') }} Marcas Descuento
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Marcas Descuento</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('marcas-descuentos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('marcas-descuento.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
