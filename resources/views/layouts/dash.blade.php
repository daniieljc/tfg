<!doctype html>
<html lang="en">

<head>

    <!-- Basic Page Needs
================================================== -->
    <title>Hireo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
================================================== -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/colors/blue.css') }}">

</head>

<body class="gray">

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Header Container
================================================== -->
        <header id="header-container" class="fullwidth dashboard-header not-sticky">

            <!-- Header -->
            <div id="header">
                <div class="container">

                    <!-- Left Side Content -->
                    <div class="left-side">

                        <!-- Logo -->
                        <div id="logo">
                            <a href="index.html"><img src="{{ asset('images/dark.png') }}" alt=""></a>
                        </div>

                        <!-- Main Navigation -->
                        <nav id="navigation">
                            <ul id="responsive">

                                <li><a href="#">Inicio</a> </li>
                                <li><a href="#">Buscar empleo</a> </li>

                            </ul>
                        </nav>
                        <div class="clearfix"></div>
                        <!-- Main Navigation / End -->

                    </div>
                    <!-- Left Side Content / End -->


                    <!-- Right Side Content / End -->
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
                                                                    src="{{ asset('images/user-avatar-small-03.jpg') }}"
                                                                    alt=""></span>
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
                                                    src="{{ asset('images/user-avatar-small-01.jpg') }}" alt=""></div>
                                        </a>
                                    </div>

                                    <!-- Dropdown -->
                                    <div class="header-notifications-dropdown">

                                        <!-- User Status -->
                                        <div class="user-status">

                                            <!-- User Name / Avatar -->
                                            <div class="user-details">
                                                <div class="user-avatar status-online"><img
                                                        src="{{ asset('images/user-avatar-small-01.jpg') }}" alt="">
                                                </div>
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
                                            <li><a href="{{ route('client.inicio') }}"><i
                                                        class="icon-material-outline-dashboard"></i>
                                                    Dashboard</a></li>
                                            <li><a href="{{ route('client.cuenta') }}"><i
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
                                    <li id="dashboard"><a href="{{ route('client.inicio') }}"><i
                                                class="icon-material-outline-dashboard"></i>
                                            Dashboard</a></li>
                                    <li id="ofertas"><a href="{{ route('client.ofertas') }}"><i
                                                class="icon-material-outline-business-center"></i> Mis Ofertas
                                            <span class="nav-tag">1</span></a></li>
                                    <li id="mensajes"><a href=""><i class="icon-material-outline-question-answer"></i>
                                            Mensajes <span class="nav-tag">2</span></a></li>
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
                                    <li id="ajustes"><a href="{{ route('client.cuenta') }}"><i
                                                class="icon-material-outline-settings"></i> Ajustes</a></li>
                                    <li><a href="{{ route('logout') }}"><i
                                                class="icon-material-outline-power-settings-new"></i> Logout</a></li>
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

    <!-- Chart.js // documentation: http://www.chartjs.org/docs/latest/ -->
    <script src="{{ asset('js/chart.min.js') }}"></script>
    <script>
        Chart.defaults.global.defaultFontFamily = "Nunito";
        Chart.defaults.global.defaultFontColor = '#888';
        Chart.defaults.global.defaultFontSize = '14';

        var ctx = document.getElementById('chart').getContext('2d');

        var chart = new Chart(ctx, {
            type: 'line',

            // The data for our dataset
            data: {
                labels: ["January", "February", "March", "April", "May", "June"],
                // Information about the dataset
                datasets: [{
                    label: "Views",
                    backgroundColor: 'rgba(42,65,232,0.08)',
                    borderColor: '#2a41e8',
                    borderWidth: "3",
                    data: [196, 132, 215, 362, 210, 252],
                    pointRadius: 5,
                    pointHoverRadius: 5,
                    pointHitRadius: 10,
                    pointBackgroundColor: "#fff",
                    pointHoverBackgroundColor: "#fff",
                    pointBorderWidth: "2",
                }]
            },

            // Configuration options
            options: {

                layout: {
                    padding: 10,
                },

                legend: {
                    display: false
                },
                title: {
                    display: false
                },

                scales: {
                    yAxes: [{
                        scaleLabel: {
                            display: false
                        },
                        gridLines: {
                            borderDash: [6, 10],
                            color: "#d8d8d8",
                            lineWidth: 1,
                        },
                    }],
                    xAxes: [{
                        scaleLabel: {
                            display: false
                        },
                        gridLines: {
                            display: false
                        },
                    }],
                },

                tooltips: {
                    backgroundColor: '#333',
                    titleFontSize: 13,
                    titleFontColor: '#fff',
                    bodyFontColor: '#fff',
                    bodyFontSize: 13,
                    displayColors: false,
                    xPadding: 10,
                    yPadding: 10,
                    intersect: false
                }
            },


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

    <!-- Google API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=&libraries=places&callback=initAutocomplete"></script>


    @yield('menu')
</body>

</html>
