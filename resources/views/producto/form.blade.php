<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="codigo" class="form-label">{{ __('Codigo') }}</label>
            <input type="text" name="codigo" class="form-control @error('codigo') is-invalid @enderror"
                value="{{ old('codigo', $producto?->codigo) }}" id="codigo" placeholder="Codigo">
            {!! $errors->first('codigo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror"
                value="{{ old('nombre', $producto?->nombre) }}" id="nombre" placeholder="Nombre">
            {!! $errors->first('nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="precio" class="form-label">{{ __('Precio') }}</label>
            <input type="text" name="precio" class="form-control @error('precio') is-invalid @enderror"
                value="{{ old('precio', $producto?->precio) }}" id="precio" placeholder="Precio">
            {!! $errors->first('precio', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="precio_puntos" class="form-label">{{ __('Precio Puntos') }}</label>
            <input type="text" name="precio_puntos" class="form-control @error('precio_puntos') is-invalid @enderror"
                value="{{ old('precio_puntos', $producto?->precio_puntos) }}" id="precio_puntos"
                placeholder="Precio Puntos">
            {!! $errors->first('precio_puntos', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="marca" class="form-label">{{ __('Marca') }}</label>
            <input type="text" name="marca" class="form-control @error('marca') is-invalid @enderror"
                value="{{ old('marca', $producto?->marca) }}" id="marca" placeholder="Marca">
            {!! $errors->first('marca', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2">
            <label for="regalo" class="form-label">{{ __('Regalo') }}</label>
            <select name="regalo" id="regalo" class="form-control @error('regalo') is-invalid @enderror">
                <option value="1" {{ old('regalo', $producto?->regalo) == 1 ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ old('regalo', $producto?->regalo) == 0 ? 'selected' : '' }}>Inactivo</option>
            </select>
            {!! $errors->first('regalo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="activo" class="form-label">{{ __('Activo') }}</label>
            <select name="activo" id="activo" class="form-control @error('activo') is-invalid @enderror">
                <option value="1" {{ old('activo', $producto?->activo) == 1 ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ old('activo', $producto?->activo) == 0 ? 'selected' : '' }}>Inactivo</option>
            </select>
            {!! $errors->first('activo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="foto" class="form-label">{{ __('Foto') }}</label>

            @if ($producto?->foto)
                <div class="mb-2">
                    <img src="{{ asset('images/' . $producto->foto) }}" alt="Foto actual"
                        style="max-width: 150px; max-height: 150px; object-fit: cover;" class="img-thumbnail">
                </div>
            @endif

            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" id="foto"
                accept="image/*">

            {!! $errors->first('foto', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>


    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>