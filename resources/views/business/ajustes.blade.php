@extends('business.app')

@section('content')
    <div class="dashboard-content-container" data-simplebar>
        <div class="dashboard-content-inner">

            <div class="dashboard-headline">
                <h3>{{ __('home.menu.editarOfer') }}</h3>

                <!-- Breadcrumbs -->
                <nav id="breadcrumbs" class="dark">
                    <ul>
                        <li><a href="#">{{ __('home.menu.tablero') }}</a></li>
                        <li><a href="#">{{ __('home.menu.usuario') }}</a></li>
                        <li>{{ __('home.menu.editarU') }}</li>
                    </ul>
                </nav>
            </div>

            @include('includes.notify')

            <form action="{{ route('business.cuentaS') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="userID" value="{{ Auth::user()->id }}">

                <div class="row">
                    <div class="col-xl-12">
                        <div class="dashboard-box margin-top-0">
                            <div class="headline">
                                <h3><i class="icon-material-outline-account-circle"></i> {{ __('home.menu.editarU') }}
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
                                                    <h5>{{ __('home.editarE.nombre') }}</h5>
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
                                                    <h5>{{ __('home.editarE.apellidos') }}</h5>
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
                                                    <h5>{{ __('home.editarE.telefono') }}</h5>
                                                    <input type="tel" class="with-border" name="telf"
                                                        value="{{ Auth::user()->telf }}">
                                                    @error('telf')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>{{ __('home.editarE.email') }}</h5>
                                                    <input type="email" class="with-border" name="email"
                                                        value="{{ Auth::user()->email }}">
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-xl-12">
                                                <div class="submit-field">
                                                    <h5>{{ __('home.editarE.tipoU') }}</h5>
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

                    <div class="col-xl-12">
                        <div class="dashboard-box">
                            <div class="headline">
                                <h3><i class="icon-material-outline-face"></i> {{ __('home.editarE.formulario2') }}</h3>
                            </div>

                            <div class="content">
                                <ul class="fields-ul">
                                    <li>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>{{ __('home.editarE.docu') }}</h5>
                                                    <input type="text" class="with-border" value="{{ $infoE->ident_fis }}"
                                                        placeholder="23467821A" name="ident_fis">
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="col-xl-12">
                        <input type="submit" value="{{ __('home.editarE.actualizar') }}" class="button ripple-effect big margin-top-30">
                    </div>

                </div>
                <!-- Row / End -->
            </form>

            <div class="dashboard-footer-spacer"></div>
            <div class="small-footer margin-top-15">
                <div class="small-footer-copyrights">
                    ?? 2021 <strong>JobSierra</strong>. {{ __('home.derechos') }}
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
        $('#usuarios').addClass('active')

    </script>
@endsection
