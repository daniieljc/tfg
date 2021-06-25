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
                        <li><a href="#">{{ __('home.menu.ofertas') }}</a></li>
                        <li>{{ __('home.menu.editarOfer') }}</li>
                    </ul>
                </nav>
            </div>

            <!-- Row -->
            <div class="row">
                <div class="col-xl-12">
                    @include('includes.notify')
                    <div class="dashboard-box margin-top-0">
                        <div class="headline">
                            <h3><i class="icon-feather-folder-plus"></i> {{ __('home.editarO.formulario') }}</h3>
                        </div>

                        <div class="content with-padding padding-bottom-10">
                            <form method="POST" action="{{ route('business.oferta.editarU', ['id' => $oferta->id]) }}"
                                id="publicarOferta">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-4">
                                        <div class="submit-field">
                                            <h5>{{ __('home.editarO.titulo') }}</h5>
                                            <input type="text" class="with-border" name="titulo"
                                                value="{{ $oferta->titulo }}">
                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="submit-field">
                                            <h5>{{ __('home.editarO.tipo') }}</h5>
                                            <select class="selectpicker with-border" data-size="7"
                                                title="{{ __('home.editarO.tipo') }}" name="tipo">
                                                @foreach ($tip as $item)
                                                    <option value="{{ $item->id }}" @if ($oferta->tipo == $item->id) selected @endif>{{ $item->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="submit-field">
                                            <h5>{{ __('home.editarO.categoria') }}</h5>
                                            <select class="selectpicker with-border" data-size="7"
                                                title="{{ __('home.editarO.categoria') }}" name="categoria">
                                                @foreach ($cat as $item)
                                                    <option value="{{ $item->id }}" @if ($oferta->categoria == $item->id) selected @endif>{{ $item->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="submit-field">
                                            <h5>{{ __('home.editarO.local') }}</h5>
                                            <div class="input-with-icon">
                                                <div id="autocomplete-container">
                                                    <input id="autocomplete-input" class="with-border" type="text"
                                                        placeholder="Type Address" name="localizacion"
                                                        value="{{ $oferta->localizacion }}">
                                                </div>
                                                <i class="icon-material-outline-location-on"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="submit-field">
                                            <h5>{{ __('home.editarO.salario') }}</h5>
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <div class="input-with-icon">
                                                        <input class="with-border" type="text" placeholder="Min"
                                                            name="salMin" value="{{ $oferta->salario_min }}">
                                                        <i class="currency">EUR</i>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="input-with-icon">
                                                        <input class="with-border" type="text" placeholder="Max"
                                                            name="salMax" value="{{ $oferta->salario_max }}">
                                                        <i class="currency">EUR</i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="submit-field">
                                            <h5>{{ __('home.editarO.descripcion') }}</h5>
                                            <textarea cols="50" rows="15" class="with-border" name="descripcion">
                                                                            {{ $oferta->descripcion }}
                                                                        </textarea>
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
                            {{ __('home.editarO.actualizar') }}</button>
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
        $('#dashboard').addClass('active')

    </script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
        });

    </script>
@endsection
