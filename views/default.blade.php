@extends('layouts.master')

@section('content')
    @component('partials.components.page-title', ['page'=>$page, 'breadcrumb'=>'page'])
        {{ $page->title }}
    @endcomponent

    <section class="section-padding md-p-top-100 section-page">
        <div class="container">
            <div class="row">
                @php $parent = $page->parentpage @endphp
                @if($parent && isset($parent->settings->show_sidebar))
                    <div class="col-md-3 left-side">
                        @include('partials.components.page-sublist', [$parent])
                    </div>
                    <div class="col-md-9">
                        @if($page->settings->list_page ?? false)
                            @include('page::partials.sub-page', ['type'=>$page->settings->list_type])
                        @else
                            <div class="content md-padding-40 text-justify" id="image-gallery">
                                @php
                                    $cover_image = isset($page->settings->cover_image) ? $page->present()->firstImage(null,300,'resize',50) : 0;
                                @endphp
                                @if($cover_image)
                                    <div class="row">
                                        <div class="col-md-12 m-bot-20">
                                            <img src="{{ $cover_image }}" class="img-responsive"
                                                 alt="{{ $page->title }}">
                                        </div>
                                    </div>
                                @endif
                                {!! $page->body !!}

                                @if(isset($page->settings->image_gallery))
                                    @php $images = $page->present()->images(600, 400,'fit',60); @endphp
                                    @if(count($images)>1)
                                        <div class="row m-top-30">
                                            <div class="col-md-8 col-md-offset-2">
                                                <div class="gallery-thumb">
                                                    <ul class="slides" style="list-style-type: none;">
                                                        @foreach($images as $image)
                                                            <li data-thumb="{{ $image }}">
                                                                <img v-img:group src="{{ $image }}" alt="image">
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div><!-- /.gallery-thumb -->
                                            </div>
                                        </div><!-- /.row -->
                                    @endif
                                @endif
                            </div>
                        @endif
                    </div>
                @else
                    <div class="col-md-12">
                        @if($page->settings->list_page ?? false)
                            @include('page::partials.sub-page', ['type'=>$page->settings->list_type])
                        @else
                            <div class="content md-padding-40 text-justify">
                                {!! $page->body !!}
                                <div id="image-gallery"></div>
                            </div>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </section>

    {!! Widget::get('portfolio_brands', [20]) !!}
@stop

@if(isset($page->settings->image_gallery))
    @push('js_inline')
        {!! Theme::style('js/vendors/flexSlider/flexslider.css') !!}
        {!! Theme::script('js/vendors/flexSlider/jquery.flexslider-min.js') !!}
        <style>
        	.flex-direction-nav li {
        		list-style-type: none !important;
        	}
        </style>
    @endpush

    @push('js_inline')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.4.4/vue.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/v-img@0.1.9/dist/v-img.min.js"></script>
        <script>
            new Vue({
                el: '#image-gallery'
            });
        </script>
    @endpush
@endif