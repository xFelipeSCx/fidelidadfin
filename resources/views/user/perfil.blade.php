@extends('layouts.user')

@section('content')
<div class="container mt-5 d-flex justify-content-center">
    <div style="max-width: 700px; width: 100%;">
        <div class="text-center mb-4">
            <i class="bi bi-person-circle" style="font-size: 4rem; color: #0d6efd;"></i>
            <h2 class="mt-2">Mi Perfil</h2>
        </div>

        @php
            $user = auth()->user();
        @endphp

        <!-- Datos Personales -->
        <div class="card shadow-sm mb-4 p-4">
            <h5 class="mb-3">Datos Personales</h5>
            <div class="row">
                <div class="col-md-6 mb-2"><strong>Nombre:</strong> {{ $user->name }} {{ $user->lastname }}</div>
                <div class="col-md-6 mb-2"><strong>Email:</strong> {{ $user->email }}</div>
                <div class="col-md-6 mb-2"><strong>Teléfono:</strong> {{ $user->phone }}</div>
            </div>
        </div>

        <!-- Dirección -->
        <div class="card shadow-sm mb-4 p-4">
            <h5 class="mb-3">Dirección</h5>
            <div class="row">
                <div class="col-md-6 mb-2"><strong>Dirección:</strong> {{ $user->direccion }}</div>
                <div class="col-md-6 mb-2"><strong>Estado:</strong> {{ $user->estado }}</div>
                <div class="col-md-6 mb-2"><strong>Ciudad:</strong> {{ $user->ciudad }}</div>
            </div>
        </div>

        <!-- Datos de Tarjeta y Otros -->
        <div class="card shadow-sm mb-4 p-4">
            <h5 class="mb-3">Datos de Tarjeta y Cuenta</h5>
            <div class="row">
                <div class="col-md-6 mb-2"><strong>Tarjeta:</strong> {{ $user->card }}</div>
                <div class="col-md-6 mb-2"><strong>Puntos:</strong> {{ $user->puntos }}</div>

            </div>
        </div>
    </div>
</div>
@endsection