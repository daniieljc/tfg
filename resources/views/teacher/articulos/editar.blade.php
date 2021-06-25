@extends('teacher.app')

@section('content')
    <div class="dashboard-content-container" data-simplebar>
        <div class="dashboard-content-inner">

            <!-- Dashboard Headline -->
            <div class="dashboard-headline">
                <h3>Publicar Artículo</h3>

                <!-- Breadcrumbs -->
                <nav id="breadcrumbs" class="dark">
                    <ul>
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Ofertas</a></li>
                        <li>Publicar oferta</li>
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
                            <h3><i class="icon-feather-folder-plus"></i> Formulario de artículos</h3>
                        </div>

                        <div class="content with-padding padding-bottom-10">
                            <form method="POST" action="{{ route('teacher.articulo.actualizar', ['id' => $oferta->id]) }}"
                                id="publicarOferta" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="submit-field">
                                            <h5>Título del artículo</h5>
                                            <input type="text" class="with-border" name="titulo"
                                                placeholder="Titulo del artículo" value="{{ $oferta->titulo }}">
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="submit-field">
                                            <h5>Categoría</h5>
                                            <select class="selectpicker with-border" data-size="7"
                                                title="Selecciona la categoría" name="categoria">
                                                @foreach ($cat as $item)
                                                    <option value="{{ $item->id }}" @if ($oferta->categoria_id == $item->id) selected @endif>{{ $item->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="submit-field">
                                            <h5>Descripción del artículo</h5>
                                            <textarea cols="50" rows="15" class="with-border" name="descripcion">
                                                    {{ $oferta->descripcion }}
                                                </textarea>
                                            <div class="uploadButton margin-top-30">
                                                <input class="uploadButton-input" type="file" accept="image/*" id="upload"
                                                    name="portada" />
                                                <label class="uploadButton-button ripple-effect" for="upload">Subir
                                                    Portada</label>
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
        $('#articulos').addClass('active-submenu')

    </script>

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
        });

    </script>

@endsection
