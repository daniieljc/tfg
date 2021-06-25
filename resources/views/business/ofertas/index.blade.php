@extends('business.app')

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
                            <h3><i class="icon-material-outline-business-center"></i> {{ __('home.menu.ofertasP') }}</h3>
                        </div>

                        <div class="content">
                            <ul class="dashboard-box-list">
                                @foreach ($ofertas as $item)
                                    <li>
                                        <!-- Job Listing -->
                                        <div class="job-listing">

                                            <!-- Job Listing Details -->
                                            <div class="job-listing-details">

                                                <div class="job-listing-description">
                                                    <h3 class="job-listing-title"><a
                                                            href="{{ route('home.ofertas.i', ['id' => $item->id]) }}">{{ $item->titulo }}</a>
                                                    </h3>

                                                    <!-- Job Listing Footer -->
                                                    <div class="job-listing-footer">
                                                        <ul>
                                                            <li><i class="icon-material-outline-date-range"></i>
                                                                {{ __('home.menu.publicado') }}
                                                                {{ Date::parse($item->created_at)->format('j \\' . __('date.de') . ' F \\' . __('date.de') . ' Y') }}
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Buttons -->
                                        <div class="buttons-to-right always-visible">
                                            @foreach ($inscripciones as $item2)
                                                @if ($item2->idOferta == $item->id)
                                                    <a href="{{ route('business.oferta.candidatos', ['id' => $item->id]) }}"
                                                        class="button ripple-effect"><i
                                                            class="icon-material-outline-supervisor-account"></i>
                                                        {{ __('home.menu.gestionar') }} <span
                                                            class="button-info">{{ $item2->total }}</span></a>
                                                @endif
                                            @endforeach

                                            <a href="{{ route('business.oferta.editar', ['id' => $item->id]) }}"
                                                class="button gray ripple-effect ico" data-tippy-placement="top"
                                                data-tippy="" data-original-title="Editar"><i
                                                    class="icon-feather-edit"></i></a>
                                            <a href="{{ route('business.oferta.eliminar', ['id' => $item->id]) }}"
                                                class="button gray ripple-effect ico" data-tippy-placement="top"
                                                data-tippy="" data-original-title="Eliminar"><i
                                                    class="icon-feather-trash-2"></i></a>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Row / End -->

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
        $('#ofertas').addClass('active active-submenu')

    </script>
@endsection
