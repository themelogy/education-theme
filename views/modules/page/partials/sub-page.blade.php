@php
    $list_per_page  = $page->settings->list_per_page ?? 6;
    $list_grid 		= $page->settings->list_grid ?? 6;
    $list_type 		= $page->settings->list_type ?? 'grid';
    $list_pages     = $page->children()->paginate($list_per_page,['*'],'sayfa');
@endphp

<div class="content md-padding-40 text-justify default-blog grid-blog grid-page">
    @if($image = $page->present()->firstImage(900,null,'resize',50))
        <div class="row">
            <div class="col-md-12 m-bot-20">
                <img src="{{ $image }}" class="img-responsive" alt="{{ $page->title }}">
            </div>
        </div>
    @endif
    <div class="row">
        @foreach($list_pages as $child)
            @if($list_type == 'grid')
                <div class="col-md-{{ $list_grid }}">
                    <article class="post-wrapper">
                        <div class="thumb-wrapper">
                            <img src="{{ $child->present()->firstImage(330,200,'fit',50) }}" class="img-responsive" alt="{{ $child->title }}">
                            <div class="entry-header">
                                <h2 class="entry-title"><a href="{{ $child->url }}">{{ $child->title }}</a></h2>
                            </div>
                        </div>
                        <div class="entry-content">
                            <h2 class="entry-title"><a href="{{ $child->url }}">{{ $child->title }}</a></h2>
                            <p>{!! Str::words(strip_tags(\Patchwork\Utf8::toAscii($child->body)), 15) !!}</p>
                        </div>
                    </article>
                </div>
            @else
                <div class="col-md-12">
                    <article class="post-wrapper">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ $child->present()->firstImage(330,200,'fit',50) }}" class="img-responsive" alt="{{ $child->title }}">
                            </div>
                            <div class="col-md-8">
                                <div class="entry-content p-rgt-10">
                                    <h2 class="entry-title p-bot-10"><a href="{{ $child->url }}">{{ $child->title }}</a></h2>
                                    <p>{!! Str::words(strip_tags(\Patchwork\Utf8::toAscii($child->body)), 15) !!}</p>
                                    <a class="browser-default btn btn-primary btn-xs" href="{{ $child->url }}">Devamını oku...</a>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            @endif
        @endforeach
    </div>
    {!! $list_pages->render('page::pagination.default') !!}
</div>


@push('css_inline')
<style>
    .entry-title {
        text-align: left;
        text-transform: capitalize !important;
        margin-bottom: 0 !important;
    }
    .entry-title:before {
        display: none;
    }
    .grid-page .row {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display:         flex;
        flex-wrap: wrap;
    }
    .grid-page .row > [class*='col-'] {
        display: flex;
        flex-direction: column;
    }
</style>
@endpush