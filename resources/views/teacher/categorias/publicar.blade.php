@extends('teacher.app')

@section('content')
    <div class="dashboard-content-container" data-simplebar>
        <div class="dashboard-content-inner">

            <!-- Dashboard Headline -->
            <div class="dashboard-headline">
                <h3>Publicar Categoría</h3>

                <!-- Breadcrumbs -->
                <nav id="breadcrumbs" class="dark">
                    <ul>
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Categorias</a></li>
                        <li>Publicar Categoría</li>
                    </ul>
                </nav>
            </div>

            <!-- Row -->
            <div class="row">


                <!-- Dashboard Box -->
                <div class="col-xl-12">

                    @include('includes.notify')

                    <div class="dashboard-box margin-top-0">

                        <!-- Headline -->
                        <div class="headline">
                            <h3><i class="icon-feather-folder-plus"></i> Formulario de categorías</h3>
                        </div>

                        <div class="content with-padding padding-bottom-10">
                            <form method="POST" action="{{ route('teacher.articulo.publicar') }}" id="publicarOferta"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="submit-field">
                                            <h5>Título del artículo</h5>
                                            <input type="text" class="with-border" name="titulo"
                                                placeholder="Titulo del artículo">
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="submit-field">
                                            <h5>Categoría</h5>
                                            <select class="selectpicker with-border" data-size="7"
                                                title="Selecciona la categoría" name="categoria">
                                                <option value="1">Full Time</option>
                                                <option>Freelance</option>
                                                <option>Part Time</option>
                                                <option>Internship</option>
                                                <option>Temporary</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="submit-field">
                                            <h5>Descripción del artículo</h5>
                                            <textarea cols="30" rows="5" class="with-border" name="descripcion"></textarea>
                                            <div class="uploadButton margin-top-30">
                                                <input class="uploadButton-input" type="file" accept="image/*" id="upload"
                                                    name="portada" />
                                                <label class="uploadButton-button ripple-effect" for="upload">Subir
                                                    Archivo</label>
                                                <span class="uploadButton-file-name">Imagen de portada.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-xl-12">
                    <button onclick="publicarOferta.submit()" class="button ripple-effect big margin-top-30"><i
                            class="icon-feather-plus"></i>
                        Publicar artículo</button>
                </div>

            </div>
            <!-- Row / End -->

            <!-- Footer -->
            <div class="dashboard-footer-spacer"></div>
            <div class="small-footer margin-top-15">
                <div class="small-footer-copyrights">
                    © 2021 <strong>JobSierra</strong>. {{ __('home.derechos') }}
                </div>
    
                <div class="clearfix"></div>
            </div>
            <!-- Footer / End -->

        </div>
    </div>

@endsection

@section('menu')
    <script>
        $('#categorias').addClass('active-submenu')

    </script>
@endsection
