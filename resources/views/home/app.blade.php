<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>JobSierra</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
================================================== -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/colors/blue.css') }}">

</head>

<body>

    <!-- Wrapper -->
    <div id="wrapper">
        <header id="header-container" class="fullwidth">

            <!-- Header -->
            <div id="header">
                <div class="container">

                    <!-- Left Side Content -->
                    <div class="left-side">

                        <!-- Logo -->
                        <div id="logo">
                            <a href="{{ route('home.inicio') }}"><img src="{{ asset('images/dark.png') }}"
                                    alt=""></a>
                        </div>

                        <!-- Main Navigation -->
                        <nav id="navigation">
                            <ul id="responsive" class="menu-movil">
                                <li>
                                    <a href="{{ route('home.inicio') }}"
                                        class="current">{{ __('home.menu.home') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('home.noticias') }}"
                                        class="current">{{ __('home.menu.notices') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('home.ofertas') }}">{{ __('home.menu.lookJob') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('home.about') }}">{{ __('home.menu.aboutme') }}</a>
                                </li>
                            </ul>
                        </nav>
                        <div class="clearfix"></div>
                        <!-- Main Navigation / End -->

                    </div>

                    <div class="right-side">

                        @if (Auth::user())
                            <div class="header-widget">
                                <div class="header-notifications user-menu">
                                    <div class="header-notifications-trigger">
                                        <a href="#">
                                            <div class="user-avatar status-online">
                                                @if (Auth::user()->image_profile)
                                                    <img src="{{ route('storage.avatar', ['img' => Auth::user()->image_profile]) }}"
                                                        alt="" style="height: 100%;" />
                                                @else
                                                    <img src="{{ asset('images/user-avatar-small-01.jpg') }} "
                                                        alt="" />
                                                @endif
                                            </div>
                                        </a>
                                    </div>

                                    <div class="header-notifications-dropdown">
                                        <div class="user-status">
                                            <div class="user-details">
                                                <div class="user-avatar status-online">
                                                    @if (Auth::user()->image_profile)
                                                        <img src="{{ route('storage.avatar', ['img' => Auth::user()->image_profile]) }}"
                                                            alt="" style="height: 100%;" />
                                                    @else
                                                        <img src="{{ asset('images/user-avatar-small-01.jpg') }} "
                                                            alt="" />
                                                    @endif
                                                </div>
                                                <div class="user-name">
                                                    {{ Auth::user()->nombre }} {{ Auth::user()->apellidos }}
                                                    <span>
                                                        @if (Auth::user()->role == 1)
                                                            {{ __('home.menu.usuario') }}
                                                        @elseif (Auth::user()->role == 2)
                                                            {{ __('home.menu.empresa') }}
                                                        @elseif (Auth::user()->role == 3)
                                                            {{ __('home.menu.profesor') }}
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <ul class="user-menu-small-nav">
                                            @if (Auth::user()->status && Auth::user()->email_verified_at)
                                                @if (Auth::user()->role == 1)
                                                    <li><a href="{{ route('candidate.inicio') }}"><i
                                                                class="icon-material-outline-dashboard"></i>{{ __('home.menu.tablero') }}</a>
                                                    </li>
                                                    <li><a href="{{ route('candidate.cuenta') }}"><i
                                                                class="icon-material-outline-settings"></i>
                                                            {{ __('home.menu.ajustes') }}</a>
                                                    </li>
                                                @elseif (Auth::user()->role == 3)
                                                    <li><a href="{{ route('teacher.inicio') }}"><i
                                                                class="icon-material-outline-dashboard"></i>{{ __('home.menu.tablero') }}</a>
                                                    </li>
                                                    <li><a href="{{ route('teacher.cuenta') }}"><i
                                                                class="icon-material-outline-settings"></i>
                                                            {{ __('home.menu.ajustes') }}</a>
                                                    </li>
                                                @else
                                                    <li><a href="{{ route('business.inicio') }}"><i
                                                                class="icon-material-outline-dashboard"></i>{{ __('home.menu.tablero') }}</a>
                                                    </li>
                                                    <li><a href="{{ route('business.cuenta') }}"><i
                                                                class="icon-material-outline-settings"></i>
                                                            {{ __('home.menu.ajustes') }}</a>
                                                    </li>
                                                @endif
                                            @endif

                                            <li><a href="{{ route('logout') }}"><i
                                                        class="icon-material-outline-power-settings-new"></i>
                                                    {{ __('home.menu.salir') }}</a>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="header-widget hide-on-mobile">
                                <nav id="navigation">
                                    <a href="{{ route('login') }}"
                                        class="button ripple-effect">{{ __('home.login') }}</a>
                                    <a href="{{ route('register') }}"
                                        class="button ripple-effect">{{ __('home.register') }}</a>
                                </nav>
                            </div>

                        @endif

                        <!-- Mobile Navigation Button -->
                        <span class="mmenu-trigger">
                            <button class="hamburger hamburger--collapse" type="button">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </span>

                    </div>
                    <!-- Right Side Content / End -->

                </div>
            </div>
            <!-- Header / End -->

        </header>
        <div class="clearfix"></div>

        @yield('content')

        <!-- Footer
================================================== -->
        <div id="footer">

            <!-- Footer Top Section -->
            <div class="footer-top-section">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">

                            <!-- Footer Rows Container -->
                            <div class="footer-rows-container">

                                <!-- Left Side -->
                                <div class="footer-rows-left">
                                    <div class="footer-row">
                                        <div class="footer-row-inner footer-logo">
                                            <img src="{{ asset('images/light.png') }}" alt="">
                                        </div>
                                    </div>
                                </div>

                                <!-- Right Side -->
                                <div class="footer-rows-right">
                                    <!-- Language Switcher -->
                                    <div class="footer-row">
                                        <div class="footer-row-inner">
                                            <select class="selectpicker language-switcher"
                                                data-selected-text-format="count" data-size="5" id="lang">
                                                @if (session('locale') == 'en')
                                                    <option value="es">Spanish</option>
                                                    <option selected value="en">English</option>
                                                @else
                                                    <option selected value="es">Español</option>
                                                    <option value="en">Ingles</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- Footer Rows Container / End -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Top Section / End -->

            <!-- Footer Middle Section -->
            <div class="footer-middle-section">
                <div class="container">
                    <div class="row">

                        <!-- Links -->
                        <div class="col-xl-4 col-lg-3 col-md-3">
                            <div class="footer-links">
                                <h3>{{ __('home.enlaces.nosotros') }}</h3>
                                <p>{{ __('home.enlaces.descrip') }}</p>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-3 col-md-3">
                            <div class="footer-links">
                                <h3>{{ __('home.enlaces.enlacesR') }}</h3>
                                <ul>
                                    <li><a
                                            href="{{ route('home.ofertas') }}"><span>{{ __('home.enlaces.buscar') }}</span></a>
                                    </li>
                                    @if (Auth::check() && Auth::user()->role == 1)
                                        <li><a
                                                href="{{ route('candidate.ofertas') }}"><span>{{ __('home.enlaces.inscrip') }}</span></a>
                                        </li>
                                    @endif

                                    <li><a
                                            href="{{ route('home.noticias') }}"><span>{{ __('home.enlaces.noticias') }}</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Links -->
                        <div class="col-xl-4 col-lg-3 col-md-3">
                            <div class="footer-links">
                                <h3>{{ __('home.enlaces.compañia') }}</h3>
                                <ul>
                                    <li><a
                                            href="{{ route('home.about') }}"><span>{{ __('home.enlaces.contactar') }}</span></a>
                                    </li>
                                    <li><a href="https://danieljimenez.info"
                                            target="_blank"><span>{{ __('home.enlaces.desarrollador') }}</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Middle Section / End -->

            <!-- Footer Copyrights -->
            <div class="footer-bottom-section">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            © 2021 <strong>JobSierra</strong>. {{ __('home.derechos') }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Copyrights / End -->

        </div>
        <!-- Footer / End -->

    </div>
    <!-- Wrapper / End -->

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery-migrate-3.0.0.min.js') }}"></script>
    <script src="{{ asset('js/mmenu.min.js') }}"></script>
    <script src="{{ asset('js/tippy.all.min.js') }}"></script>
    <script src="{{ asset('js/simplebar.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-slider.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('js/snackbar.js') }}"></script>
    <script src="{{ asset('js/clipboard.min.js') }}"></script>
    <script src="{{ asset('js/counterup.min.js') }}"></script>
    <script src="{{ asset('js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

    <script>
        $('#lang').on('change', function() {
            locale = $('#lang').val()
            if (locale == 'es')
                window.location = "{{ route('idioma', ['locale' => 'es']) }}"
            else
                window.location = "{{ route('idioma', ['locale' => 'en']) }}"

        })

    </script>

    @yield('changeForm')
    @yield('script')

</body>

</html>
