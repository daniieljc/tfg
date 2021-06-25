@extends('teacher.app')

@section('content')
    <div class="dashboard-content-container" data-simplebar>
        <div class="dashboard-content-inner">

            <div class="dashboard-headline">
                <h3>{{ __('home.categorias.titulo') }}</h3>

                <nav id="breadcrumbs" class="dark">
                    <ul>
                        <li><a href="#">{{ __('home.menu.tablero') }}</a></li>
                        <li>{{ __('home.categorias.titulo') }}</li>
                        <li>{{ __('home.categorias.editar') }}</li>
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
                            <h3><i class="icon-feather-folder-plus"></i> {{ __('home.categorias.form') }}</h3>
                        </div>

                        <div class="content with-padding padding-bottom-10">
                            <form method="POST" action="{{ route('teacher.categoria.actualizar', ['id' => $cat->id]) }}"
                                id="publicarOferta" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="submit-field">
                                            <h5>{{ __('home.categorias.tituloF') }}</h5>
                                            <input type="text" class="with-border" name="nombre"
                                                placeholder="Titulo de la categoría" value="{{ $cat->nombre }}">
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
                        {{ __('home.categorias.actualizar') }}</button>
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
        $('#articulos_categorias').addClass('active-submenu')

    </script>

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
        });

    </script>

@endsection
