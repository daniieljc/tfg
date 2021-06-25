@extends('business.app')

@section('content')
    <div class="dashboard-content-container" data-simplebar>
        <div class="dashboard-content-inner">

            <div class="dashboard-headline">
                <h3>{{ __('home.menu.candidatos') }}</h3>

                <!-- Breadcrumbs -->
                <nav id="breadcrumbs" class="dark">
                    <ul>
                        <li><a href="#">{{ __('home.menu.tablero') }}</a></li>
                        <li><a href="#">{{ __('home.menu.ofertas') }}</a></li>
                        <li>{{ __('home.menu.gestionar') }}</li>
                    </ul>
                </nav>
            </div>

            <!-- Row -->
            <div class="row">

                <!-- Dashboard Box -->
                <div class="col-xl-12">

                    @include('includes.notify')


                    <div class="dashboard-box margin-top-0">

                        <!-- Headline -->
                        <div class="headline">
                            <h3><i class="icon-material-outline-supervisor-account"></i> {{ $inscripciones }}
                                {{ __('home.menu.candidatos') }}
                            </h3>
                        </div>

                        <div class="content">
                            <ul class="dashboard-box-list">

                                @foreach ($candidatos as $item)
                                    @if ($item->status == 3)
                                        <li style="background-color: #e0f5d7 !important">
                                            <!-- Overview -->
                                            <div class="freelancer-overview manage-candidates">
                                                <div class="freelancer-overview-inner">

                                                    <div class="freelancer-avatar">
                                                        @if ($item->image_profile)
                                                            <img src="{{ route('storage.avatar', ['img' => $item->image_profile]) }}"
                                                                alt="" style="height: 75px !important">
                                                        @else
                                                            <img src=" {{ asset('images/user-avatar-placeholder.png') }}"
                                                                alt="">
                                                        @endif
                                                    </div>

                                                    <div class="freelancer-name">
                                                        <h4><a href="#">{{ $item->nombre }}</a></h4>
                                                        <span class="freelancer-detail-item"><a href="#"><i
                                                                    class="icon-feather-mail"></i>
                                                                <a
                                                                    href="mailto:{{ $item->email }}">{{ $item->email }}</a>
                                                            </a></span>

                                                        @if ($item->telf)
                                                            <span class="freelancer-detail-item"><i
                                                                    class="icon-feather-phone"></i>
                                                                <a href="telf:{{ $item->telf }}">{{ $item->telf }}</a>
                                                            </span>
                                                        @endif

                                                        <textarea rows="2" disabled>{{ $item->presentacion }}</textarea>

                                                        <div
                                                            class="buttons-to-right always-visible margin-top-15 margin-bottom-5">

                                                            @if ($item->ficheros)
                                                                <a href="{{ route('business.oferta.previewCV', ['id' => $item->idOferta, 'idUser' => $item->id]) }}"
                                                                    class="button ripple-effect idOferta" target="_blank"
                                                                    data-cv="{{ $item->idOferta }}"><i
                                                                        class="icon-feather-file-text"></i> Descargar CV</a>
                                                            @endif

                                                            <a href="#small-dialog"
                                                                class="popup-with-zoom-anim button dark ripple-effect"
                                                                id="mensajeM" data="{{ $item->id }}"><i
                                                                    class="icon-feather-mail"></i>
                                                                {{ __('home.menu.enviarMS') }}</a>

                                                            <a href="{{ route('business.oferta.seleccionarCandidatos', ['id' => $item->idOferta, 'idUser' => $item->id]) }}"
                                                                class="button gray ripple-effect ico"
                                                                title="{{ __('home.menu.selectC') }}"
                                                                data-tippy-placement="top"><i
                                                                    class="icon-material-outline-check"></i></a>

                                                            <a href="{{ route('business.oferta.descartarCandidatos', ['id' => $item->idOferta, 'idUser' => $item->id]) }}"
                                                                class="button gray ripple-effect ico"
                                                                title="{{ __('home.menu.eliminaC') }}"
                                                                data-tippy-placement="top"><i
                                                                    class="icon-feather-trash-2"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @else
                                        <li>
                                            <!-- Overview -->
                                            <div class="freelancer-overview manage-candidates">
                                                <div class="freelancer-overview-inner">

                                                    <!-- Avatar -->
                                                    <div class="freelancer-avatar">
                                                        @if ($item->image_profile)
                                                            <img src="{{ route('storage.avatar', ['img' => $item->image_profile]) }}"
                                                                alt="" style="height: 75px !important">
                                                        @else
                                                            <img src=" {{ asset('images/user-avatar-placeholder.png') }}"
                                                                alt="">
                                                        @endif
                                                    </div>

                                                    <div class="freelancer-name">
                                                        <h4><a href="#">{{ $item->nombre }}</a></h4>
                                                        <span class="freelancer-detail-item"><a href="#"><i
                                                                    class="icon-feather-mail"></i>
                                                                <a
                                                                    href="mailto:{{ $item->email }}">{{ $item->email }}</a>
                                                            </a></span>

                                                        @if ($item->telf)
                                                            <span class="freelancer-detail-item"><i
                                                                    class="icon-feather-phone"></i>
                                                                <a href="telf:{{ $item->telf }}">{{ $item->telf }}</a>
                                                            </span>
                                                        @endif

                                                        <textarea rows="2" disabled>{{ $item->presentacion }}</textarea>

                                                        <div
                                                            class="buttons-to-right always-visible margin-top-15 margin-bottom-5">

                                                            @if ($item->ficheros)
                                                                <a href="{{ route('business.oferta.previewCV', ['id' => $item->idOferta, 'idUser' => $item->id]) }}"
                                                                    class="button ripple-effect idOferta" target="_blank"
                                                                    data-cv="{{ $item->idOferta }}"><i
                                                                        class="icon-feather-file-text"></i>
                                                                    {{ __('home.menu.descargar') }}</a>
                                                            @endif

                                                            <a href="#small-dialog"
                                                                class="popup-with-zoom-anim button dark ripple-effect"
                                                                id="mensajeM" data="{{ $item->id }}"><i
                                                                    class="icon-feather-mail"></i>
                                                                {{ __('home.menu.enviarMS') }}</a>

                                                            <a href="{{ route('business.oferta.seleccionarCandidatos', ['id' => $item->idOferta, 'idUser' => $item->id]) }}"
                                                                class="button gray ripple-effect ico"
                                                                title="{{ __('home.menu.selectC') }}"
                                                                data-tippy-placement="top"><i
                                                                    class="icon-material-outline-check"></i></a>

                                                            <a href="{{ route('business.oferta.descartarCandidatos', ['id' => $item->idOferta, 'idUser' => $item->id]) }}"
                                                                class="button gray ripple-effect ico"
                                                                title="{{ __('home.menu.eliminaC') }}"
                                                                data-tippy-placement="top"><i
                                                                    class="icon-feather-trash-2"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endif

                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Row / End -->

            <!-- Footer -->
            <div class="dashboard-footer-spacer"></div>
            <div class="small-footer margin-top-15">
                <div class="small-footer-copyrights">
                    © 2018 <strong>JobSierra</strong>. {{ __('home.derechos') }}
                </div>
                <div class="clearfix"></div>
            </div>
            <!-- Footer / End -->

        </div>
    </div>

    @include('business.includes.message')
@endsection

@section('menu')
    <script>
        $('#ofertas').addClass('active')

    </script>
@endsection

@section('script')
    <script>
        $('#submit').on('click', function() {
            $('#inscribir').submit()
        })

        $('.popup-with-zoom-anim').on('click', function() {
            $('#user').val($(this).attr('data'))
            console.log($(this).attr('data'))
        })

    </script>
@endsection
