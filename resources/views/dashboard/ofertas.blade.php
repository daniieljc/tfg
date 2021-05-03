@extends('layouts.dash')

@section('content')
    <div class="dashboard-content-container" data-simplebar>
        <div class="dashboard-content-inner">

            <!-- Dashboard Headline -->
            <div class="dashboard-headline">
                <h3>Ofertas</h3>

                <!-- Breadcrumbs -->
                <nav id="breadcrumbs" class="dark">
                    <ul>
                        <li><a href="#">Dashboard</a></li>
                        <li>Ofertas</li>
                    </ul>
                </nav>
            </div>

            <!-- Row -->
            <div class="row">

                <!-- Dashboard Box -->
                <div class="col-xl-12">
                    <div class="dashboard-box margin-top-0">

                        <!-- Headline -->
                        <div class="headline">
                            <h3><i class="icon-material-outline-business-center"></i> Ofertas Incritas</h3>
                        </div>

                        <div class="content">
                            <ul class="dashboard-box-list">
                                <li>
                                    <!-- Job Listing -->
                                    <div class="job-listing">

                                        <!-- Job Listing Details -->
                                        <div class="job-listing-details">

                                            <!-- Logo -->
                                            <a href="#" class="job-listing-company-logo">
                                                <img src="{{ asset('images/company-logo-04.png') }}" alt="">
                                            </a>

                                            <!-- Details -->
                                            <div class="job-listing-description">
                                                <h3 class="job-listing-title"><a href="#">Icono Software</a></h3>

                                                <!-- Job Listing Footer -->
                                                <div class="job-listing-footer">
                                                    <ul>
                                                        <li><i class="icon-material-outline-business"></i> Programador</li>
                                                        <li><i class="icon-material-outline-location-on"></i> Cordoba,
                                                            España
                                                        </li>
                                                        <li><i class="icon-material-outline-business-center"></i> Jornada
                                                            Completa
                                                        </li>
                                                        <li><i class="icon-material-outline-access-time"></i> 2 dias atrás
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Buttons -->
                                    <div class="buttons-to-right">
                                        <a href="#" class="button ripple-effect ico" title="Ver"
                                            data-tippy-placement="left"><i class="icon-material-outline-search "></i></a>
                                        <a href="#" class="button red ripple-effect ico" title="Eliminar"
                                            data-tippy-placement="right"><i class="icon-feather-trash-2"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Row / End -->

            <div class="dashboard-footer-spacer"></div>
            <div class="small-footer margin-top-15">
                <div class="small-footer-copyrights">
                    © 2021 <strong>Hostemy</strong>. Todos los derechos reservados.
                </div>
                <ul class="footer-social-links">
                    <li>
                        <a href="#" title="Facebook" data-tippy-placement="top">
                            <i class="icon-brand-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" title="Twitter" data-tippy-placement="top">
                            <i class="icon-brand-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" title="Google Plus" data-tippy-placement="top">
                            <i class="icon-brand-google-plus-g"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" title="LinkedIn" data-tippy-placement="top">
                            <i class="icon-brand-linkedin-in"></i>
                        </a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection


@section('menu')
    <script>
        $('#ofertas').addClass('active')

    </script>
@endsection
