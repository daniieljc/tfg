@extends('teacher.app')

@section('content')
    <div class="dashboard-content-container" data-simplebar>
        <div class="dashboard-content-inner">

            <!-- Dashboard Headline -->
            <div class="dashboard-headline">
                <h3>{{ __('home.menu.ajustes') }}</h3>

                <!-- Breadcrumbs -->
                <nav id="breadcrumbs" class="dark">
                    <ul>
                        <li><a href="#">{{ __('home.menu.tablero') }}</a></li>
                        <li>{{ __('home.menu.ajustes') }}</li>
                    </ul>
                </nav>
            </div>

            <form action="{{ route('teacher.cuentaS') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-xl-12">
                        <div class="dashboard-box margin-top-0">
                            <div class="headline">
                                <h3><i class="icon-material-outline-account-circle"></i> {{ __('home.menu.micuenta') }}
                                </h3>
                            </div>
                            <div class="content with-padding padding-bottom-0">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="avatar-wrapper" data-tippy-placement="bottom" title="Change Avatar">
                                            @if (Auth::user()->image_profile)
                                                <img class="profile-pic"
                                                    src="{{ route('storage.avatar', ['img' => Auth::user()->image_profile]) }}"
                                                    alt="" />
                                            @else
                                                <img class="profile-pic"
                                                    src="{{ asset('images/user-avatar-placeholder.png') }} " alt="" />
                                            @endif
                                            <div class="upload-button"></div>
                                            <input class="file-upload" type="file" accept="image/*" name="avatar" />
                                            @error('avatar')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="row">

                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>{{ __('home.menu.nombre') }}</h5>
                                                    <input type="text" class="with-border" name="nombre"
                                                        value="{{ Auth::user()->nombre }}">
                                                    @error('nombre')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>{{ __('home.menu.apellido') }}</h5>
                                                    <input type="text" class="with-border" name="apellidos"
                                                        value="{{ Auth::user()->apellidos }}">
                                                    @error('apellidos')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>{{ __('home.menu.telefono') }}</h5>
                                                    <input type="tel" class="with-border" name="telf"
                                                        value="{{ Auth::user()->telf }}">
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>{{ __('home.menu.email') }}</h5>
                                                    <input type="email" class="with-border" name="email"
                                                        value="{{ Auth::user()->email }}">
                                                </div>
                                            </div>

                                            <div class="col-xl-12">
                                                <!-- Account Type -->
                                                <div class="submit-field">
                                                    <h5>{{ __('home.menu.tipo') }}</h5>
                                                    <div class="account-type">
                                                        @if (Auth::user()->role == 1)
                                                            <div>
                                                                <input type="radio" name="account-type-radio"
                                                                    id="freelancer-radio" class="account-type-radio"
                                                                    checked />
                                                                <label for="freelancer-radio" class="ripple-effect-dark"><i
                                                                        class="icon-material-outline-account-circle"></i>
                                                                        {{ __('home.menu.usuario') }}</label>
                                                            </div>
                                                        @elseif (Auth::user()->role == 3)
                                                            <div>
                                                                <input type="radio" name="account-type-radio"
                                                                    id="employer-radio" class="account-type-radio"
                                                                    checked />
                                                                <label for="employer-radio" class="ripple-effect-dark"><i
                                                                        class="icon-material-outline-business-center"></i>
                                                                        {{ __('home.menu.profesor') }}</label>
                                                            </div>
                                                        @else
                                                            <div>
                                                                <input type="radio" name="account-type-radio"
                                                                    id="employer-radio" class="account-type-radio"
                                                                    checked />
                                                                <label for="employer-radio" class="ripple-effect-dark"><i
                                                                        class="icon-material-outline-business-center"></i>
                                                                        {{ __('home.menu.empresa') }}</label>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="col-xl-12">
                        <input type="submit" value="{{ __('home.menu.guardar') }}" class="button ripple-effect big margin-top-30">
                    </div>

                </div>
                <!-- Row / End -->
            </form>

            <div class="dashboard-footer-spacer"></div>
            <div class="small-footer margin-top-15">
                <div class="small-footer-copyrights">
                    © 2021 <strong>JobSierra</strong>. {{ __('home.derechos') }}
                </div>
    
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function SkillAdd(evt) {
            evt.preventDefault();
        }

    </script>
@endsection

@section('menu')
    <script>
        $('#ajustes').addClass('active')

    </script>
@endsection
