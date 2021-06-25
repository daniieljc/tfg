
@component('mail::message')
# {{ __('email.mensaje.introduccion') }}

{{ Auth::user()->nombre }} {{ Auth::user()->apellidos }} {{ __('email.mensaje.titulo')}}

{{ $messageEmail }}

{{ __('email.mensaje.contactoMail')}} <a href="mailto:{{ Auth::user()->email }}">{{ Auth::user()->email }}</a> 

@component('mail::button', ['url' => route('home.ofertas.i', ['id' => $oferta])])
{{__('email.mensaje.btnOferta')}}
@endcomponent

{{ __('email.gracias') }}
@endcomponent
