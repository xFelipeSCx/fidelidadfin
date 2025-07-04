<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror"
                value="{{ old('nombre', $marcasDescuento?->nombre) }}" id="nombre" placeholder="Nombre">
            {!! $errors->first('nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="correo_electronico" class="form-label">{{ __('Correo Electronico') }}</label>
            <input type="text" name="correo_electronico"
                class="form-control @error('correo_electronico') is-invalid @enderror"
                value="{{ old('correo_electronico', $marcasDescuento?->correo_electronico) }}" id="correo_electronico"
                placeholder="Correo Electronico">
            {!! $errors->first('correo_electronico', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="numero_telefono" class="form-label">{{ __('Numero Telefono') }}</label>
            <input type="text" name="numero_telefono"
                class="form-control @error('numero_telefono') is-invalid @enderror"
                value="{{ old('numero_telefono', $marcasDescuento?->numero_telefono) }}" id="numero_telefono"
                placeholder="Numero Telefono">
            {!! $errors->first('numero_telefono', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2">
            <label for="activo" class="form-label">{{ __('Activo') }}</label>
            <select name="activo" id="activo" class="form-control @error('activo') is-invalid @enderror">
                <option value="1" {{ old('activo', $marcasDescuento?->activo) == 1 ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ old('activo', $marcasDescuento?->activo) == 0 ? 'selected' : '' }}>Inactivo</option>
            </select>
            {!! $errors->first('activo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>


    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>