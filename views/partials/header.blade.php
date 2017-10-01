@include('partials.header.topbar')

<header id="header" class="tt-nav nav-border-bottom">
    <div class="header-sticky light-header ">
        <div class="container">
            @include('partials.header.search')
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
{!! Theme::script("js/vendors/menuzord.js") !!}
{!! Theme::script("js/vendors/equalheight.js") !!}
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