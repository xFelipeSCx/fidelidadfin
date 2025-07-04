@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="lastname"
                                class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text"
                                    class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                                    value="{{ old('lastname') }}" required autocomplete="family-name">

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                    name="phone" value="{{ old('phone') }}" required maxlength="10" pattern="\d{10}"
                                    title="Ingrese un número de 10 dígitos" inputmode="numeric" autocomplete="tel">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="direccion"
                                class="col-md-4 col-form-label text-md-end">{{ __('Dirección') }}</label>

                            <div class="col-md-6">
                                <input id="direccion" type="text"
                                    class="form-control @error('direccion') is-invalid @enderror" name="direccion"
                                    value="{{ old('direccion') }}" required autocomplete="street-address">

                                @error('direccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="estado" class="col-md-4 col-form-label text-md-end">{{ __('Estado') }}</label>

                            <div class="col-md-6">
                                <select id="estado" name="estado"
                                    class="form-control @error('estado') is-invalid @enderror" required>
                                    <option value="" disabled selected>Selecciona un estado</option>
                                    <option value="Aguascalientes" {{ old('estado') == 'Aguascalientes' ? 'selected' : '' }}>Aguascalientes</option>
                                    <option value="Baja California" {{ old('estado') == 'Baja California' ? 'selected' : '' }}>Baja California</option>
                                    <option value="Baja California Sur" {{ old('estado') == 'Baja California Sur' ? 'selected' : '' }}>Baja California Sur</option>
                                    <option value="Campeche" {{ old('estado') == 'Campeche' ? 'selected' : '' }}>Campeche
                                    </option>
                                    <option value="Chiapas" {{ old('estado') == 'Chiapas' ? 'selected' : '' }}>Chiapas
                                    </option>
                                    <option value="Chihuahua" {{ old('estado') == 'Chihuahua' ? 'selected' : '' }}>
                                        Chihuahua</option>
                                    <option value="Ciudad de México" {{ old('estado') == 'Ciudad de México' ? 'selected' : '' }}>Ciudad de México</option>
                                    <option value="Coahuila" {{ old('estado') == 'Coahuila' ? 'selected' : '' }}>Coahuila
                                    </option>
                                    <option value="Colima" {{ old('estado') == 'Colima' ? 'selected' : '' }}>Colima
                                    </option>
                                    <option value="Durango" {{ old('estado') == 'Durango' ? 'selected' : '' }}>Durango
                                    </option>
                                    <option value="Estado de México" {{ old('estado') == 'Estado de México' ? 'selected' : '' }}>Estado de México</option>
                                    <option value="Guanajuato" {{ old('estado') == 'Guanajuato' ? 'selected' : '' }}>
                                        Guanajuato</option>
                                    <option value="Guerrero" {{ old('estado') == 'Guerrero' ? 'selected' : '' }}>Guerrero
                                    </option>
                                    <option value="Hidalgo" {{ old('estado') == 'Hidalgo' ? 'selected' : '' }}>Hidalgo
                                    </option>
                                    <option value="Jalisco" {{ old('estado') == 'Jalisco' ? 'selected' : '' }}>Jalisco
                                    </option>
                                    <option value="Michoacán" {{ old('estado') == 'Michoacán' ? 'selected' : '' }}>
                                        Michoacán</option>
                                    <option value="Morelos" {{ old('estado') == 'Morelos' ? 'selected' : '' }}>Morelos
                                    </option>
                                    <option value="Nayarit" {{ old('estado') == 'Nayarit' ? 'selected' : '' }}>Nayarit
                                    </option>
                                    <option value="Nuevo León" {{ old('estado') == 'Nuevo León' ? 'selected' : '' }}>Nuevo
                                        León</option>
                                    <option value="Oaxaca" {{ old('estado') == 'Oaxaca' ? 'selected' : '' }}>Oaxaca
                                    </option>
                                    <option value="Puebla" {{ old('estado') == 'Puebla' ? 'selected' : '' }}>Puebla
                                    </option>
                                    <option value="Querétaro" {{ old('estado') == 'Querétaro' ? 'selected' : '' }}>
                                        Querétaro</option>
                                    <option value="Quintana Roo" {{ old('estado') == 'Quintana Roo' ? 'selected' : '' }}>
                                        Quintana Roo</option>
                                    <option value="San Luis Potosí" {{ old('estado') == 'San Luis Potosí' ? 'selected' : '' }}>San Luis Potosí</option>
                                    <option value="Sinaloa" {{ old('estado') == 'Sinaloa' ? 'selected' : '' }}>Sinaloa
                                    </option>
                                    <option value="Sonora" {{ old('estado') == 'Sonora' ? 'selected' : '' }}>Sonora
                                    </option>
                                    <option value="Tabasco" {{ old('estado') == 'Tabasco' ? 'selected' : '' }}>Tabasco
                                    </option>
                                    <option value="Tamaulipas" {{ old('estado') == 'Tamaulipas' ? 'selected' : '' }}>
                                        Tamaulipas</option>
                                    <option value="Tlaxcala" {{ old('estado') == 'Tlaxcala' ? 'selected' : '' }}>Tlaxcala
                                    </option>
                                    <option value="Veracruz" {{ old('estado') == 'Veracruz' ? 'selected' : '' }}>Veracruz
                                    </option>
                                    <option value="Yucatán" {{ old('estado') == 'Yucatán' ? 'selected' : '' }}>Yucatán
                                    </option>
                                    <option value="Zacatecas" {{ old('estado') == 'Zacatecas' ? 'selected' : '' }}>
                                        Zacatecas</option>
                                </select>

                                @error('estado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="ciudad" class="col-md-4 col-form-label text-md-end">{{ __('Ciudad') }}</label>

                            <div class="col-md-6">
                                <input id="ciudad" type="text"
                                    class="form-control @error('ciudad') is-invalid @enderror" name="ciudad"
                                    value="{{ old('ciudad') }}" required autocomplete="address-level2">

                                @error('ciudad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection