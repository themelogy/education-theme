@extends('layouts.empty')

@section('content')
    <div class="section-intro">
        <div class="content">
            <img class="logo" src="{{ Theme::url('img/logos/logo3-white-vertical.svg') }}" alt="{{ setting('theme::company-name') }}" />
            <div class="year">{{ trans('themes::theme.intro.year') }}</div>
            <div class="language">
                <ul>
                    @foreach(LaravelLocalization::getSupportedLocales() as $locale => $supportedLocale)
                        <li><a href="{{ url($locale) }}"><span class="flag-icon flag-icon-{{ $locale == "en" ? "gb" : $locale }}"></span> {!! mb_strtoupper($supportedLocale['native']) !!}</a></li>
                    @endforeach
                </ul>
                <p class="white-text">
                    @foreach(LaravelLocalization::getSupportedLocales() as $locale => $supportedLocale)
                    {{ trans('themes::theme.intro.select language', [], $locale) }} @if(!$loop->last) / @endif
                    @endforeach
                </p>
            </div>
        </div>
    </div>

    <ul class="cb-slideshow">
        @foreach($page->present()->images(1280,854,'fit',50) as $image)
        <li><span style="background: url({{ $image }});">Intro {{ $loop->iteration }}</span></li>
        @endforeach
    </ul>

    <div class="overlay background bg-fixed"></div>

    <div id="preloader">
        <div class="preloader-position">
            <img src="{{ Theme::url('img/logos/logo3.svg') }}" height="100" alt="logo">
            <div class="progress">
                <div class="indeterminate"></div>
            </div>
        </div>
    </div>
@endsection

@push('css_inline')
<link href="https://fonts.googleapis.com/css?family=Pacifico&amp;subset=latin-ext" rel="stylesheet">
<style>
    .year {
        font-family: 'Pacifico', cursive;
        font-size: 2em;
        text-shadow: 0 0 10px rgba(0,0,0,0.33);
        color: #ffffff;
        margin-top: 20px;
        margin-bottom: -20px;
    }
</style>
@endpush