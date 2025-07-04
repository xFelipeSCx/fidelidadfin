@extends('layouts.admin')

@section('template_title')
Productos
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Productos') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('productos.create') }}" class="btn btn-primary btn-sm float-right"
                                data-placement="left">
                                {{ __('Create New') }}
                            </a>
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success m-4">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <div class="card-body bg-white">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>

                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Precio Puntos</th>
                                    <th>Marca</th>
                                    <th>Regalo</th>
                                    <th>Activo</th>
                                    <th>Foto</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productos as $producto)
                                    <tr>
                                        <td>{{ ++$i }}</td>

                                        <td>{{ $producto->codigo }}</td>
                                        <td>{{ $producto->nombre }}</td>
                                        <td>{{ $producto->precio }}</td>
                                        <td>{{ $producto->precio_puntos }}</td>
                                        <td>{{ $producto->marca }}</td>
                                        <td>{{ $producto->regalo ? 'Activo' : 'Inactivo' }}</td>
                                        <td>{{ $producto->activo ? 'Activo' : 'Inactivo' }}</td>
                                        <td>
                                            @if ($producto->foto)
                                                <img src="{{ asset('images/' . $producto->foto) }}"
                                                    alt="Foto de {{ $producto->nombre }}"
                                                    style="width: 60px; height: 60px; object-fit: cover;" class="img-thumbnail">
                                            @else
                                                <img src="https://via.placeholder.com/60x60?text=Sin+Imagen" alt="Sin imagen"
                                                    class="img-thumbnail">
                                            @endif
                                        </td>


                                        <td>
                                            <form action="{{ route('productos.destroy', $producto->id) }}" method="POST">
                                                <a class="btn btn-sm btn-primary "
                                                    href="{{ route('productos.show', $producto->id) }}"><i
                                                        class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                <a class="btn btn-sm btn-success"
                                                    href="{{ route('productos.edit', $producto->id) }}"><i
                                                        class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i
                                                        class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $productos->withQueryString()->links() !!}
        </div>
    </div>
</div>
@endsection