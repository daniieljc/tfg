<div id="small-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs">
    <div class="sign-in-form">
        <div class="popup-tabs-container">
            <div class="popup-tab-content" id="tab">
                <div class="welcome-text">
                    <h3>{{ __('home.menu.enviarMS') }}</h3>
                </div>
                <form action="{{ route('business.mensaje.enviar') }}" method="POST" enctype="multipart/form-data" id="inscribir">
                    @csrf
                    <div class="submit-field margin-top-30">
                        <textarea rows="7" type="text" class="with-border" name="mensaje"></textarea>
                    </div>

                    <input type="hidden" name="user" id="user">
                    <input type="hidden" name="oferta" id="oferta" value="{{ $oferta }}"">
                    
                    <p id="error"></p>
                    <a id="submit" id="añadirCategoria" class="button full-width button-sliding-icon ripple-effect"
                        style="color: white">{{ __('home.menu.enviarMSBut') }} <i class="icon-material-outline-arrow-right-alt"></i></a>
                </form>
            </div>
        </div>
    </div>
</div>
