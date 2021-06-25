@extends('teacher.app')

@section('content')
    <div class="dashboard-content-container" data-simplebar>
        <div class="dashboard-content-inner">

            <!-- Dashboard Headline -->
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

            <form action="{{ route('teacher.usuario.guardar1') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="userID" value="{{ $user->id }}">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="dashboard-box margin-top-0">
                            <div class="headline">
                                <h3><i class="icon-material-outline-account-circle"></i> Editar Usuario</h3>
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
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="row">

                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>{{ __('home.editarU.nombre') }}</h5>
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
                                                    <h5>{{ __('home.editarU.apellidos') }}</h5>
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
                                                    <h5>{{ __('home.editarU.telefono') }}</h5>
                                                    <input type="tel" class="with-border" name="telf"
                                                        value="{{ $user->telf }}">
                                                    @error('tel')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>{{ __('home.editarU.email') }}</h5>
                                                    <input type="email" class="with-border" name="email"
                                                        value="{{ $user->email }}">
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-xl-12">
                                                <!-- Account Type -->
                                                <div class="submit-field">
                                                    <h5>{{ __('home.editarU.tipoU') }}</h5>
                                                    <div class="account-type">
                                                        <div>
                                                            <input type="radio" name="account-type-radio"
                                                                id="freelancer-radio" class="account-type-radio" checked />
                                                            <label for="freelancer-radio" class="ripple-effect-dark"><i
                                                                    class="icon-material-outline-account-circle"></i>
                                                                {{ __('home.menu.usuario') }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>{{ __('home.editarU.rol') }}</h5>
                                                    <select name="role">
                                                        <option value="1">Usuario</option>
                                                        <option value="2">Empresa</option>
                                                        <option value="3">Profesor (Administrador)</option>
                                                    </select>
                                                    @error('role')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>{{ __('home.editarU.estado') }}</h5>
                                                    <select name="status">
                                                        <option value="1" @if ($user->status == 1) selected @endif>Activado</option>
                                                        <option value="0" @if ($user->status == 0) selected @endif>Suspendido</option>
                                                        </option>
                                                    </select>
                                                    @error('status')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Dashboard Box -->
                    <div class="col-xl-12">
                        <div class="dashboard-box">

                            <!-- Headline -->
                            <div class="headline">
                                <h3><i class="icon-material-outline-face"></i> {{ __('home.editarU.formulario2') }}</h3>
                            </div>

                            <div class="content">
                                <ul class="fields-ul">
                                    <li>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>{{ __('home.editarU.adjunto') }} </h5>

                                                    @if ($user->ficheros)
                                                        <div class="attachments-container margin-top-0 margin-bottom-0">
                                                            <div class="attachment-box ripple-effect">
                                                                <span>{{ __('home.editarU.cv') }}</span>
                                                                <i>PDF</i>
                                                                <button id="eliminarCV" data="{{ $user->id }}"
                                                                    class="remove-attachment" data-tippy-placement="top"
                                                                    title="Eliminar"></button>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <div class="clearfix"></div>

                                                    <div class="uploadButton margin-top-0">
                                                        <input class="uploadButton-input" type="file"
                                                            accept="application/pdf" id="upload" name="upload" />
                                                        <label class="uploadButton-button ripple-effect"
                                                            for="upload">{{ __('home.editarU.subir') }}</label>
                                                        <span class="uploadButton-file-name">
                                                            {{ __('home.editarU.tam') }}
                                                        </span>

                                                        @error('upload')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>{{ __('home.editarU.residencia') }}</h5>
                                                    <input type="text" class="with-border"
                                                        value="{{ $user->nacionalidad }}" placeholder="Cordoba, España"
                                                        name="nacionalidad">
                                                    @error('nacionalidad')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
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
                        <input type="submit" value="{{ __('home.editarU.actualizar') }}"
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


        $('#eliminarCV').on('click', function(evt) {
            evt.preventDefault();

            window.location = "{{ route('teacher.usuario.eliminarCV', ['id' => $user->id]) }}"
        })

    </script>
@endsection
