@php
    $list_per_page  = $page->settings->list_per_page ?? 6;
    $list_grid 		= $page->settings->list_grid ?? 6;
    $list_type 		= $page->settings->list_type ?? 'grid';
    $list_content   = $page->settings->list_page_content ?? 0;
    $list_image     = $page->settings->list_page_image ?? 0;
    $list_button    = $page->settings->list_page_button ?? 0;
    $list_pages     = $page->children()->orderBy('position')->paginate($list_per_page);
@endphp

<div class="content md-padding-40 text-justify default-blog grid-blog grid-page">
    @includeWhen($page->settings->cover_image ?? false, 'page::partials.components.cover_image')

    @isset($page->settings->page_body)
        <div class="text-justify">
            {!! $page->body !!}
        </div>
    @endisset

    <div class="row">
        @foreach($list_pages as $child)
            @if($list_type == 'grid')
                <div class="col-md-{{ $list_grid }}">
                    <article class="post-wrapper m-bot-20">
                        @if($list_image)
                        <div class="thumb-wrapper" {!! $list_content || $list_button ? '' : 'style="margin-bottom:0 !important;"' !!}>
                            <img src="{{ $child->present()->firstImage(330,200,'fit',50) }}" class="img-responsive" alt="{{ $child->title }}">
                            <div class="entry-header">
                                <h2 class="entry-title"><a href="{{ $child->url }}">{{ $child->title }}</a></h2>
                            </div>
                        </div>
                        @endif
                        <div class="entry-content">
							@if(!$list_image)
                            <h2 class="entry-title"><a href="{{ $child->url }}">{{ $child->title }}</a></h2>
							@endif
                            @if($list_content)
                            <p>{!! Str::words(strip_tags($child->body), 15) !!}</p>
                            @endif
                            @if($list_button)
                                <a class="browser-default btn btn-primary btn-xs" href="{{ $child->url }}">{{ trans('global.buttons.read more') }}</a>
                            @endif
                        </div>
                    </article>
                </div>
            @else
                <div class="col-md-12">
                    <article class="post-wrapper m-bot-20">
                        <div class="row">
                            @if($list_image)
                            <div class="col-md-4">
                                <img src="{{ $child->present()->firstImage(330,200,'fit',50) }}" class="img-responsive" alt="{{ $child->title }}">
                            </div>
                            @endif
                            <div class="col-md-{{ $list_image ? 8 : 12 }}">
                                <div class="entry-content p-rgt-10">
                                    <h2 class="entry-title"><a href="{{ $child->url }}">{{ $child->title }}</a></h2>
                                    @if($list_content)
                                    <p class="m-top-10">{!! Str::words(strip_tags($child->body), 15) !!}</p>
                                    @endif
                                    @if($list_button)
                                        <a class="browser-default btn btn-primary btn-xs" href="{{ $child->url }}">{{ trans('global.buttons.read more') }}</a>
                                    @endif
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
