@extends('layouts.dash')

@section('content')
    <div class="dashboard-content-container" data-simplebar>
        <div class="dashboard-content-inner">

            <!-- Dashboard Headline -->
            <div class="dashboard-headline">
                <h3>Ajustes</h3>

                <!-- Breadcrumbs -->
                <nav id="breadcrumbs" class="dark">
                    <ul>
                        <li><a href="#">Dashboard</a></li>
                        <li>Ajustes</li>
                    </ul>
                </nav>
            </div>

            <form action="{{ route('client.cuentaS') }}" method="POST">
                @csrf
                <div class="row">

                    <!-- Dashboard Box -->
                    <div class="col-xl-12">
                        <div class="dashboard-box margin-top-0">

                            <!-- Headline -->
                            <div class="headline">
                                <h3><i class="icon-material-outline-account-circle"></i> Mi cuenta</h3>
                            </div>

                            <div class="content with-padding padding-bottom-0">

                                <div class="row">

                                    <div class="col-auto">
                                        <div class="avatar-wrapper" data-tippy-placement="bottom" title="Change Avatar">
                                            <img class="profile-pic"
                                                src="{{ asset('images/user-avatar-placeholder.png') }} " alt="" />
                                            <div class="upload-button"></div>
                                            <input class="file-upload" type="file" accept="image/*" />
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="row">

                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>Nombre</h5>
                                                    <input type="text" class="with-border" name="nombre"
                                                        value="{{ Auth::user()->nombre }}">
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>Apellidos</h5>
                                                    <input type="text" class="with-border" name="apellidos"
                                                        value="{{ Auth::user()->apellidos }}">
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <!-- Account Type -->
                                                <div class="submit-field">
                                                    <h5>Tipo de usuario</h5>
                                                    <div class="account-type">
                                                        @if (Auth::user()->role == 'user')
                                                            <div>
                                                                <input type="radio" name="account-type-radio"
                                                                    id="freelancer-radio" class="account-type-radio"
                                                                    checked />
                                                                <label for="freelancer-radio" class="ripple-effect-dark"><i
                                                                        class="icon-material-outline-account-circle"></i>
                                                                    Usuario</label>
                                                            </div>
                                                        @elseif (Auth::user()->role == 'profesor')
                                                            <div>
                                                                <input type="radio" name="account-type-radio"
                                                                    id="employer-radio" class="account-type-radio" />
                                                                <label for="employer-radio" class="ripple-effect-dark"><i
                                                                        class="icon-material-outline-business-center"></i>
                                                                    Profesor</label>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>Email</h5>
                                                    <input type="email" class="with-border" name="email"
                                                        value="{{ Auth::user()->email }}">
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
                                <h3><i class="icon-material-outline-face"></i> Mi perfil</h3>
                            </div>

                            <div class="content">
                                <ul class="fields-ul">
                                    <li>
                                        <div class="row">

                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>Habilidades <i class="help-icon" data-tippy-placement="right"
                                                            title="Agrega hasta 10 habilidades"></i></h5>

                                                    <!-- Skills List -->
                                                    <div class="keywords-container">
                                                        <div class="keyword-input-container">
                                                            <input type="text" class="keyword-input with-border"
                                                                placeholder="e.g. Angular, Laravel" name="skills"
                                                                id="skills" />
                                                            <button onclick="SkillAdd(event);"
                                                                class="keyword-input-button ripple-effect"><i
                                                                    class="icon-material-outline-add"></i></button>
                                                        </div>
                                                        <div class="keywords-list">
                                                            <span class="keyword"><span class="keyword-remove"></span><span
                                                                    class="keyword-text">Angular</span></span>
                                                            <span class="keyword"><span class="keyword-remove"></span><span
                                                                    class="keyword-text">Vue JS</span></span>
                                                            <span class="keyword"><span class="keyword-remove"></span><span
                                                                    class="keyword-text">iOS</span></span>
                                                            <span class="keyword"><span class="keyword-remove"></span><span
                                                                    class="keyword-text">Android</span></span>
                                                            <span class="keyword"><span class="keyword-remove"></span><span
                                                                    class="keyword-text">Laravel</span></span>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>Archivos adjuntos </h5>

                                                    <!-- Attachments -->
                                                    <div class="attachments-container margin-top-0 margin-bottom-0">
                                                        <div class="attachment-box ripple-effect">
                                                            <span>Curriculum</span>
                                                            <i>PDF</i>
                                                            <button class="remove-attachment" data-tippy-placement="top"
                                                                title="Eliminar"></button>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>

                                                    <!-- Upload Button -->
                                                    <div class="uploadButton margin-top-0">
                                                        <input class="uploadButton-input" type="file"
                                                            accept="image/*, application/pdf" id="upload" multiple />
                                                        <label class="uploadButton-button ripple-effect" for="upload">Subir
                                                            Ficheros</label>
                                                        <span class="uploadButton-file-name">Tamaño máximo de archivo: 10 MB
                                                        </span>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>Lema</h5>
                                                    <input type="text" class="with-border" value="{{ $infoE->lema }}"
                                                        placeholder="iOS Expert + Node Dev" name="lema">
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>Residencia</h5>
                                                    <select class="selectpicker with-border" data-size="7"
                                                        title="Selecciona tu lugar de residencia" data-live-search="true">

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-xl-12">
                                                <div class="submit-field">
                                                    <h5>Preséntate</h5>
                                                    <textarea name="presentacion" cols="30" rows="5"
                                                        class="with-border">{{ $infoE->presentacion }}</textarea>
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
                        <input type="submit" value="Guardar cambios" class="button ripple-effect big margin-top-30">
                    </div>

                </div>
                <!-- Row / End -->
            </form>

            <div class="dashboard-footer-spacer"></div>
            <div class="small-footer margin-top-15">
                <div class="small-footer-copyrights">
                    © 2021 <strong>Hostemy</strong>. Todos los derechos reservados.
                </div>
                <ul class="footer-social-links">
                    <li>
                        <a href="#" title="Facebook" data-tippy-placement="top">
                            <i class="icon-brand-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" title="Twitter" data-tippy-placement="top">
                            <i class="icon-brand-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" title="Google Plus" data-tippy-placement="top">
                            <i class="icon-brand-google-plus-g"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" title="LinkedIn" data-tippy-placement="top">
                            <i class="icon-brand-linkedin-in"></i>
                        </a>
                    </li>
                </ul>
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
