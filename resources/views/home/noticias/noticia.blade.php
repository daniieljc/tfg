@extends('home.app')

@section('content')
    <div id="titlebar" class="gradient">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ __('home.notice.noticia') }}</h2>
                    <span>{{ $noticias->titulo }}</span>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs" class="dark">
                        <ul>
                            <li><a href="#">{{ __('home.notice.inicio') }}</a></li>
                            <li><a href="#">{{ __('home.notice.noticia') }}</a></li>
                            <li>{{ $noticias->titulo }}</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Post Content -->
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8">
                <div class="blog-post single-post">
                    @if ($noticias->portada)
                        <div class="blog-post-thumbnail">
                            <div class="blog-post-thumbnail-inner">
                                <img src="{{ route('storage.portada', ['img' => $noticias->portada]) }}" alt="">
                            </div>
                        </div>
                    @endif

                    <div class="blog-post-content">
                        <h3 class="margin-bottom-10">{{ $noticias->titulo }}</h3>

                        <div class="blog-post-info-list margin-bottom-20">
                            <a href="#"
                                class="blog-post-info">{{ Date::parse($noticias->created_at)->format('j \\' . __('date.de') . ' F \\' . __('date.de') . ' Y') }}</a>
                            <a href="#" class="blog-post-info">{{ $noticias->nombre }}</a>
                        </div>

                        {!! $noticias->descripcion !!}
                    </div>

                </div>
                <!-- Blog Post Content / End -->

                <!-- Blog Nav -->
                <ul id="posts-nav" class="margin-top-0 margin-bottom-40">
                    @if ($noticiaN)
                        <li class="next-post">
                            <a href="{{ route('home.noticias.i', ['id' => $noticiaN->id]) }}">
                                <span>{{ __('home.notice.siguiente') }}</span>
                                <strong>{{ $noticiaN->titulo }}</strong>
                            </a>
                        </li>
                    @endif

                    @if ($noticiaA)
                        <li class="prev-post">
                            <a href="{{ route('home.noticias.i', ['id' => $noticiaA->id]) }}">
                                <span>{{ __('home.notice.anterior') }}</span>
                                <strong>{{ $noticiaA->titulo }}</strong>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>

            <div class="col-xl-4 col-lg-4 content-left-offset">
                <div class="sidebar-container">

                    <!-- Widget -->
                    <div class="sidebar-widget">
                        <h3>{{ __('home.notice.Interestingnews') }}</h3>
                        <ul class="widget-tabs">

                            @foreach ($noticiaR as $item)
                                <li>
                                    <a href="{{ route('home.noticias.i', ['id' => $item->id]) }}" class="widget-content">
                                        @if ($item->portada)
                                            <img src="{{ route('storage.portada', ['img' => $item->portada]) }}" alt="">
                                        @endif

                                        <div class="widget-text">
                                            <h5>{{ $item->titulo }}</h5>
                                            <span>{{ Date::parse($item->created_at)->format('j \\' . __('date.de') . ' F \\' . __('date.de') . ' Y') }}</span>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                    <!-- Widget / End-->

                    <!-- Widget -->
                    <div class="sidebar-widget">
                        <h3>{{ __('home.notice.Tags') }}</h3>
                        <div class="task-tags">
                            @foreach ($categorias as $item)
                                <a
                                    href="{{ route('home.noticias') }}?categoria={{ $item->id }}"><span>{{ $item->nombre }}</span></a>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <!-- Spacer -->
    <div class="padding-top-40"></div>
    <!-- Spacer -->

@endsection
