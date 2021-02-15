<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MLS4FWB"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

@include('partials.header.topbar')

<header id="header" class="tt-nav nav-border-bottom">
    <div class="header-sticky light-header ">
        <div class="container">
            {{-- @include('partials.header.search') --}}
            <div id="materialize-menu" class="menuzord">
                <a href="{{ url(locale()) }}" class="logo-brand">
                    <img src="{{ Theme::url('img/logos/logo3.svg') }}" alt="{{ setting('theme::company-name') }}">
                </a>
                {!! Menu::render('header', \Themes\Education\Presenter\HeaderMenuPresenter::class) !!}
            </div>
        </div>
    </div>
</header>

@push('scripts')
{!! Theme::script("plugins/menuzord.js") !!}
{!! Theme::script("plugins/equalheight.js") !!}
@endpush

@if(LaravelLocalization::getCurrentLocale()=="en")
@push('css_inline')
<style>
    .menuzord-menu>li>a {
        font-size: 12px;
        letter-spacing: -0.03em;
    }
</style>
@endpush
@endif