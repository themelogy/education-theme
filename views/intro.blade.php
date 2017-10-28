@extends('layouts.empty')

@section('content')
    <div class="section-intro">
        <div class="content">
            <img class="logo" src="{{ Theme::url('img/logos/logo3-white-vertical.svg') }}" alt="Jale Tezer Eğitim Kurumları" />
            <div class="language">
                <ul>
                    @foreach(LaravelLocalization::getSupportedLocales() as $locale => $supportedLocale)
                        <li><a href="{{ url($locale) }}"><span class="flag-icon flag-icon-{{ $locale == "en" ? "gb" : $locale }}"></span> {!! mb_strtoupper($supportedLocale['native']) !!}</a></li>
                    @endforeach
                </ul>
                <p class="white-text">Please select language / Lütfen dil seçimi yapınız</p>
            </div>
        </div>
    </div>

    <ul class="cb-slideshow">
        <li><span style="background: url({{ Theme::url('img/intro/intro_1.jpg') }});">Intro 01</span></li>
        <li><span style="background: url({{ Theme::url('img/intro/intro_2.jpg') }});">Intro 02</span></li>
        <li><span style="background: url({{ Theme::url('img/intro/intro_3.jpg') }});">Intro 02</span></li>
        <li><span style="background: url({{ Theme::url('img/intro/intro_4.jpg') }});">Intro 02</span></li>
        <li><span style="background: url({{ Theme::url('img/intro/intro_5.jpg') }});">Intro 02</span></li>
        <li><span style="background: url({{ Theme::url('img/intro/intro_6.jpg') }});">Intro 02</span></li>
    </ul>

    <div class="overlay background bg-fixed"></div>

    <!-- Preloader -->
    <div id="preloader">
        <div class="preloader-position">
            <img src="{{ Theme::url('img/logos/logo3.svg') }}" height="100" alt="logo">
            <div class="progress">
                <div class="indeterminate"></div>
            </div>
        </div>
    </div>
    <!-- End Preloader -->
@endsection