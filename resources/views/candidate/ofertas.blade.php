@extends('candidate.app')

@section('content')
    <div class="dashboard-content-container" data-simplebar>
        <div class="dashboard-content-inner">

            <!-- {{ __('home.menu.tablero') }} Headline -->
            <div class="dashboard-headline">
                <h3>{{ __('home.menu.ofertas') }}</h3>

                <!-- Breadcrumbs -->
                <nav id="breadcrumbs" class="dark">
                    <ul>
                        <li><a href="#">{{ __('home.menu.tablero') }}</a></li>
                        <li>{{ __('home.menu.ofertas') }}</li>
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
                            <h3><i class="icon-material-outline-business-center"></i> {{ __('home.candidate.inscritas') }}
                            </h3>
                        </div>

                        <div class="content">
                            <ul class="dashboard-box-list">
                                @foreach ($ofertas as $item)
                                    <li>
                                        <!-- Job Listing -->
                                        <div class="job-listing">

                                            <!-- Job Listing Details -->
                                            <div class="job-listing-details">

                                                <!-- Logo -->
                                                <a href="{{ route('home.ofertas.i', ['id' => $item->id]) }}"
                                                    class="job-listing-company-logo">
                                                    @if (Auth::user()->avatar)
                                                        <img src="{{ route('storage.avatar', ['img' => Auth::user()->avatar]) }}"
                                                            alt="">
                                                    @else
                                                        <img src="{{ asset('images/company-logo-05.png') }}" alt="">
                                                    @endif
                                                </a>

                                                <!-- Details -->
                                                <div class="job-listing-description">
                                                    <h3 class="job-listing-title">
                                                        <a
                                                            href="{{ route('home.ofertas.i', ['id' => $item->id]) }}">{{ $item->titulo }}</a>
                                                        @if ($item->status == 1)
                                                            <span
                                                                class="dashboard-status-button yellow">{{ __('home.candidate.candidato1') }}</span>
                                                        @endif

                                                        @if ($item->status == 2)
                                                            <span class="dashboard-status-button"
                                                                style="background: #d7e4f5; color: #264096;">
                                                                {{ __('home.candidate.candidato2') }}</span>
                                                        @endif

                                                        @if ($item->status == 3)
                                                            <span
                                                                class="dashboard-status-button green">{{ __('home.candidate.candidato3') }}</span>
                                                        @endif

                                                        @if ($item->status == 4)
                                                            <span
                                                                class="dashboard-status-button red">{{ __('home.candidate.candidato4') }}</span>
                                                        @endif

                                                    </h3>

                                                    <div class="job-listing-footer">
                                                        <ul>
                                                            <li><i class="icon-material-outline-business"></i>
                                                                {{ $item->nombre }}
                                                            </li>
                                                            <li><i class="icon-material-outline-location-on"></i>
                                                                {{ $item->localizacion }}
                                                            </li>
                                                            <li><i class="icon-material-outline-business-center"></i>
                                                                {{ $item->ofertaTipo }}
                                                            </li>
                                                            <li><i class="icon-material-outline-access-time"></i>
                                                                {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                                            </li>
                                                            @if ($item->status == 3)
                                                                <li>
                                                                    <i class="icon-material-outline-email"></i>
                                                                    <a
                                                                        href="mailto:{{ $item->email }}">{{ $item->email }}</a>
                                                                </li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Buttons -->
                                        <div class="buttons-to-right">
                                            <a href="{{ route('home.ofertas.i', ['id' => $item->id]) }}"
                                                class="button ripple-effect ico" title="{{ __('home.candidate.ver') }}"
                                                data-tippy-placement="left"><i
                                                    class="icon-material-outline-search "></i></a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Row / End -->

            @include('includes.paginator', ['paginator' => $ofertas])

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
        $('#ofertas').addClass('active')

    </script>
@endsection
