@extends('candidate.app')

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
                        <span>{{ __('home.candidate.ofertasA') }}</span>
                        <h4>{{ $tOferta }}</h4>
                    </div>
                    <div class="fun-fact-icon"><i class="icon-material-outline-gavel"></i></div>
                </div>
                <div class="fun-fact" data-fun-fact-color="#b81b7f">
                    <div class="fun-fact-text">
                        <span>{{ __('home.candidate.ofertasP') }}</span>
                        <h4>{{ $tOferta1 }}</h4>
                    </div>
                    <div class="fun-fact-icon"><i class="icon-material-outline-business-center"></i></div>
                </div>
                <div class="fun-fact" data-fun-fact-color="#efa80f">
                    <div class="fun-fact-text">
                        <span>{{ __('home.candidate.ofertasC') }}</span>
                        <h4>{{ $tOferta2 }}</h4>
                    </div>
                    <div class="fun-fact-icon"><i class="icon-material-outline-rate-review"></i></div>
                </div>
            </div>

            <!-- Row -->
            <div class="row">
                <div class="col-xl-6">
                    <div class="dashboard-box">
                        <div class="headline">
                            <h3><i class="icon-material-outline-assignment"></i> {{ __('home.menu.ofertas') }}</h3>
                        </div>
                        <div class="content">
                            <ul class="dashboard-box-list">
                                @foreach ($ofertas as $item)
                                    <li>
                                        <div class="invoice-list-item">
                                            <strong>{{ $item->nombre }} {{ $item->apellido }}</strong>
                                            <ul>
                                                @if ($item->status == 1)
                                                    <li><span
                                                            class="note-priority medium">{{ __('home.candidate.candidato1') }}</span>
                                                    </li>
                                                @endif
                                                @if ($item->status == 2)
                                                    <li><span class="note-priority"
                                                            style="background-color: #264096">{{ __('home.candidate.candidato2') }}</span>
                                                    </li>
                                                @endif
                                                @if ($item->status == 3)
                                                    <li><span
                                                            class="note-priority green">{{ __('home.candidate.candidato3') }}</span>
                                                    </li>
                                                @endif
                                                @if ($item->status == 4)
                                                    <li><span
                                                            class="note-priority red">{{ __('home.candidate.candidato4') }}</span>
                                                    </li>
                                                @endif

                                                <li> {{ Date::parse($item->created_at)->format('j \\' . __('date.de') . ' F \\' . __('date.de') . ' Y') }}
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- Buttons -->
                                        <div class="buttons-to-right">
                                            <a href="{{ route('home.ofertas.i', ['id' => $item->id]) }}"
                                                class="button">{{ __('home.candidate.verOferta') }}</a>
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
