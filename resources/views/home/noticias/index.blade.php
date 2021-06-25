@extends('home.app')

@section('content')
    <div class="section gray">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <div class="section-headline margin-top-60 margin-bottom-35">
                        <h4>{{ __('home.notices.Recentnews') }}</h4>
                    </div>

                    @foreach ($noticias as $item)
                        @if ($item->status)
                            <a href="{{ route('home.noticias.i', ['id' => $item->idA]) }}" class="blog-post">
                                @if ($item->portada)
                                    <div class="blog-post-thumbnail">
                                        <div class="blog-post-thumbnail-inner">
                                            <span class="blog-item-tag">{{ $item->nombre }}</span>
                                            <img src="{{ route('storage.portada', ['img' => $item->portada]) }}" alt="">
                                        </div>
                                    </div>
                                @endif
                                <div class="blog-post-content">
                                    <span
                                        class="blog-post-date">{{ Date::parse($item->created_at)->format('j \\' . __('date.de') . ' F \\' . __('date.de') . ' Y') }}</span>

                                    @if (!$item->portada)
                                        <span class="blog-post-date">{{ $item->nombre }}</span>
                                    @endif
                                    <h3>{{ $item->titulo }}</h3>
                                    <p>{!! Str::limit($item->descripcion, 20, '...') !!}</p>
                                </div>
                                <!-- Icon -->
                                <div class="entry-icon"></div>
                            </a>
                        @endif
                    @endforeach

                    <div class="clearfix"></div>

                    @include('includes.paginator', ['paginator' => $noticias])


                </div>

                <div class="col-xl-4 col-lg-4 content-left-offset">
                    <div class="sidebar-container margin-top-65">

                        <!-- Widget -->
                        <div class="sidebar-widget">

                            <h3>{{ __('home.notices.Interestingnews') }}</h3>
                            <ul class="widget-tabs">

                                @foreach ($noticiaR as $item)
                                    <li>
                                        <a href="{{ route('home.noticias.i', ['id' => $item->id]) }}"
                                            class="widget-content">
                                            @if ($item->portada)
                                                <img src="{{ route('storage.portada', ['img' => $item->portada]) }}"
                                                    alt="">
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

                        <div class="sidebar-widget">
                            <h3>{{ __('home.notices.Tags') }}</h3>
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

    </div>
    <!-- Section / End -->

@endsection
