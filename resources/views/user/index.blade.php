@extends('layouts.admin')

@section('template_title')
Users
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Usuarios') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm float-right"
                                data-placement="left">
                                {{ __('Nuevo Usuario') }}
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

                                    <th>Tarjeta</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Correo electronico</th>
                                    <th>Numero de telefono</th>
                                    <th>Direccion</th>
                                    <th>Estado</th>
                                    <th>Ciudad</th>
                                    <th>Puntos</th>
                                    <th>Rol</th>
                                    <th>Activo</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ ++$i }}</td>

                                        <td>{{ $user->card }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->lastname }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->direccion }}</td>
                                        <td>{{ $user->estado }}</td>
                                        <td>{{ $user->ciudad }}</td>
                                        <td>{{ $user->puntos }}</td>
                                        <td>{{ $user->rol }}</td>
                                        <td>{{ $user->activo ? 'Activo' : 'Inactivo' }}</td>


                                        <td>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                <a class="btn btn-sm btn-primary "
                                                    href="{{ route('users.show', $user->id) }}"><i
                                                        class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                <a class="btn btn-sm btn-success"
                                                    href="{{ route('users.edit', $user->id) }}"><i
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
            {!! $users->withQueryString()->links() !!}
        </div>
    </div>
</div>
@endsection