@extends('layouts.user')

@section('content')
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
<div class="container mt-4">
    <h2 class="mb-4">Mi Carrito</h2>

    @if ($carritos->count())
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Imagen</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio unitario</th>
                        <th>Subtotal</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp

                    @foreach ($carritos as $carrito)
                                    @php
                                        $producto = $productos[$carrito->id_producto] ?? null;
                                        $precio = $producto?->precio ?? 0;
                                        $subtotal = $precio * $carrito->cantidad;
                                        $total += $subtotal;
                                        $modalId = "modalEditar{$carrito->id}";
                                    @endphp

                                    <tr>
                                        <td style="width: 80px;">
                                            @if ($producto && $producto->foto)
                                                <img src="{{ asset('images/' . $producto->foto) }}" alt="foto" class="img-thumbnail"
                                                    style="width: 60px; height: 60px; object-fit: cover;">
                                            @else
                                                <img src="https://via.placeholder.com/60x60?text=Sin+Imagen" class="img-thumbnail" alt="Sin imagen">
                                            @endif
                                        </td>
                                        <td>{{ $producto?->nombre ?? 'Producto no encontrado' }}</td>
                                        <td>{{ $carrito->cantidad }}</td>
                                        <td>${{ number_format($precio, 2) }}</td>
                                        <td>${{ number_format($subtotal, 2) }}</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#{{ $modalId }}">
                                                Editar
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Modal para este producto -->
                                    <div class="modal fade" id="{{ $modalId }}" tabindex="-1" aria-labelledby="{{ $modalId }}Label"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Header -->
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="{{ $modalId }}Label">Editar cantidad -
                                                        {{ $producto?->nombre ?? 'Producto' }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Cerrar"></button>
                                                </div>

                                                <!-- Formulario ACTUALIZAR -->
                                                <form method="POST" action="{{ route('guardar.carrito', $carrito->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="cantidadInput{{ $carrito->id }}" class="form-label">Cantidad</label>
                                                            <input type="number" class="form-control" id="cantidadInput{{ $carrito->id }}"
                                                                name="cantidad" value="{{ $carrito->cantidad }}" min="1" required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <div>
                                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancelar</button>
                                                        </div>
                                                </form> <!-- Cierre del formulario de editar -->

                                                <!-- Formulario ELIMINAR separado completamente -->
                                                <form method="POST" action="{{ route('eliminar.carrito', $carrito->id) }}" class="d-inline"
                                                    onsubmit="return confirm('¿Eliminar este producto?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                        </div>

                    @endforeach


        </tbody>
        <tfoot>
            <tr>
                <th colspan="4" class="text-end">Total:</th>
                <th>${{ number_format($total, 2) }}</th>
            </tr>
        </tfoot>
        </table>

        <!-- Botón pagar -->
        <div class="text-end mt-3">
            <a href="{{ route('carrito.pagar') }}" class="btn btn-primary">
                <i class="bi bi-credit-card"></i> Pagar
            </a>
        </div>

        <!-- Paginación -->
        <div class="mt-3">
            {{ $carritos->links() }}
        </div>
    @else
        <div class="alert alert-info">
            Tu carrito está vacío.
        </div>
    @endif
</div>
@endsection