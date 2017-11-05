@extends('layouts.master')

@section('content')

    @php
        $page = Page::findBySlug('basinda-biz');
    @endphp

    @if($page)
        @component('partials.components.page-title', ['page'=>$page, 'breadcrumb'=>'mediapress.view', 'title_show'=>'true'])
        {{ $media->title }}
        @endcomponent
    @else
        @component('partials.components.page-title', ['breadcrumb'=>'mediapress.view', 'title_show'=>'true'])
        {{ $media->title }}
        @endcomponent
    @endif

    <section class="section-padding md-p-top-100 section-page">
        <div class="container">
            <div class="row">

                <div class="col-md-3 left-side">
                    @include('mediapress::partials.sidebar')
                </div>

                <div class="col-md-9">
                    <div class="content md-padding-40 text-justify">
                        <h2 class="title">{{ $media->title }}</h2>
                        @if($media->media_type == 'tv')
                        {!! $media->present()->media_desc !!}
                        @else
                            <img class="img-responsive" src="{{ $media->present()->media_image(900,null) }}" />
                        @endif
                        <div class="description">
                            {!! $media->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection