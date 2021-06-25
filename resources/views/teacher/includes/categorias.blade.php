<div id="small-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs">
    <div class="sign-in-form">
        <div class="popup-tabs-container">
            <div class="popup-tab-content" id="tab">
                <div class="welcome-text">
                    <h3>{{ __('home.categorias.añadir') }}</h3>
                </div>
                <input type="text" name="categoria" id="categoria" placeholder="{{ __('home.categorias.titulo')}}">
                <p id="error"></p>
                <a id="añadirCategoria" class="button full-width button-sliding-icon ripple-effect" form="send-pm"
                    style="color: white">{{ __('home.categorias.añadirB') }} <i class="icon-material-outline-arrow-right-alt"></i></a>
            </div>
        </div>
    </div>
</div>

@section('script')
    <script>
        $('#categoria').on('input', function() {
            $('#categoria').val().length != 0 ? $('#error').text('') : $('#error').text(
                'Debes introducir un nombre')
        })

        $('#añadirCategoria').on('click', function() {
            if ($('#categoria').val().length != 0) {
                $.ajax({
                        url: "{{ route('teacher.categoria.publicar') }}",
                        data: {
                            "categoria": $('#categoria').val(),
                            "_token": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        type: "POST",
                        dataType: "json",
                    })
                    .done(function(data, textStatus, jqXHR) {
                        location.reload()
                    })
            } else {
                $('#error').text('Debes introducir un nombre')
            }
        })

    </script>
@endsection
