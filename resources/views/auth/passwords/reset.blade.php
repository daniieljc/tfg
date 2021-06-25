@extends('home.app')

@section('content')
    <div class="margin-bottom-100"></div>

    <div class="container">
        <div class="row">
            <div class="col-xl-5 offset-xl-3">
                <div class="login-register-page">
                    <!-- Welcome Text -->
                    <div class="welcome-text">
                        <h3>{{ __('Reset Password') }}</h3>
                    </div>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="input-with-icon-left">
                            <i class="icon-material-baseline-mail-outline"></i>
                            <input type="email" class="input-text with-border @error('email') is-invalid @enderror"
                                name="email" id="email" placeholder="Dirección de correo"
                                value="{{ $email ?? old('email') }}" required autocomplete="email" />

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-with-icon-left">
                            <i class="icon-material-outline-lock"></i>
                            <input type="password" class="input-text with-border @error('password') is-invalid @enderror"
                                name="password" id="password" required placeholder="Contraseña" />

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-with-icon-left">
                            <i class="icon-material-outline-lock"></i>

                            <input id="password-confirm" type="password" class="input-text with-border"
                                name="password_confirmation" required autocomplete="new-password"
                                placeholder="Confirmar Contraseña">
                        </div>

                        <button class="button full-width button-sliding-icon ripple-effect margin-top-10" type="submit"
                            form="login-form"> {{ __('Reset Password') }}
                            <i class="icon-material-outline-arrow-right-alt"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="margin-top-100"></div>
@endsection
