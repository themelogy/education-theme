@extends('layouts.master')

@section('content')

    @component('partials.components.page-title', ['breadcrumb'=>'video.show'])
        {{ $media->title }}
    @endcomponent

    <section class="section-padding md-p-top-50 md-p-bot-50 section-page">
        <div class="container">
            <div class="row">
                <div class="default-blog grid-blog grid-page">
                    <div class="col-md-12">
                        <div class="embed-responsive embed-responsive-16by9">
                            {!! $media->embed['code'] ?? null !!}
                        </div>
                        <h3 class="ui-title-block ui-title-block_small" style="font-size:14px;">{{ $media->title }}</h3>
                        <div class="description">
                            {!! $media->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
