@extends('home.app')

@section('content')
    <div class="intro-banner" data-background-image="images/home-background.jpg">
        <div class="container">

            <!-- Intro Headline -->
            <div class="row">
                <div class="col-md-12">
                    <div class="banner-headline">
                        <h3>
                            <strong>JobSierra.</strong>
                            <br>
                            <span>{!! __('home.titulo') !!}</span>
                        </h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <ul class="intro-stats margin-top-45 hide-under-992px">
                        <li>
                            <strong class="counter">{{ $oferT }}</strong>
                            <span>{{ __('home.trabajosP') }}</span>
                        </li>
                        <li>
                            <strong class="counter">{{ $userT }}</strong>
                            <span>{{ __('home.UsuariosR') }}</span>
                        </li>
                        <li>
                            <strong class="counter">{{ $businessT }}</strong>
                            <span>{{ __('home.EmpresasR') }}</span>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="background-image-container" style="background-image: url(&quot;images/home-background.jpg&quot;);">
        </div>
    </div>
    <div class="section margin-top-50 margin-bottom-30 dark-overlay">
        <div class="container">
            @if (Auth::check())
                @if (!Auth::user()->status)
                    <div class="notification error closeable">
                        <p>Su cuenta no está activada</p>
                        <a class="close"></a>
                    </div>
                @endif

                @if (!Auth::user()->email_verified_at)
                    <div class="notification error closeable">
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <p>Email pendiente de verificación.
                                <button type="submit" style="color: #172B4D;">Reembiar
                                    Correo</button>
                            </p>
                        </form>
                        <a class="close"></a>
                    </div>
                @endif
            @endif

            <div class="row">
                @foreach ($oferta_categoria as $item)
                    <div class="col-xl-3 col-md-6">
                        <!-- Photo Box -->
                        <a href="{{ route('home.ofertas') }}?category={{ $item->id }}" class="photo-box small"
                            data-background-image="{{ asset('images/home-background.jpg') }}">
                            <div class="photo-box-content">
                                <h3>{{ ucfirst($item->nombre) }}</h3>
                                <span>{{ $item->total }}</span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="section padding-top-65 padding-bottom-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section-headline margin-top-0 margin-bottom-45">
                        <h3>{{ __('home.index.lastNews') }}</h3>
                        <a href="{{ route('home.noticias') }}"
                            class="headline-link">{{ __('home.index.showall') }}</a>
                    </div>

                    <div class="row">
                        @foreach ($articulos as $item)
                            <div class="col-xl-4">
                                <a href="{{ route('home.noticias.i', ['id' => $item->idA]) }}"
                                    class="blog-compact-item-container">
                                    <div class="blog-compact-item">
                                        @if ($item->portada)
                                            <img src="{{ route('storage.portada', ['img' => $item->portada]) }}" alt="">
                                        @else
                                            <img src="{{ asset('images/blog-01a.jpg') }}" alt="">
                                        @endif
                                        <span class="blog-item-tag">{{ $item->nombreCategoria }}</span>
                                        <div class="blog-compact-item-content">
                                            <ul class="blog-post-tags">
                                                <li>{{ Date::parse($item->created_at)->format('j \\' . __('date.de') . ' F \\' . __('date.de') . ' Y') }}
                                                </li>

                                            </ul>
                                            <h3>{{ $item->titulo }}</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
