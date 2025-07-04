@extends('layouts.user')

@section('content')
@if ($message = Session::get('success'))
    <div class="alert alert-success m-4">
        <p>{{ $message }}</p>
    </div>
@endif
<div class="container">
    <h1 class="mb-4 text-center">🛍️ Productos Disponibles</h1>

    <div class="row">
        @foreach ($productos as $producto)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <a href="#" class="text-decoration-none text-reset">
                        @if ($producto->foto)
                            <img src="{{ asset('images/' . $producto->foto) }}" class="card-img-top"
                                alt="{{ $producto->nombre }}" style="height: 200px; object-fit: cover;">
                        @else
                            <img src="https://via.placeholder.com/300x200?text=Sin+Imagen" class="card-img-top"
                                alt="Sin imagen">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">{{ $producto->nombre }}</h5>
                            <p class="card-text fw-bold">${{ number_format($producto->precio, 2) }}</p>
                            @if (!empty($producto->descripcion))
                                <p class="card-text text-muted">{{ Str::limit($producto->descripcion, 100) }}</p>
                            @endif
                        </div>
                    </a>

                    <!-- Botón añadir al carrito -->
                    <div class="card-footer bg-transparent border-top-0 text-center">
                        <form action="{{ route('añadir.carrito') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id_producto" value="{{ $producto->id }}">
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-cart-plus"></i> Añadir al carrito
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


    <div class="d-flex justify-content-center">
        {{ $productos->links() }}
    </div>
</div>
@endsection