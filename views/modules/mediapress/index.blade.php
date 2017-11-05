@extends('layouts.master')

@section('content')

    @php
        $page = Page::findBySlug('basinda-biz');
        $breadcrumb = isset($mediaTypes[$category]) ? 'mediapress.category' : 'mediapress.index';
    @endphp

    @if($page)
        @component('partials.components.page-title', ['page'=>$page, 'breadcrumb'=>$breadcrumb, 'title_show'=>'true'])
        {{ $mediaTypes[$category] ?? 'Basında Biz' }}
        @endcomponent
    @else
        @component('partials.components.page-title', ['breadcrumb'=>$breadcrumb, 'title_show'=>'true'])
        {{ $mediaTypes[$category] ?? 'Basında Biz' }}
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
                        <div class="row">
                            @foreach($medias as $media)
                                <div class="col-md-12">
                                    <article class="post-wrapper m-bot-20">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <img class="img-responsive" src="{{ $media->present()->media_image(240,140) }}" />
                                            </div>
                                            <div class="col-md-8">
                                                <h2 class="entry-title"><a href="{{ $media->present()->url }}">{{ $media->title }}</a></h2>
                                                {!! $media->description !!}
                                                <a class="browser-default btn btn-primary btn-xs" href="{{ $media->present()->url }}">{{ trans('global.buttons.read more') }}</a>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {!! $medias->render('partials.pagination.default') !!}
                </div>
            </div>
        </div>
    </section>
@endsection