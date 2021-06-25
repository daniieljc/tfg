@extends('teacher.app')

@section('content')
    <div class="dashboard-content-container" data-simplebar>
        <div class="dashboard-content-inner">

            <div class="dashboard-headline">
                <h3>{{ __('home.menu.publicarArti') }}</h3>

                <!-- Breadcrumbs -->
                <nav id="breadcrumbs" class="dark">
                    <ul>
                        <li><a href="#">{{ __('home.menu.tablero') }}</a></li>
                        <li><a href="#">{{ __('home.menu.ofertas') }}</a></li>
                        <li>{{ __('home.menu.publicarArti') }}</li>
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
                            <h3><i class="icon-feather-folder-plus"></i> {{ __('home.articulos.formA') }}</h3>
                        </div>

                        <div class="content with-padding padding-bottom-10">
                            <form method="POST" action="{{ route('teacher.articulo.publicar') }}" id="publicarOferta"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="submit-field">
                                            <h5>{{ __('home.articulos.titulo') }}</h5>
                                            <input type="text" class="with-border" name="titulo"
                                                placeholder="{{ __('home.articulos.titulo') }}">
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="submit-field">
                                            <h5>{{ __('home.articulos.categoria') }}</h5>
                                            <select class="selectpicker with-border" data-size="7"
                                                title="{{ __('home.articulos.categoria') }}" name="categoria">
                                                @foreach ($categoria as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="submit-field">
                                            <h5>{{ __('home.articulos.descripción') }}</h5>
                                            <textarea cols="50" rows="15" class="with-border" name="descripcion"></textarea>
                                            <div class="uploadButton margin-top-30">
                                                <input class="uploadButton-input" type="file" accept="image/*" id="upload"
                                                    name="portada" />
                                                <label class="uploadButton-button ripple-effect"
                                                    for="upload">{{ __('home.articulos.portadaB') }}
                                                </label>
                                                <span
                                                    class="uploadButton-file-name">{{ __('home.articulos.portada') }}</span>
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
                        {{ __('home.articulos.subir') }}</button>
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
        $('#articulos_añadir').addClass('active-submenu')

    </script>

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
        });

    </script>

@endsection
