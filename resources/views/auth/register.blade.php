@extends('layouts.guest')
<img id="background" class="absolute" src="https://www.muyinteresante.com/wp-content/uploads/sites/5/2023/06/09/64833f2caa301.jpeg" alt="Laravel background" style="width: 100%; height: auto; filter: brightness(50%); bottom: 0; position: absolute; z-index: -1;" />

@section('content')
<div class="container" style="position: relative; z-index: 1; top:150px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end" style="color:white">{{ __('Nombre') }}</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="apellidoP" class="col-md-4 col-form-label text-md-end" style="color:white">{{ __('Apellido paterno') }}</label>
                    <div class="col-md-6">
                        <input id="apellidoP" type="text" class="form-control @error('apellidoP') is-invalid @enderror" name="apellidoP" value="{{ old('apellidoP') }}" required autocomplete="apellidoP" autofocus>
                        @error('apellidoP')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="apellidoM" class="col-md-4 col-form-label text-md-end" style="color:white">{{ __('Apellido materno') }}</label>
                    <div class="col-md-6">
                        <input id="apellidoM" type="text" class="form-control @error('apellidoM') is-invalid @enderror" name="apellidoM" value="{{ old('apellidoM') }}">
                        @error('apellidoM')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end" style="color:white">{{ __('Correo') }}</label>
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end" style="color:white">{{ __('Contraseña') }}</label>
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end" style="color:white">{{ __('Confirma contraseña') }}</label>
                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <a class="btn btn-link" style="color:white" href="{{ route('login') }}">
                            {{ __('¿Ya estás registrado?') }}
                        </a>
                        <button type="submit" class="btn" style="background-color:orange; color: black">
                            {{ __('Regístrate') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
