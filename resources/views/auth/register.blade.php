@extends('layouts.app')

@section('content')

    <div class="margin-bottom-100"></div>

    <div class="container">
        <div class="row">
            <div class="col-xl-5 offset-xl-3">

                <div class="login-register-page">
                    <!-- Welcome Text -->
                    <div class="welcome-text">
                        <h3 style="font-size: 26px;">¡Creemos tu cuenta!</h3>
                        <span>¿Ya tienes una cuenta? <a href="{{ route('login') }}">¡Iniciar sesión!</a></span>
                    </div>

                    <!-- Account Type -->
                    <div class="account-type">
                        <div onclick="modoUser()">
                            <input type="radio" name="account-type-radio" id="freelancer-radio" class="account-type-radio"
                                checked />
                            <label for="freelancer-radio" class="ripple-effect-dark"><i
                                    class="icon-material-outline-account-circle"></i> Usuario</label>
                        </div>

                        <div onclick="modoEmpre()">
                            <input type="radio" name="account-type-radio" id="employer-radio" class="account-type-radio" />
                            <label for="employer-radio" class="ripple-effect-dark"><i
                                    class="icon-material-outline-business-center"></i> Empresa</label>
                        </div>
                    </div>

                    <!-- Form -->
                    <form method="POST" action="{{ route('register') }}" id="register_account">
                        @csrf

                        <input type="hidden" name="business" id="business" value="0">

                        <div class="input-with-icon-left">
                            <i class="icon-feather-user"></i>
                            <input type="text" class="input-text with-border @error('nombre') is-invalid @enderror"
                                name="nombre" id="nombre" placeholder="Nombre" required />

                            @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-with-icon-left" id="apellido_div">
                            <i class="icon-feather-users"></i>
                            <input type="text" class="input-text with-border @error('apellidos') is-invalid @enderror"
                                name="apellidos" id="apellidos" placeholder="Apellidos" required />

                            @error('apellidos')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-with-icon-left" id="idenf_div" style="display: none">
                            <i class="icon-line-awesome-certificate"></i>
                            <input type="text" class="input-text with-border @error('identif') is-invalid @enderror"
                                name="identif" id="identif" placeholder="Identificación fiscal (C.I.F o N.I.F)" required />

                            @error('identif')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-with-icon-left">
                            <i class="icon-material-baseline-mail-outline"></i>
                            <input type="text" class="input-text with-border @error('email') is-invalid @enderror"
                                name="email" id="email" placeholder="Dirección de correo" required />

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-with-icon-left" title="Should be at least 8 characters long"
                            data-tippy-placement="bottom">
                            <i class="icon-material-outline-lock"></i>
                            <input type="password" class="input-text with-border @error('password') is-invalid @enderror"
                                name="password" id="password" placeholder="Contraseña" required />

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-with-icon-left">
                            <i class="icon-material-outline-lock"></i>
                            <input type="password" class="input-text with-border" name="password_confirmation"
                                id="password_confirmation" placeholder="Repetir Contraseña" required />
                        </div>
                    </form>

                    <button onclick="register_account.submit()" class="button full-width button-sliding-icon ripple-effect margin-top-10" type="submit"
                        form="login-form">Registrar <i class="icon-material-outline-arrow-right-alt"></i></button>
                </div>

            </div>
        </div>
    </div>

    <div class="margin-top-100"></div>

@endsection

@section('changeForm')
    <script>
        function modoUser() {
            $('#nombre').attr('placeholder', 'Nombre')
            $('#business').val('0')

            $('#idenf_div').hide()
            $('#apellido_div').show()

        }

        function modoEmpre() {
            $('#nombre').attr('placeholder', 'Nombre de la empresa')
            $('#business').val('1')

            $('#apellido_div').hide()
            $('#idenf_div').show()
        }

    </script>
@endsection
