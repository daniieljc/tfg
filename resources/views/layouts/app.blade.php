<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Hostemy</title>
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
                            <a href="{{ route('home') }}"><img src="images/dark.png" alt=""></a>
                        </div>

                        <!-- Main Navigation -->
                        <nav id="navigation">
                            <ul id="responsive" class="menu-movil">
                                <li>
                                    <a href="{{ route('home') }}" class="current">Inicio</a>
                                </li>
                                <li>
                                    <a href="{{ route('home') }}">Buscar empleo</a>
                                </li>
                            </ul>
                        </nav>
                        <div class="clearfix"></div>
                        <!-- Main Navigation / End -->

                    </div>

                    <div class="right-side">

                        @if (Auth::user())
                            <div class="header-widget hide-on-mobile">

                                <!-- Notifications -->
                                <div class="header-notifications">

                                    <!-- Trigger -->
                                    <div class="header-notifications-trigger">
                                        <a href="#"><i class="icon-feather-bell"></i><span>4</span></a>
                                    </div>

                                    <!-- Dropdown -->
                                    <div class="header-notifications-dropdown">

                                        <div class="header-notifications-headline">
                                            <h4>Notificaciones</h4>
                                            <button class="mark-as-read ripple-effect-dark" title="Mark all as read"
                                                data-tippy-placement="left">
                                                <i class="icon-feather-check-square"></i>
                                            </button>
                                        </div>

                                        <div class="header-notifications-content">
                                            <div class="header-notifications-scroll" data-simplebar>
                                                <ul>
                                                    <!-- Notification -->
                                                    <li class="notifications-not-read">
                                                        <a href="dashboard-manage-candidates.html">
                                                            <span class="notification-icon"><i
                                                                    class="icon-material-outline-group"></i></span>
                                                            <span class="notification-text">
                                                                <strong>Michael Shannah</strong> applied for a job <span
                                                                    class="color">Full Stack Software Engineer</span>
                                                            </span>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <!-- Messages -->
                                <div class="header-notifications">
                                    <div class="header-notifications-trigger">
                                        <a href="#"><i class="icon-feather-mail"></i><span>3</span></a>
                                    </div>

                                    <!-- Dropdown -->
                                    <div class="header-notifications-dropdown">

                                        <div class="header-notifications-headline">
                                            <h4>Mensajes</h4>
                                            <button class="mark-as-read ripple-effect-dark" title="Mark all as read"
                                                data-tippy-placement="left">
                                                <i class="icon-feather-check-square"></i>
                                            </button>
                                        </div>

                                        <div class="header-notifications-content">
                                            <div class="header-notifications-scroll" data-simplebar>
                                                <ul>
                                                    <!-- Notification -->
                                                    <li class="notifications-not-read">
                                                        <a href="dashboard-messages.html">
                                                            <span class="notification-avatar status-online"><img
                                                                    src="images/user-avatar-small-03.jpg" alt=""></span>
                                                            <div class="notification-text">
                                                                <strong>David Peterson</strong>
                                                                <p class="notification-msg-text">Thanks for reaching
                                                                    out.
                                                                    I'm quite busy right now on many...</p>
                                                                <span class="color">4 hours ago</span>
                                                            </div>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>

                                        <a href="dashboard-messages.html"
                                            class="header-notifications-button ripple-effect button-sliding-icon">Ver
                                            todos<i class="icon-material-outline-arrow-right-alt"></i></a>
                                    </div>
                                </div>

                            </div>

                            <div class="header-widget">
                                <div class="header-notifications user-menu">
                                    <div class="header-notifications-trigger">
                                        <a href="#">
                                            <div class="user-avatar status-online"><img
                                                    src="images/user-avatar-small-01.jpg" alt=""></div>
                                        </a>
                                    </div>

                                    <!-- Dropdown -->
                                    <div class="header-notifications-dropdown">

                                        <!-- User Status -->
                                        <div class="user-status">

                                            <!-- User Name / Avatar -->
                                            <div class="user-details">
                                                <div class="user-avatar status-online"><img
                                                        src="images/user-avatar-small-01.jpg" alt=""></div>
                                                <div class="user-name">
                                                    {{ Auth::user()->nombre }} {{ Auth::user()->apellidos }}
                                                    <span>
                                                        @if (Auth::user()->business == 1)
                                                            Empresa
                                                        @elseif (Auth::user()->role == 'user')
                                                            Usuario
                                                        @elseif (Auth::user()->role == 'teacher')
                                                            Profesor
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>

                                            <!-- User Status Switcher -->
                                            <div class="status-switch" id="snackbar-user-status">
                                                <label class="user-online current-status">Online</label>
                                                <label class="user-invisible">Invisible</label>
                                                <!-- Status Indicator -->
                                                <span class="status-indicator" aria-hidden="true"></span>
                                            </div>
                                        </div>

                                        <ul class="user-menu-small-nav">
                                            <li><a href="{{ route('client.inicio') }}"><i class="icon-material-outline-dashboard"></i>
                                                    Dashboard</a></li>
                                            <li><a href="{{ route('client.cuenta')}}"><i
                                                        class="icon-material-outline-settings"></i> Ajustes</a></li>
                                            <li><a href="{{ route('logout') }}"><i
                                                        class="icon-material-outline-power-settings-new"></i> Logout</a>
                                            </li>
                                        </ul>

                                    </div>
                                </div>

                            </div>
                        @else
                            <div class="header-widget hide-on-mobile">
                                <nav id="navigation">
                                    <a href="{{ route('login') }}" class="button ripple-effect">Iniciar Sesión</a>
                                    <a href="{{ route('register') }}" class="button ripple-effect">Regístrate</a>
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
                                            <img src="images/light.png" alt="">
                                        </div>
                                    </div>
                                </div>

                                <!-- Right Side -->
                                <div class="footer-rows-right">

                                    <!-- Social Icons -->
                                    <div class="footer-row">
                                        <div class="footer-row-inner">
                                            <ul class="footer-social-links">
                                                <li>
                                                    <a href="#" title="Facebook" data-tippy-placement="bottom"
                                                        data-tippy-theme="light">
                                                        <i class="icon-brand-facebook-f"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Twitter" data-tippy-placement="bottom"
                                                        data-tippy-theme="light">
                                                        <i class="icon-brand-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Google Plus" data-tippy-placement="bottom"
                                                        data-tippy-theme="light">
                                                        <i class="icon-brand-google-plus-g"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" title="LinkedIn" data-tippy-placement="bottom"
                                                        data-tippy-theme="light">
                                                        <i class="icon-brand-linkedin-in"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>

                                    <!-- Language Switcher -->
                                    <div class="footer-row">
                                        <div class="footer-row-inner">
                                            <select class="selectpicker language-switcher"
                                                data-selected-text-format="count" data-size="5">
                                                <option selected>English</option>
                                                <option>Français</option>
                                                <option>Español</option>
                                                <option>Deutsch</option>
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
                        <div class="col-xl-3 col-lg-3 col-md-3">
                            <div class="footer-links">
                                <h3>Enlaces rápidos</h3>
                                <ul>
                                    <li><a href="#"><span>Buscar trabajo</span></a></li>
                                    <li><a href="#"><span>Ver inscripciones</span></a></li>
                                    <li><a href="#"><span>Mensajería</span></a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Links -->
                        <div class="col-xl-3 col-lg-3 col-md-3">
                            <div class="footer-links">
                                <h3>Compañía</h3>
                                <ul>
                                    <li><a href="#"><span>Contactar</span></a></li>
                                    <li><a href="#"><span>Política de privacidad</span></a></li>
                                    <li><a href="#"><span>Terminos y condiciones</span></a></li>
                                </ul>
                            </div>
                        </div>

                        @if (!Auth::user())
                            <div class="col-xl-2 col-lg-2 col-md-3">
                                <div class="footer-links">
                                    <h3>Cuenta</h3>
                                    <ul>
                                        <li><a href="#"><span>Iniciar Sesión</span></a></li>
                                        <li><a href="#"><span>Regístrate</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        @endif

                        <!-- Newsletter -->
                        <div class="col-xl-4 col-lg-4 col-md-12">
                            <h3><i class="icon-feather-mail"></i> Regístrese para recibir un boletín </h3>
                            <p>Noticias de última hora, análisis y consejos de última generación en la búsqueda de
                                empleo.</p>
                            <form action="#" method="get" class="newsletter">
                                <input type="text" name="fname" placeholder="Introduce tu dirección de correo">
                                <button type="submit"><i class="icon-feather-arrow-right"></i></button>
                            </form>
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
                            © 2021 <strong>Hostemy</strong>. Todos los derechos reservados.
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Copyrights / End -->

        </div>
        <!-- Footer / End -->

    </div>
    <!-- Wrapper / End -->

    <script src="js/app.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.min.js"></script>
    <script src="js/mmenu.min.js"></script>
    <script src="js/tippy.all.min.js"></script>
    <script src="js/simplebar.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/snackbar.js"></script>
    <script src="js/clipboard.min.js"></script>
    <script src="js/counterup.min.js"></script>
    <script src="js/magnific-popup.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/custom.js"></script>

    @yield('changeForm')

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
        }

        // Autocomplete adjustment for homepage
        if ($('.intro-banner-search-form')[0]) {
            setTimeout(function() {
                $(".pac-container").prependTo(".intro-search-field.with-autocomplete");
            }, 300);
        }

    </script>

</body>

</html>
