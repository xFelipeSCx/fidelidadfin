<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="card" class="form-label">{{ __('Tarjeta') }}</label>
            <input type="text" name="card" class="form-control @error('card') is-invalid @enderror"
                value="{{ old('card', $user?->card) }}" id="card" placeholder="Card">
            {!! $errors->first('card', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Nombres') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $user?->name) }}" id="name" placeholder="Name">
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="lastname" class="form-label">{{ __('Apellidos') }}</label>
            <input type="text" name="lastname" class="form-control @error('lastname') is-invalid @enderror"
                value="{{ old('lastname', $user?->lastname) }}" id="lastname" placeholder="Lastname">
            {!! $errors->first('lastname', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="email" class="form-label">{{ __('Correo electronico') }}</label>
            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email', $user?->email) }}" id="email" placeholder="Email">
            {!! $errors->first('email', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="phone" class="form-label">{{ __('Telefono') }}</label>
            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                value="{{ old('phone', $user?->phone) }}" id="phone" placeholder="Phone">
            {!! $errors->first('phone', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="direccion" class="form-label">{{ __('Direccion') }}</label>
            <input type="text" name="direccion" class="form-control @error('direccion') is-invalid @enderror"
                value="{{ old('direccion', $user?->direccion) }}" id="direccion" placeholder="Direccion">
            {!! $errors->first('direccion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2">
            <label for="estado" class="form-label">{{ __('Estado') }}</label>
            <select name="estado" id="estado" class="form-control @error('estado') is-invalid @enderror">
                @php
                    $estadosMexico = [
                        'Aguascalientes',
                        'Baja California',
                        'Baja California Sur',
                        'Campeche',
                        'Chiapas',
                        'Chihuahua',
                        'Ciudad de México',
                        'Coahuila',
                        'Colima',
                        'Durango',
                        'Estado de México',
                        'Guanajuato',
                        'Guerrero',
                        'Hidalgo',
                        'Jalisco',
                        'Michoacán',
                        'Morelos',
                        'Nayarit',
                        'Nuevo León',
                        'Oaxaca',
                        'Puebla',
                        'Querétaro',
                        'Quintana Roo',
                        'San Luis Potosí',
                        'Sinaloa',
                        'Sonora',
                        'Tabasco',
                        'Tamaulipas',
                        'Tlaxcala',
                        'Veracruz',
                        'Yucatán',
                        'Zacatecas'
                    ];
                @endphp

                @foreach ($estadosMexico as $estado)
                    <option value="{{ $estado }}" {{ old('estado', $user?->estado) === $estado ? 'selected' : '' }}>
                        {{ $estado }}
                    </option>
                @endforeach
            </select>

            {!! $errors->first('estado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="ciudad" class="form-label">{{ __('Ciudad') }}</label>
            <input type="text" name="ciudad" class="form-control @error('ciudad') is-invalid @enderror"
                value="{{ old('ciudad', $user?->ciudad) }}" id="ciudad" placeholder="Ciudad">
            {!! $errors->first('ciudad', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="puntos" class="form-label">{{ __('Puntos') }}</label>
            <input type="text" name="puntos" class="form-control @error('puntos') is-invalid @enderror"
                value="{{ old('puntos', $user?->puntos) }}" id="puntos" placeholder="Puntos">
            {!! $errors->first('puntos', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2">
            <label for="rol" class="form-label">{{ __('Rol') }}</label>
            <select name="rol" id="rol" class="form-control @error('rol') is-invalid @enderror">
                <option value="user" {{ old('rol', $user?->rol) === 'user' ? 'selected' : '' }}>Usuario</option>
                <option value="admin" {{ old('rol', $user?->rol) === 'admin' ? 'selected' : '' }}>Administrador</option>
            </select>
            {!! $errors->first('rol', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2">
            <label for="activo" class="form-label">{{ __('Activo') }}</label>
            <select name="activo" id="activo" class="form-control @error('activo') is-invalid @enderror">
                <option value="1" {{ old('activo', $user?->activo) == 1 ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ old('activo', $user?->activo) == 0 ? 'selected' : '' }}>Inactivo</option>
            </select>
            {!! $errors->first('activo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>


    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>