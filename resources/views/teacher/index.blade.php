@extends('teacher.app')

@section('content')
    <div class="dashboard-content-container" data-simplebar>

        <div class="dashboard-content-inner">

            <!-- Dashboard Headline -->
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
                        <span>{{ __('home.tablero.ofertas') }}</span>
                        <h4>{{ $oferta }}</h4>
                    </div>
                    <div class="fun-fact-icon"><i class="icon-material-outline-business-center"></i>
                    </div>
                </div>
                <div class="fun-fact" data-fun-fact-color="#b81b7f">
                    <div class="fun-fact-text">
                        <span>{{ __('home.tablero.usuarios') }}</span>
                        <h4>{{ $user }}</h4>
                    </div>
                    <div class="fun-fact-icon"><i class="icon-feather-users"></i></div>
                </div>
                <div class="fun-fact" data-fun-fact-color="#2a41e6">
                    <div class="fun-fact-text">
                        <span>{{ __('home.tablero.usuariosPe') }}</span>
                        <h4>{{ $userP }}</h4>
                    </div>
                    <div class="fun-fact-icon"><i class="icon-feather-user-x"></i></div>
                </div>
            </div>

            <!-- Row -->
            <div class="row">
                <div class="col-xl-6">
                    <div class="dashboard-box">
                        <div class="headline">
                            <h3><i class="icon-material-baseline-notifications-none"></i>
                                {{ __('home.tablero.notificaciones') }}</h3>
                        </div>
                        <div class="content">
                            <ul class="dashboard-box-list">
                                @foreach ($users as $item)
                                    <li>
                                        <span class="notification-icon"><i class="icon-material-outline-group"></i></span>
                                        <span class="notification-text">
                                            <strong>
                                                {{ $item->nombre }} {{ $item->apellido }}
                                            </strong>
                                            {{ __('home.tablero.registrado') }} |
                                            <strong>
                                                {{ Date::parse($item->created_at)->format('j \\' . __('date.de') . ' F \\' . __('date.de') . ' Y - H:i') }}
                                            </strong>
                                        </span>
                                        <!-- Buttons -->
                                        <div class="buttons-to-right">
                                            @if ($item->status)
                                                <span class="ripple-effect ico"
                                                    style="color: rgb(54, 189, 120)">Activado</span>
                                            @else
                                                <span class="ripple-effect ico"
                                                    style="color: rgb(189, 54, 54)">Desactivado</span>
                                            @endif

                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
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
