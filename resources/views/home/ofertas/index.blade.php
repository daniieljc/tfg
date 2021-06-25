@extends('home.app')

@section('content')
    <div class="full-page-container">

        <div class="full-page-sidebar">
            <div class="full-page-sidebar-inner" data-simplebar>
                <div class="sidebar-container">

                    <!-- Location -->
                    <div class="sidebar-widget">
                        <h3> {{ __('home.jobs.location') }}</h3>
                        <div class="input-with-icon">
                            <div id="autocomplete-container">
                                <input type="text" placeholder="Location" name="local" id="local">
                            </div>
                            <i class="icon-material-outline-location-on"></i>
                        </div>
                    </div>

                    <div class="sidebar-widget">
                        <h3>{{ __('home.jobs.ofertasde') }}</h3>
                        <div class="keywords-container">
                            <div class="keyword-input-container">
                                <input type="text" class="keyword-input" placeholder="e.j. titulo del trabajo" id="titulo"
                                    name="titulo" />
                            </div>

                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="sidebar-widget">
                        <h3>{{ __('home.jobs.Categoria') }}</h3>
                        <select class="selectpicker default" data-selected-text-format="count" data-size="7"
                            title="{{ __('home.jobs.TCategoria') }}" name="categoria" id="categoria">
                            <option value="">{{ __('home.jobs.TCategoria') }}</option>
                            @foreach ($categoriaTrabajo as $item)
                                @if (\Request::get('categoria') == $item->id)
                                    <option value="{{ $item->id }}" selected>{{ $item->nombre }}</option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="sidebar-widget">
                        <h3>{{ __('home.jobs.Tipo') }}</h3>
                        <select class="selectpicker default" data-selected-text-format="count" data-size="7"
                            title="{{ __('home.jobs.TTipo') }}" name="tipo" id="tipo">
                            <option value="">{{ __('home.jobs.TTipo') }}</option>
                            @foreach ($tipoTrabajo as $item)
                                @if (\Request::get('tipo') == $item->id)
                                    <option value="{{ $item->id }}" selected>{{ $item->nombre }}</option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <!-- Salary -->
                    <div class="sidebar-widget">
                        <h3>{{ __('home.jobs.Salario') }}</h3>
                        <div class="margin-top-55"></div>

                        @if (\Request::get('salario_min') != '' && \Request::get('salario_max'))
                            <input class="range-slider" type="text" value="" data-slider-min="900" data-slider-max="60000"
                                data-slider-step="100"
                                data-slider-value="[{{ \Request::get('salario_min') }},{{ \Request::get('salario_max') }}]"
                                data-slider-currency="€" id="salario" name="salario" value="5000" />
                        @else
                            <input class="range-slider" type="text" value="" data-slider-min="0" data-slider-max="60000"
                                data-slider-step="100" data-slider-value="[0,0]" data-slider-currency="€" id="salario"
                                name="salario" value="5000" />
                        @endif
                    </div>

                </div>

                <div class="sidebar-search-button-container">
                    <button class="button ripple-effect" id="aplicarFiltro">{{ __('home.jobs.Buscar') }}</button>
                </div>

            </div>
        </div>
 
        <div class="full-page-content-container" data-simplebar>
            <div class="full-page-content-inner">

                <h3 class="page-title">{{ __('home.jobs.Resultado') }}</h3>

                <div class="listings-container grid-layout margin-top-15">
                    <!-- Job Listing -->
                    @foreach ($ofertas as $item)
                        <a href="{{ route('home.ofertas.i', ['id' => $item->idO]) }}" class="job-listing">

                            <!-- Job Listing Details -->
                            <div class="job-listing-details">
                                <!-- Logo -->
                                <div class="job-listing-company-logo">
                                    @if ($item->image_profile)
                                        <img src="{{ route('storage.avatar', ['img' => $item->image_profile]) }}"
                                            alt="" />
                                    @else
                                        <img src="{{ asset('images/company-logo-05.png') }}" alt="">
                                    @endif
                                </div>

                                <!-- Details -->
                                <div class="job-listing-description">
                                    <h4 class="job-listing-company">{{ $item->nombre }}</h4>
                                    <h3 class="job-listing-title">{{ $item->titulo }}</h3>
                                </div>
                            </div>

                            <!-- Job Listing Footer -->
                            <div class="job-listing-footer">
                                <ul>
                                    <li><i class="icon-material-outline-location-on"></i> {{ $item->localizacion }}</li>
                                    <li><i class="icon-material-outline-business-center"></i> {{ $item->tipoN }}</li>
                                    @if ($item->salario_min && $item->salario_max)
                                        <li><i
                                                class="icon-material-outline-account-balance-wallet"></i>{{ $item->salario_min }}€
                                            - {{ $item->salario_max }}€</li>
                                    @else
                                        <li><i class="icon-material-outline-account-balance-wallet"></i>Sin especificar</li>
                                    @endif
                                    <li><i class="icon-material-outline-access-time"></i>
                                        {{ Date::parse($item->created_at)->diffForHumans() }}
                                    </li>
                                </ul>
                            </div>
                        </a>
                    @endforeach
                </div>

                <div class="clearfix"></div>

                @include('includes.paginator', ['paginator' => $ofertas])

                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection

@section('script')

    <script>
        var queryString = window.location.search;
        var urlParams = new URLSearchParams(queryString);
        var url = "?"

        $('#local').val(urlParams.get('local'))
        $('#categoria').val(urlParams.get('categoria'))
        $('#tipo').val(urlParams.get('tipo'))
        $('#titulo').val(urlParams.get('titulo'))
        $('#salario_min').val(urlParams.get('salario_min'))
        $('#salario_max').val(urlParams.get('salario_max'))

        $('#aplicarFiltro').on('click', function() {

            if ($('#local').val() != '' && $('#local').val() != undefined) {
                url += `local=${$('#local').val()}&`
            }

            if ($('#categoria').val() != '') {
                url += `categoria=${$('#categoria').val()}&`
            }

            if ($('#tipo').val() != '') {
                url += `tipo=${$('#tipo').val()}&`
            }

            if ($('#titulo').val() != '') {
                url += `titulo=${$('#titulo').val()}&`
            }

            if ($('#salario').val()) {
                var sal = $('#salario').val().split(',')

                if (sal[0] != 0 && sal[1] != 0) {
                    url += `salario_min=${sal[0]}&`
                    url += `salario_max=${sal[1]}`
                }
            }

            console.log(url)
            window.location = location.origin + location.pathname + url
        })

    </script>

@endsection
