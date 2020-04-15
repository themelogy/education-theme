@extends('layouts.master')

@section('content')

    @component('partials.components.page-title', ['breadcrumb'=>'gallery.index'])
        {{ $category->title }}
    @endcomponent

    <section class="section-padding md-p-top-50 md-p-bot-50 section-page">
        <div class="container">
            <div class="row">
                <div class="default-blog grid-blog grid-page">
                    <div class="col-md-12">
                        @foreach($albums->chunk(3) as $chunks)
                            <div class="row">
                                @foreach($chunks as $album)
                                    <div class="col-md-4">
                                        <article class="post-wrapper m-bot-20" style="margin-bottom: 0 !important;">
                                            <div class="thumb-wrapper">
                                                <img src="{{ $album->present()->firstImage(330,200,'fit',80) }}" class="img-responsive" alt="{{ $album->title }}">
                                                <div class="entry-header">
                                                    <h2 class="entry-title"><a href="{{ $album->url }}">{{ $album->title }}</a></h2>
                                                </div>
                                                <div class="entry-content"></div>
                                            </div>
                                        </article>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

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
            display: flex;
            flex-wrap: wrap;
        }

        .grid-page .row > [class*='col-'] {
            display: flex;
            flex-direction: column;
        }
    </style>
@endpush


@push('js_inline')
    @if(isset($page->settings->tracking_code))
        {!! $page->settings->tracking_code !!}
    @endif
@endpush
