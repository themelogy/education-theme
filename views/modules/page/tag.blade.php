@extends('layouts.master')

@section('content')
    @component('partials.components.page-title', ['breadcrumb'=>'page.tag'])
    {{ $tag->name }}
    @endcomponent

    <section class="section-padding md-p-top-100 section-page">
        <div class="container">
            @foreach($pages->chunk(3) as $chunk)
            <div class="row">
                @foreach($chunk as $page)
                <div class="col-md-4">
                    <article class="post-wrapper m-bot-20 m-top-0">
                        <div class="thumb-wrapper">
                            <img src="{{ $page->present()->firstImage(330,200,'fit',50) }}" class="img-responsive" alt="{{ $page->title }}">
                        </div>
                        <div class="entry-content">
                            <h2 class="entry-title"><a href="{{ $page->url }}">{{ $page->title }}</a></h2>
                            <p>{!! Str::words(strip_tags($page->body), 15) !!}</p>
                            <a class="browser-default btn btn-primary btn-xs" href="{{ $page->url }}">{{ trans('global.buttons.read more') }}</a>
                        </div>
                    </article>
                </div>
                @endforeach
            </div>
            @endforeach
        </div>
    </section>
@stop