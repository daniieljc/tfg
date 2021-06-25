
@component('mail::message')
# {{ __('email.mensaje.introduccion') }}

#
#
{{ $messageEmail }}
#
#

@component('mail::button', ['url' => route('home.ofertas.i', ['id' => $oferta])])
Ver Oferta
@endcomponent

{{ __('email.gracias') }}
@endcomponent
