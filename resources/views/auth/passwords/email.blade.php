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

                    @if (session('status'))
                        <div class="notification success closeable">
                            <p>{{ session('status') }}</p>
                            <a class="close"></a>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="input-with-icon-left">
                            <i class="icon-material-baseline-mail-outline"></i>
                            <input id="email" type="email"
                                class="input-text with-border @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <button class="button full-width button-sliding-icon ripple-effect margin-top-10" type="submit"
                            form="login-form">
                            {{ __('Send Password Reset Link') }}
                            <i class="icon-material-outline-arrow-right-alt"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="margin-top-100"></div>
@endsection
