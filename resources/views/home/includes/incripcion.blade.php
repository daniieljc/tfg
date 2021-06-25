@if (Auth::user()->role != 3 && Auth::user()->role != 2)
    <div id="small-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs">
        <div class="sign-in-form">
            <div class="popup-tabs-container">
                <div class="popup-tab-content" id="tab">
                    <div class="welcome-text">
                        <h3>Inscribirse a la oferta</h3>
                    </div>
                    @if (!$user->ficheros)

                        <div class="notification error">
                            <p><a href="{{ route('candidate.cuenta') }}"> Debe subir un CV a su perfil</a></p>
                        </div>
                    @endif
                    @if ($user->ficheros)

                        <form action="{{ route('home.ofertas.inscribir', ['id' => $oferta->id]) }}" method="POST"
                            enctype="multipart/form-data" id="inscribir">
                            @csrf

                            <div class="submit-field margin-top-30">
                                <h5>Carta de presentación</h5>
                                <textarea type="text" class="with-border" name="presentacion"></textarea>
                            </div>

                            <p id="error"></p>
                            <a id="submit" id="añadirCategoria"
                                class="button full-width button-sliding-icon ripple-effect"
                                style="color: white">Inscribir <i class="icon-material-outline-arrow-right-alt"></i></a>

                        </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endif
