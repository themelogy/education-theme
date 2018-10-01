@php
    if(isset($page)) {
        if(!$coverImage = $page->present()->coverImage(1280,368,'fit',80)) {
            $coverImage = Theme::url('img/slides/slider-2.jpg');
        }
    }
    $title_show = !empty($title_show) ? true : false;
    $uri = collect(array_slice(Request::segments(), 1))->implode('/');
@endphp
@if(isset($page))
        <section class="page-title page-title-bg-overlay dark-4 p-top-30 p-bot-20 md-p-top-150 md-p-bot-100"
                 style="background: url({{ $coverImage }});">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-md-offset-3">
                        <div class="title-bg p-lft-rgt-25 p-top-30 p-bot-10">
                            @section('yedek')
                                <h2 class="title white-text font-16 m-bot-5 border-bottom-1 p-bot-10">
                                    @if(isset($page->settings->slogan->{locale()}))
                                        {{ $page->settings->slogan->{locale()} }}
                                    @elseif($subTitles = $page->present()->subTitles($title_show))
                                        {{ $subTitles }}
                                    @else
                                        {{ $page->parent->title or null }}&nbsp;
                                    @endif
                                </h2>
                            @endsection
                            <div class="section-breadcrumb title white-text font-16 m-bot-5 border-bottom-1 p-bot-20">
                                @if($breadcrumb)
                                    {!! Breadcrumbs::renderIfExists($breadcrumb) !!}
                                @endif
                            </div>
                            <h1 class="title white-text p-top-5 font-22">{{ $slot }}</h1>
                            <span class="overlay background"></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @elseif($page = Page::findBySlug($uri, locale()))
    @php
        if(isset($page)) {
            if(!$coverImage = $page->present()->coverImage(1280,368,'fit',80)) {
                $coverImage = Theme::url('img/slides/slider-2.jpg');
            }
        }
    @endphp
    <section class="page-title page-title-bg-overlay dark-4 p-top-30 p-bot-20 md-p-top-150 md-p-bot-100"
             style="background: url({{ $coverImage }});">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-md-offset-3">
                    <div class="title-bg p-lft-rgt-25 p-top-30 p-bot-10">
                        <h2 class="title white-text font-16 m-bot-5 border-bottom-1 p-bot-10">
                            @if(isset($page->settings->slogan->{locale()}))
                                {{ $page->settings->slogan->{locale()} }}
                            @elseif($subTitles = $page->present()->subTitles($title_show))
                                {{ $subTitles }}
                            @else
                                {{ $page->parent->title or $page->title }}&nbsp;
                            @endif
                        </h2>
                        <h1 class="title white-text p-top-5 font-22">{{ $slot }}</h1>
                        @if($breadcrumb)
                            {!! Breadcrumbs::renderIfExists($breadcrumb) !!}
                        @endif
                        <span class="overlay background"></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @else
    <section class="page-title page-title-bg overlay dark-4 p-top-bot-30 md-p-top-70 md-p-bot-70" style="background: url({{ Theme::url('img/slides/slider-2.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="white-text text-uppercase font-20">{{ $slot }}</h1>
                    @if($breadcrumb)
                        {!! Breadcrumbs::renderIfExists($breadcrumb) !!}
                    @endif
                </div>
            </div>
        </div>
    </section>
@endif

@if(isset($page->settings->title_bg_color))
@push('css_inline')
<style>
    .page-title.page-title-bg-overlay .title-bg .overlay.background::before {
        background: {{ $page->settings->title_bg_color or null }} !important;
    }
    .page-title.page-title-bg-overlay .title-bg .title {
        @if(isset($page->settings->title_font_size))
        font-size: {{ $page->settings->title_font_size }} !important;
        @endif
    }
</style>
@endpush
@endif