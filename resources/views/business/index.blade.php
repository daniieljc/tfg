@extends('business.app')

@section('content')
    <div class="dashboard-content-container" data-simplebar>

        <div class="dashboard-content-inner">

            <!-- Dahboard Headline -->
            <div class="dashboard-headline">
                <h3>{{ __('home.tablero.hola') }}, {{ Auth::user()->nombre }}!</h3>
                <span>{{ __('home.tablero.welcome') }}</span>

                <!-- Breadcrumbs -->
                <nav id="breadcrumbs" class="dark">
                    <ul>
                        <li>{{ __('home.menu.tablero') }}</li>
                    </ul>
                </nav>
            </div>

            <!-- Fun Facts Container -->
            <div class="fun-facts-container">
                <div class="fun-fact" data-fun-fact-color="#36bd78">
                    <div class="fun-fact-text">
                        <span>{{ __('home.empresa.Ofertaspublicadas') }}</span>
                        <h4>{{ $tOfertas }}</h4>
                    </div>
                    <div class="fun-fact-icon"><i class="icon-material-outline-business-center"></i>
                    </div>
                </div>
                <div class="fun-fact" data-fun-fact-color="#b81b7f">
                    <div class="fun-fact-text">
                        <span>{{ __('home.empresa.CandidatosI') }}</span>
                        <h4>{{ $tOfertasCandidatos }}</h4>
                    </div>
                    <div class="fun-fact-icon"><i class="icon-feather-users"></i></div>
                </div>
            </div>

            <div class="dashboard-footer-spacer"></div>
            <div class="small-footer margin-top-15">
                <div class="small-footer-copyrights">
                    © 2021 <strong>JobSierra</strong>. {{ __('home.derechos') }}
                </div>

                <div class="clearfix"></div>
            </div>
        </div>

    </div>

@endsection

@section('menu')
    <script>
        $('#dashboard').addClass('active')

    </script>
@endsection
