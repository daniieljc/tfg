@extends('home.app')

@section('content')
    <div class="single-page-header" data-background-image="{{ asset('images/single-job.jpg') }}"
        style="margin-bottom: 35px !important">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="single-page-header-inner">
                        <div class="left-side">
                            <div class="header-image">
                                @if ($oferta->image_profile)
                                    <img src="{{ route('storage.avatar', ['img' => $oferta->image_profile]) }}" alt="">
                                @else
                                    <img src="{{ asset('images/company-logo-05.png') }}" alt="">
                                @endif
                            </div>
                            <div class="header-details">
                                <h3>{{ $oferta->titulo }}</h3>
                                <h5>{{ __('home.job.sobre') }}</h5>
                                <ul>
                                    <li>
                                        <i class="icon-material-outline-business"></i>
                                        {{ $oferta->nombre }}
                                    </li>
                                    <li><i class="icon-material-outline-location-on"></i>{{ $oferta->localizacion }}</li>
                                </ul>
                            </div>
                        </div>
                        @if ($oferta->salario_min && $oferta->salario_max)
                            <div class="right-side">
                                <div class="salary-box">
                                    <div class="salary-type">{{ __('home.job.salarioanual') }}</div>
                                    <div class="salary-amount">{{ $oferta->salario_min }}€ - {{ $oferta->salario_max }}€
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">

        @include('includes.notify')

        <div class="row">

            <!-- Content -->
            <div class="col-xl-8 col-lg-8 content-right-offset">

                <div class="single-page-section">
                    <h3 class="margin-bottom-25">{{ __('home.job.descripcion') }}</h3>
                    {!! $oferta->descripcion !!}
                </div>

                @if ($ofertaSimilares->count() != 0)
                    <div class="single-page-section">
                        <h3 class="margin-bottom-25">{{ __('home.job.similar') }}</h3>

                        <!-- Listings Container -->
                        <div class="listings-container grid-layout">

                            @foreach ($ofertaSimilares as $item2)
                                <a href="{{ route('home.ofertas.i', ['id' => $item2->id]) }}" class="job-listing">

                                    <!-- Job Listing Details -->
                                    <div class="job-listing-details">
                                        <!-- Logo -->
                                        <div class="job-listing-company-logo">
                                            @if ($item2->image_profile)
                                                <img src="{{ route('storage.avatar', ['img' => $item2->image_profile]) }}"
                                                    alt="" />
                                            @else
                                                <img src="{{ asset('images/company-logo-05.png') }}" alt="">
                                            @endif
                                        </div>

                                        <!-- Details -->
                                        <div class="job-listing-description">
                                            <h4 class="job-listing-company">{{ $item2->nombre }}</h4>
                                            <h3 class="job-listing-title">{{ $item2->titulo }}</h3>
                                        </div>
                                    </div>

                                    <!-- Job Listing Footer -->
                                    <div class="job-listing-footer">
                                        <ul>
                                            <li><i class="icon-material-outline-location-on"></i>
                                                {{ $item2->localizacion }}</li>
                                            <li><i class="icon-material-outline-business-center"></i> Full Time</li>
                                            @if ($item2->salario_mix && $item2->salario_max)
                                                <li><i class="icon-material-outline-account-balance-wallet"></i>
                                                    {{ $item2->salario_min }}€ - {{ $item2->salario_max }}€</li>
                                            @else
                                                <li><i class="icon-material-outline-account-balance-wallet"></i>
                                                    Sin especificar</li>
                                            @endif

                                            <li><i class="icon-material-outline-access-time"></i>
                                                {{ Date::parse($item2->created_at)->format('j \\' . __('date.de') . ' F \\' . __('date.de') . ' Y') }}
                                            </li>
                                        </ul>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        <!-- Listings Container / End -->

                    </div>
                @endif
            </div>


            <!-- Sidebar -->
            <div class="col-xl-4 col-lg-4">
                <div class="sidebar-container">

                    @if (Auth::user()->role != 2 && Auth::user()->role != 3)
                        @if (!$status)
                            <a href="#small-dialog"
                                class="popup-with-zoom-anim apply-now-button">{{ __('home.job.inscribirse') }} <i
                                    class="icon-material-outline-arrow-right-alt"></i></a>
                        @else
                            <a class="apply-now-button" style="color: white">{{ __('home.job.inscrito') }} <i
                                    class="icon-feather-check"></i></a>
                        @endif
                    @endif

                    <!-- Sidebar Widget -->
                    <div class="sidebar-widget">
                        <div class="job-overview">
                            <div class="job-overview-headline">{{ __('home.job.resumen') }} </div>
                            <div class="job-overview-inner">
                                <ul>
                                    <li>
                                        <i class="icon-material-outline-location-on"></i>
                                        <span>{{ __('home.job.localizacion') }}</span>
                                        <h5>{{ $oferta->localizacion }}</h5>
                                    </li>
                                    <li>
                                        <i class="icon-material-outline-business-center"></i>
                                        <span>{{ __('home.job.Tipo') }}</span>
                                        <h5>{{ $oferta->tipoN }}</h5>
                                    </li>
                                    <li>
                                        <i class="icon-material-outline-business-center"></i>
                                        <span>{{ __('home.job.Categoria') }}</span>
                                        <h5>{{ $oferta->categoriaN }}</h5>
                                    </li>
                                    @if ($oferta->salario_min && $oferta->salario_max)
                                        <li>
                                            <i class="icon-material-outline-local-atm"></i>
                                            <span>{{ __('home.job.Salario') }}</span>
                                            <h5>{{ $oferta->salario_min }}€ - {{ $oferta->salario_max }}€</h5>
                                        </li>
                                    @endif
                                    <li>
                                        <i class="icon-material-outline-access-time"></i>
                                        <span>{{ __('home.job.fecha') }} </span>
                                        <h5>{{ Date::parse($oferta->created_at)->format('j \\' . __('date.de') . ' F \\' . __('date.de') . ' Y - H:i') }}
                                        </h5>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar Widget -->
                    <div class="sidebar-widget">
                        <h3>{{ __('home.job.Compartir') }}</h3>

                        <div class="copy-url">
                            <input id="copy-url" type="text" value="" class="with-border">
                            <button class="copy-url-button ripple-effect" data-clipboard-target="#copy-url"
                                title="Copy to Clipboard" data-tippy-placement="top"><i
                                    class="icon-material-outline-file-copy"></i></button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @include('home.includes.incripcion')

@endsection

@section('script')
    <script>
        $('.notification').css('margin-bottom', '35px')

    </script>
    <script>
        $('#submit').on('click', function() {
            $('#inscribir').submit()
        })

    </script>
@endsection
