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

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
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
                        <div class="header-widget">
                            <div class="header-notifications user-menu">
                                <div class="header-notifications-trigger">
                                    <a href="#">
                                        <div class="user-avatar status-online">
                                            @if (Auth::user()->image_profile)
                                                <img src="{{ route('storage.avatar', ['img' => Auth::user()->image_profile]) }}"
                                                    alt="" style="height: 100%;" />
                                            @else
                                                <img src="{{ asset('images/user-avatar-small-01.jpg') }} " alt="" />
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
                            <span class="trigger-title">Menu</span>
                        </a>

                        <!-- Navigation -->
                        <div class="dashboard-nav">
                            <div class="dashboard-nav-inner">

                                <ul data-submenu-title="Inicio">
                                    <li id="dashboard"><a href="{{ route('business.inicio') }}"><i
                                                class="icon-material-outline-dashboard"></i>
                                            {{ __('home.menu.tablero') }}</a></li>
                                    <li id="ofertas"><a href="#"><i class="icon-material-outline-business-center"></i>
                                            {{ __('home.menu.ofertas') }}</a>
                                        <ul>
                                            <li><a
                                                    href="{{ route('business.ofertas') }}">{{ __('home.menu.listado') }}</a>
                                            </li>
                                            <li><a
                                                    href="{{ route('business.ofertas.publicar') }}">{{ __('home.menu.publicar') }}</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>

                                <!--<ul data-submenu-title="Organizar y administrar">
                                    <li><a href="#"><i class="icon-material-outline-business-center"></i> Jobs</a>
                                        <ul>
                                            <li><a href="dashboard-manage-jobs.html">Manage Jobs <span
                                                        class="nav-tag">3</span></a></li>
                                            <li><a href="dashboard-manage-candidates.html">Manage Candidates</a></li>
                                            <li><a href="dashboard-post-a-job.html">Post a Job</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><i class="icon-material-outline-assignment"></i> Tasks</a>
                                        <ul>
                                            <li><a href="dashboard-manage-tasks.html">Manage Tasks <span
                                                        class="nav-tag">2</span></a></li>
                                            <li><a href="dashboard-manage-bidders.html">Manage Bidders</a></li>
                                            <li><a href="dashboard-my-active-bids.html">My Active Bids <span
                                                        class="nav-tag">4</span></a></li>
                                            <li><a href="dashboard-post-a-task.html">Post a Task</a></li>
                                        </ul>
                                    </li>
                                </ul>-->

                                <ul data-submenu-title="Cuenta">
                                    <li id="ajustes"><a href="{{ route('business.cuenta') }}"><i
                                                class=" icon-material-outline-settings"></i>
                                            {{ __('home.menu.ajustes') }}</a></li>
                                    <li><a href="{{ route('logout') }}"><i
                                                class="icon-material-outline-power-settings-new"></i>
                                            {{ __('home.menu.salir') }}</a></li>
                                </ul>

                            </div>
                        </div>
                        <!-- Navigation / End -->

                    </div>
                </div>
            </div>
            <!-- Dashboard Sidebar / End -->

            @yield('content')

            <!-- Dashboard Content / End -->

        </div>

    </div>
    <!-- Wrapper / End -->
    <!-- Scripts
================================================== -->
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

    <!-- Snackbar // documentation: https://www.polonel.com/snackbar/ -->
    <script>
        // Snackbar for user status switcher
        $('#snackbar-user-status label').click(function() {
            Snackbar.show({
                text: 'Your status has been changed!',
                pos: 'bottom-center',
                showAction: false,
                actionText: "Dismiss",
                duration: 3000,
                textColor: '#fff',
                backgroundColor: '#383838'
            });
        });

    </script>


    <!-- Google Autocomplete -->
    <script>
        function initAutocomplete() {
            var options = {
                types: ['(cities)'],
                // componentRestrictions: {country: "us"}
            };

            var input = document.getElementById('autocomplete-input');
            var autocomplete = new google.maps.places.Autocomplete(input, options);

            if ($('.submit-field')[0]) {
                setTimeout(function() {
                    $(".pac-container").prependTo("#autocomplete-container");
                }, 300);
            }
        }

    </script>


    <script src="https://cdn.tiny.cloud/1/gp830uvzuhs9x8km3hknwjcy32gnlq37e6y8mr8rsifgoz21/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>

    @yield('menu')
    @yield('script')
</body>

</html>
