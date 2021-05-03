@extends('layouts.app')

@section('content')
    <div class="intro-banner dark-overlay big-padding">

        <!-- Transparent Header Spacer -->
        <div class="transparent-header-spacer"></div>

        <div class="container">

            <!-- Intro Headline -->
            <div class="row">
                <div class="col-md-12">
                    <div class="banner-headline-alt">
                        <h3>No solo sueñes, hazlo</h3>
                        <span>Encuentre los mejores trabajos</span>
                    </div>
                </div>
            </div>

            <!-- Search Bar -->
            <div class="row">
                <div class="col-md-12">
                    <div class="intro-banner-search-form margin-top-95">

                        <!-- Search Field -->
                        <div class="intro-search-field with-autocomplete">
                            <label for="autocomplete-input" class="field-title ripple-effect"
                                style="background-color: #fff; color: black">¿Donde?</label>
                            <div class="input-with-icon">
                                <input id="autocomplete-input" type="text" placeholder="Trabajo Online">
                                <i class="icon-material-outline-location-on"></i>
                            </div>
                        </div>

                        <!-- Search Field -->
                        <div class="intro-search-field">
                            <label for="intro-keywords" class="field-title ripple-effect"
                                style="background-color: #fff; color: black">¿Qué trabajo
                                quieres?</label>
                            <input id="intro-keywords" type="text" placeholder="Titulo del trabajo o Keywords">
                        </div>

                        <!-- Button -->
                        <div class="intro-search-button">
                            <button class="button ripple-effect" onclick="window.location.href=''">Buscar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="intro-stats margin-top-45 hide-under-992px">
                        <li>
                            <strong class="counter">1,586</strong>
                            <span>Trabajos Publicados</span>
                        </li>
                        <li>
                            <strong class="counter">3,543</strong>
                            <span>Empresas Registradas</span>
                        </li>
                        <li>
                            <strong class="counter">1,232</strong>
                            <span>Trabajadores Registrados</span>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

    <!-- Content
            ================================================== -->
    <!-- Features Jobs -->
    <div class="section padding-top-65 padding-bottom-75">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">

                    <!-- Section Headline -->
                    <div class="section-headline margin-top-0 margin-bottom-35">
                        <h3>Trabajos Destacados</h3>
                        <a href="" class="headline-link">Ver todos</a>
                    </div>

                    <!-- Jobs Container -->
                    <div class="listings-container compact-list-layout margin-top-35">

                        <!-- Job Listing -->
                        <a href="" class="job-listing with-apply-button">

                            <!-- Job Listing Details -->
                            <div class="job-listing-details">

                                <!-- Logo -->
                                <div class="job-listing-company-logo">
                                    <img src="images/company-logo-01.png" alt="">
                                </div>

                                <!-- Details -->
                                <div class="job-listing-description">
                                    <h3 class="job-listing-title">Bilingual Event Support Specialist</h3>

                                    <!-- Job Listing Footer -->
                                    <div class="job-listing-footer">
                                        <ul>
                                            <li><i class="icon-material-outline-business"></i> Hexagon <div
                                                    class="verified-badge" title="Verified Employer"
                                                    data-tippy-placement="top"></div>
                                            </li>
                                            <li><i class="icon-material-outline-location-on"></i> San Francissco
                                            </li>
                                            <li><i class="icon-material-outline-business-center"></i> Full Time</li>
                                            <li><i class="icon-material-outline-access-time"></i> 2 days ago</li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Apply Button -->
                                <span class="list-apply-button ripple-effect">Apply Now</span>
                            </div>
                        </a>


                        <!-- Job Listing -->
                        <a href="" class="job-listing with-apply-button">

                            <!-- Job Listing Details -->
                            <div class="job-listing-details">

                                <!-- Logo -->
                                <div class="job-listing-company-logo">
                                    <img src="images/company-logo-05.png" alt="">
                                </div>

                                <!-- Details -->
                                <div class="job-listing-description">
                                    <h3 class="job-listing-title">Competition Law Officer</h3>

                                    <!-- Job Listing Footer -->
                                    <div class="job-listing-footer">
                                        <ul>
                                            <li><i class="icon-material-outline-business"></i> Laxo</li>
                                            <li><i class="icon-material-outline-location-on"></i> San Francissco
                                            </li>
                                            <li><i class="icon-material-outline-business-center"></i> Full Time</li>
                                            <li><i class="icon-material-outline-access-time"></i> 2 days ago</li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Apply Button -->
                                <span class="list-apply-button ripple-effect">Apply Now</span>
                            </div>
                        </a>
                        <!-- Job Listing -->
                        <a href="" class="job-listing with-apply-button">

                            <!-- Job Listing Details -->
                            <div class="job-listing-details">

                                <!-- Logo -->
                                <div class="job-listing-company-logo">
                                    <img src="images/company-logo-02.png" alt="">
                                </div>

                                <!-- Details -->
                                <div class="job-listing-description">
                                    <h3 class="job-listing-title">Barista and Cashier</h3>

                                    <!-- Job Listing Footer -->
                                    <div class="job-listing-footer">
                                        <ul>
                                            <li><i class="icon-material-outline-business"></i> Coffee</li>
                                            <li><i class="icon-material-outline-location-on"></i> San Francissco
                                            </li>
                                            <li><i class="icon-material-outline-business-center"></i> Full Time</li>
                                            <li><i class="icon-material-outline-access-time"></i> 2 days ago</li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Apply Button -->
                                <span class="list-apply-button ripple-effect">Apply Now</span>
                            </div>
                        </a>


                        <!-- Job Listing -->
                        <a href="" class="job-listing with-apply-button">

                            <!-- Job Listing Details -->
                            <div class="job-listing-details">

                                <!-- Logo -->
                                <div class="job-listing-company-logo">
                                    <img src="images/company-logo-03.png" alt="">
                                </div>

                                <!-- Details -->
                                <div class="job-listing-description">
                                    <h3 class="job-listing-title">Restaurant General Manager</h3>

                                    <!-- Job Listing Footer -->
                                    <div class="job-listing-footer">
                                        <ul>
                                            <li><i class="icon-material-outline-business"></i> King <div
                                                    class="verified-badge" title="Verified Employer"
                                                    data-tippy-placement="top"></div>
                                            </li>
                                            <li><i class="icon-material-outline-location-on"></i> San Francissco
                                            </li>
                                            <li><i class="icon-material-outline-business-center"></i> Full Time</li>
                                            <li><i class="icon-material-outline-access-time"></i> 2 days ago</li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Apply Button -->
                                <span class="list-apply-button ripple-effect">Apply Now</span>
                            </div>
                        </a>

                        <!-- Job Listing -->
                        <a href="" class="job-listing with-apply-button">

                            <!-- Job Listing Details -->
                            <div class="job-listing-details">

                                <!-- Logo -->
                                <div class="job-listing-company-logo">
                                    <img src="images/company-logo-05.png" alt="">
                                </div>

                                <!-- Details -->
                                <div class="job-listing-description">
                                    <h3 class="job-listing-title">International Marketing Coordinator</h3>

                                    <!-- Job Listing Footer -->
                                    <div class="job-listing-footer">
                                        <ul>
                                            <li><i class="icon-material-outline-business"></i> Skyist</li>
                                            <li><i class="icon-material-outline-location-on"></i> San Francissco
                                            </li>
                                            <li><i class="icon-material-outline-business-center"></i> Full Time</li>
                                            <li><i class="icon-material-outline-access-time"></i> 2 days ago</li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Apply Button -->
                                <span class="list-apply-button ripple-effect">Apply Now</span>
                            </div>
                        </a>

                    </div>
                    <!-- Jobs Container / End -->

                </div>
            </div>
        </div>
    </div>
    <!-- Featured Jobs / End -->

    <!-- Recent Blog Posts -->
    <div class="section padding-top-65 padding-bottom-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">

                    <!-- Section Headline -->
                    <div class="section-headline margin-top-0 margin-bottom-45">
                        <h3>Últimas Noticias</h3>
                        <a href="" class="headline-link">Ver todas</a>
                    </div>

                    <div class="row">
                        <!-- Blog Post Item -->
                        <div class="col-xl-4">
                            <a href="" class="blog-compact-item-container">
                                <div class="blog-compact-item">
                                    <img src="images/blog-01a.jpg" alt="">
                                    <span class="blog-item-tag">Tips</span>
                                    <div class="blog-compact-item-content">
                                        <ul class="blog-post-tags">
                                            <li>22 July 2018</li>
                                        </ul>
                                        <h3>16 Ridiculously Easy Ways to Find & Keep a Remote Job</h3>
                                        <p>Distinctively reengineer revolutionary meta-services and premium
                                            architectures intuitive opportunities.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- Blog post Item / End -->

                        <!-- Blog Post Item -->
                        <div class="col-xl-4">
                            <a href="" class="blog-compact-item-container">
                                <div class="blog-compact-item">
                                    <img src="images/blog-02a.jpg" alt="">
                                    <span class="blog-item-tag">Recruiting</span>
                                    <div class="blog-compact-item-content">
                                        <ul class="blog-post-tags">
                                            <li>29 June 2018</li>
                                        </ul>
                                        <h3>How to "Woo" a Recruiter and Land Your Dream Job</h3>
                                        <p>Appropriately empower dynamic leadership skills after business portals.
                                            Globally myocardinate interactive.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- Blog post Item / End -->

                        <!-- Blog Post Item -->
                        <div class="col-xl-4">
                            <a href="" class="blog-compact-item-container">
                                <div class="blog-compact-item">
                                    <img src="images/blog-03a.jpg" alt="">
                                    <span class="blog-item-tag">Marketing</span>
                                    <div class="blog-compact-item-content">
                                        <ul class="blog-post-tags">
                                            <li>10 June 2018</li>
                                        </ul>
                                        <h3>11 Tips to Help You Get New Clients Through Cold Calling</h3>
                                        <p>Compellingly embrace empowered e-business after user friendly
                                            intellectual capital. Interactively front-end.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- Blog post Item / End -->
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- Recent Blog Posts / End -->

    <div class="section border-top padding-top-45 padding-bottom-45">
        <!-- Logo Carousel -->
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <!-- Carousel -->
                    <div class="col-md-12">
                        <div class="logo-carousel">

                            <div class="carousel-item">
                                <a href="https://hostemy.com/" target="_blank" title="https://hostemy.com/"><img
                                        src="images/dark.png" alt=""></a>
                            </div>

                            <div class="carousel-item">
                                <a href="https://hostemy.com/" target="_blank" title="https://hostemy.com/"><img
                                        src="images/dark.png" alt=""></a>
                            </div>

                            <div class="carousel-item">
                                <a href="https://hostemy.com/" target="_blank" title="https://hostemy.com/"><img
                                        src="images/dark.png" alt=""></a>
                            </div>

                            <div class="carousel-item">
                                <a href="https://hostemy.com/" target="_blank" title="https://hostemy.com/"><img
                                        src="images/dark.png" alt=""></a>
                            </div>

                            <div class="carousel-item">
                                <a href="https://hostemy.com/" target="_blank" title="https://hostemy.com/"><img
                                        src="images/dark.png" alt=""></a>
                            </div>

                            <div class="carousel-item">
                                <a href="https://hostemy.com/" target="_blank" title="https://hostemy.com/"><img
                                        src="images/dark.png" alt=""></a>
                            </div>

                        </div>
                    </div>
                    <!-- Carousel / End -->
                </div>
            </div>
        </div>
    </div>
@endsection
