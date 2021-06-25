<!doctype html>
<html lang="en">

<head>

    <!-- Basic Page Needs
================================================== -->
    <title>JobSierra</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
================================================== -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/colors/blue.css') }}">

</head>

<body class="gray">
    <div id="wrapper">
        <header id="header-container" class="fullwidth dashboard-header not-sticky">
            <div id="header">
                <div class="container">
                    <div class="left-side">
                        <div id="logo">
                            <a href="{{ route('home.inicio') }}"><img src="{{ asset('images/dark.png') }}"
                                    alt=""></a>
                        </div>
                        <nav id="navigation">
                            <ul id="responsive">
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

                                    <!-- Dropdown -->
                                    <div class="header-notifications-dropdown">

                                        <!-- User Status -->
                                        <div class="user-status">

                                            <!-- User Name / Avatar -->
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
                                                        {{ __('home.menu.usuario') }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <ul class="user-menu-small-nav">
                                            @if (Auth::user()->status)
                                                <li><a href="{{ route('candidate.inicio') }}"><i
                                                            class="icon-material-outline-dashboard"></i>
                                                        {{ __('home.menu.tablero') }}</a></li>
                                            @endif
                                            <li><a href="{{ route('candidate.cuenta') }}"><i
                                                        class="icon-material-outline-settings"></i>
                                                    {{ __('home.menu.ajustes') }}</a></li>
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
        <!-- Header Container / End -->

        <div class="dashboard-container">

            <!-- Dashboard Sidebar
            ================================================== -->
            <div class="dashboard-sidebar">
                <div class="dashboard-sidebar-inner" data-simplebar>
                    <div class="dashboard-nav-container">

                        <!-- Responsive Navigation Trigger -->
                        <a href="#" class="dashboard-responsive-nav-trigger">
                            <span class="hamburger hamburger--collapse">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </span>
                            <span class="trigger-title">Dashboard Navigation</span>
                        </a>

                        <!-- Navigation -->
                        <div class="dashboard-nav">
                            <div class="dashboard-nav-inner">

                                <ul data-submenu-title="Inicio">
                                    @if (Auth::user()->status)

                                        <li id="dashboard"><a href="{{ route('candidate.inicio') }}"><i
                                                    class="icon-material-outline-dashboard"></i>
                                                {{ __('home.menu.tablero') }}</a></li>
                                    @endif
                                    <li id="ofertas"><a href="{{ route('candidate.ofertas') }}"><i
                                                class="icon-material-outline-business-center"></i>
                                            {{ __('home.candidate.misOfertas') }}
                                        </a></li>
                                </ul>

                                <ul data-submenu-title="Cuenta">
                                    <li id="ajustes"><a href="{{ route('candidate.cuenta') }}"><i
                                                class="icon-material-outline-settings"></i>
                                            {{ __('home.menu.ajustes') }}</a></li>
                                    <li><a href="{{ route('logout') }}"><i
                                                class="icon-material-outline-power-settings-new"></i>
                                            {{ __('home.menu.salir') }}</a></li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @yield('content')
        </div>
    </div>


    <!-- Scripts
================================================== -->
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

    @yield('menu')
</body>

</html>
