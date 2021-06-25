@extends('home.app')

@section('content')
    <div id="titlebar" class="gradient">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ __('home.about.sobre mi') }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">

            <div class="col-xl-12">
                <div class="contact-location-info margin-bottom-50">
                    <div class="contact-address">
                        <ul>
                            <li class="contact-address-headline">Daniel Jiménez Cabello - {{ __('home.about.desarrollador') }}</li>
                            <li>IES Trasierra</li>
                            <li><a href="telf:664127000">664127000</a></li>
                            <li><a href="mailto:me@danieljimenez.info">me@danieljimenez.info</a></li>
                            <li>
                                <div class="freelancer-socials">
                                    <ul>
                                        <li><a href="https://twitter.com/Daniieljmc" title="Twitter"
                                                data-tippy-placement="top"><i class="icon-brand-twitter"></i></a></li>
                                        <li><a href="https://www.linkedin.com/in/daniel-jim%C3%A9nez-cabello/"
                                                title="Linkedin" data-tippy-placement="top"><i
                                                    class="icon-brand-linkedin"></i></a></li>
                                        <li><a href="https://github.com/Daniieljc" title="GitHub"
                                                data-tippy-placement="top"><i class="icon-brand-github"></i></a></li>

                                    </ul>
                                </div>
                            </li>
                        </ul>

                    </div>
                    <img src="https://danieljimenez.info/images/intro-image.jpg" alt="" width="25%">

                </div>
            </div>

            <div class="col-xl-8 col-lg-8 offset-xl-2 offset-lg-2">

                <section id="contact" class="margin-bottom-60">
                    <h3 class="headline margin-top-15 margin-bottom-35">{{ __('home.about.fraseFr') }}
                    </h3>

                    <form action="{{ route('home.about.enviarCorreo') }}" method="post" name="contactform"
                        id="contactform" autocomplete="on">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-with-icon-left">
                                    <input class="with-border" name="name" type="text" id="name" placeholder="{{ __('home.about.iName') }}"
                                        required="required" />
                                    <i class="icon-material-outline-account-circle"></i>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-with-icon-left">
                                    <input class="with-border" name="email" type="email" id="email"
                                        placeholder="{{ __('home.about.iMail') }}"
                                        pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$"
                                        required="required" />
                                    <i class="icon-material-outline-email"></i>
                                </div>
                            </div>
                        </div>

                        <div class="input-with-icon-left">
                            <input class="with-border" name="subject" type="text" id="subject" placeholder="{{ __('home.about.iSubject') }}"
                                required="required" />
                            <i class="icon-material-outline-assignment"></i>
                        </div>

                        <div>
                            <textarea class="with-border" name="comments" cols="40" rows="5" id="comments"
                                placeholder="{{ __('home.about.iContent') }}" spellcheck="true" required="required"></textarea>
                        </div>

                        <input type="submit" class="submit button margin-top-15" id="submit" value="{{ __('home.about.send') }}" />

                    </form>
                </section>

            </div>

        </div>
    </div>
@endsection
