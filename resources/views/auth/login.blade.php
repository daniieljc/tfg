@extends('layouts.app')

@section('content')
    <div class="margin-bottom-100"></div>
    
    <div class="container">
        <div class="row">
            <div class="col-xl-5 offset-xl-3">
                <div class="login-register-page">
                    <!-- Welcome Text -->
                    <div class="welcome-text">
                        <h3>¡Nos alegra verte de nuevo!</h3>
                        <span>¿No tienes una cuenta? <a href="{{ route('register') }}">¡Regístrate!</a></span>
                    </div>

                    <form method="POST" action="{{ route('login') }}" id="login-form">
                        @csrf

                        <div class="input-with-icon-left">
                            <i class="icon-material-baseline-mail-outline"></i>
                            <input type="email" class="input-text with-border @error('email') is-invalid @enderror"
                                name="email" id="email" placeholder="Dirección de correo" value="{{ old('email') }}"
                                required />

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-with-icon-left">
                            <i class="icon-material-outline-lock"></i>
                            <input type="password" class="input-text with-border @error('password') is-invalid @enderror"
                                name="password" id="password" placeholder="Contraseña" required />

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        @if (Route::has('password.request'))
                            <a class="forgot-password" href="{{ route('password.request') }}">
                                {{ __('¿Olvidaste tu contraseña?') }}
                            </a>
                        @endif
                    </form>



                    <!-- Button -->
                    <button class="button full-width button-sliding-icon ripple-effect margin-top-10" type="submit"
                        form="login-form">Iniciar Sesión<i class="icon-material-outline-arrow-right-alt"></i></button>
                </div>

            </div>
        </div>
    </div>

    <div class="margin-top-100"></div>

@endsection
