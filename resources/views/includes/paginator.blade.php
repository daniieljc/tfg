@if ($paginator->lastPage() > 1)
    <div class="row">
        <div class="col-md-12">
            <div class="pagination-container margin-top-10 margin-bottom-20">
                <nav class="pagination">
                    <ul>
                        <li class="pagination-arrow"><a href="{{ $paginator->url(1) }}" class="ripple-effect"><i
                                    class="icon-material-outline-keyboard-arrow-left"></i></a></li>

                        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                            <li><a href="{{ $paginator->url($i) }}"
                                    class="{{ $paginator->currentPage() == $i ? 'current-page' : '' }} ripple-effect">{{ $i }}</a>
                            </li>
                        @endfor

                        <li class="pagination-arrow"><a href{{ $paginator->url($paginator->currentPage() + 1) }}"
                                class="ripple-effect"><i class="icon-material-outline-keyboard-arrow-right"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endif
