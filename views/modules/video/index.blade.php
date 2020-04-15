@extends('layouts.master')

@section('content')

    @component('partials.components.page-title', ['breadcrumb'=>'video.index'])
        {{ trans('themes::media.meta.title') }}
    @endcomponent

    <section class="section-padding md-p-top-50 md-p-bot-50 section-page">
        <div class="container">
            <div class="row">
                <div class="default-blog grid-blog grid-page">
                    <div class="col-md-12">
                        @foreach($medias->chunk(3) as $chunks)
                            <div class="row">
                                @foreach($chunks as $media)
                                    <div class="col-md-4">
                                        <article class="post-wrapper m-bot-20" style="margin-bottom: 20px !important;">
                                            <div class="card-img-top link_on-youtube" style="margin-bottom: 0;">

                                                <a class="inline" href="#data{{ $media->id }}"><i class="fa fa-play-circle-o fa-4x"></i>
                                                <div style="display:none; padding: 0;">
                                                    <div class="embed-responsive" id="data{{ $media->id }}" style="padding: 0;">{!! $media->embed['code'] !!}</div>
                                                </div>
                                                <img class="img-responsive" src="{{ $media->present()->embedImage(600,325,'fit',80) }}" alt="{{ $media->title }}"/>
                                            </div>
                                        </article>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                {!! $medias->links('partials.pagination.default') !!}
            </div>
        </div>
    </section>
@endsection

@push('css_inline')
    <style>
        .inline i {
            top: 50%;
            left: 50%;
            position: absolute;
            margin-left: -25px;
            margin-top: -30px;
        }
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
    <link rel="stylesheet" href="{!! Module::asset('video:js/fancybox/jquery.fancybox.min.css') !!}">
    <script src="{!! Module::asset('video:js/fancybox/jquery.fancybox.min.js') !!}"></script>
    <script>
        $("a.inline").fancybox({
            width: 600,
            height: 350
        });
    </script>
@endpush
