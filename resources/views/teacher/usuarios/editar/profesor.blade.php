@extends('teacher.app')

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

            <form action="{{ route('teacher.usuario.guardar3') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="userID" value="{{ $user->id }}">

                <div class="row">
                    <div class="col-xl-12">
                        <div class="dashboard-box margin-top-0">
                            <div class="headline">
                                <h3><i class="icon-material-outline-account-circle"></i>
                                    {{ __('home.editarP.formulario') }}</h3>
                            </div>
                            <div class="content with-padding padding-bottom-0">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="avatar-wrapper" data-tippy-placement="bottom" title="Change Avatar">
                                            @if ($user->image_profile)
                                                <img class="profile-pic"
                                                    src="{{ route('storage.avatar', ['img' => $user->image_profile]) }}"
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
                                                    <h5>{{ __('home.editarP.nombre') }}</h5>
                                                    <input type="text" class="with-border" name="nombre"
                                                        value="{{ $user->nombre }}">
                                                    @error('nombre')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>{{ __('home.editarP.apellidos') }}</h5>
                                                    <input type="text" class="with-border" name="apellidos"
                                                        value="{{ $user->apellidos }}">
                                                    @error('apellidos')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>{{ __('home.editarP.telefono') }}</h5>
                                                    <input type="tel" class="with-border" name="telf"
                                                        value="{{ $user->telf }}">
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>{{ __('home.editarP.email') }}</h5>
                                                    <input type="email" class="with-border" name="email"
                                                        value="{{ $user->email }}">
                                                </div>
                                            </div>


                                            <div class="col-xl-12">
                                                <div class="submit-field">
                                                    <h5>{{ __('home.editarP.tipoU') }}</h5>
                                                    <div class="account-type">
                                                        @if ($user->role == 1)
                                                            <div>
                                                                <input type="radio" name="account-type-radio"
                                                                    id="freelancer-radio" class="account-type-radio"
                                                                    checked />
                                                                <label for="freelancer-radio" class="ripple-effect-dark"><i
                                                                        class="icon-material-outline-account-circle"></i>
                                                                    {{ __('home.menu.usuario') }}</label>
                                                            </div>
                                                        @elseif ($user->role == 3)
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

                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>{{ __('home.editarP.rol') }}</h5>
                                                    <select name="role">
                                                        <option value="1" @if ($user->role == 1) selected @endif>Usuario</option>
                                                        <option value="2" @if ($user->role == 2) selected @endif>Empresa</option>
                                                        <option value="3" @if ($user->role == 3) selected @endif>Profesor (Administrador)
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>{{ __('home.editarP.estado') }}</h5>
                                                    <select name="status">
                                                        <option value="1" @if ($user->status == 1) selected @endif>Activado</option>
                                                        <option value="0" @if ($user->status == 0) selected @endif>Suspendido</option>
                                                        </option>
                                                    </select>
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
                        <input type="submit" value="{{ __('home.editarP.actualizar') }}"
                            class="button ripple-effect big margin-top-30">
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
        $('#usuarios').addClass('active')

    </script>
@endsection
