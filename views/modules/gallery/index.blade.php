@extends('layouts.master')

@section('content')

    @component('partials.components.page-title', ['breadcrumb'=>'gallery.index'])
        @lang('themes::gallery.meta.title')
    @endcomponent

    <section class="section-padding md-p-top-50 md-p-bot-50 section-page">
        <div class="container">
            <div class="row">
                <div class="default-blog grid-blog grid-page">
                    <div class="col-md-12">
                        @foreach($files->chunk(3) as $chunks)
                            <div class="row">
                                @foreach($chunks as $file)
                                    <div class="col-md-4">
                                        <article class="post-wrapper m-bot-20" style="margin-bottom: 20px !important;">
                                            <a href="{{ \Imagy::getImage($file->filename, 'albumImage', ['width' => null, 'height' => 800, 'mode' => 'resize', 'quality' => 80]) }}" data-lightbox="image-1">
                                            <div class="thumb-wrapper" style="margin-bottom: 0;">

                                                <img src="{{ \Imagy::getImage($file->filename, 'albumImage', ['width' => 350, 'height' => 250, 'mode' => 'fit', 'quality' => 80]) }}" class="img-responsive" />

                                            </div>
                                            </a>
                                        </article>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                {!! $files->links('partials.pagination.default') !!}
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

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/css/lightbox.css" integrity="sha256-K4PK62zpbl/XelQ0bLxyUztMw5nLdGyd2qGmPTGM1oY=" crossorigin="anonymous" />
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/js/lightbox.min.js" integrity="sha256-CtKylYan+AJuoH8jrMht1+1PMhMqrKnB8K5g012WN5I=" crossorigin="anonymous"></script>
@endpush

@push('js_inline')
    @if(isset($page->settings->tracking_code))
        {!! $page->settings->tracking_code !!}
    @endif
@endpush
