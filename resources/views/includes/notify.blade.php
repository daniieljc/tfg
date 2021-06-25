    @if (Session::has('success'))
        <div class="notification success closeable">
            <p>{!! session('success') !!}</p>
            <a class="close"></a>
        </div>
    @endif

    @if (Session::has('error'))
        <div class="notification error closeable">
            <p>{!! session('error') !!}</p>
            <a class="close"></a>
        </div>
    @endif
