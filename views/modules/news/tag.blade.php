@extends('news::layout.master')

@section('news_title')
    @component('partials.components.page-title', ['breadcrumb'=>'news.tag'])
    {{ trans('news::tag.title.tag') }} : {{ $tag->name }}
    @endcomponent
@endsection

@section('news_content')
    <div class="row">
        @foreach($posts as $post)
            @include('news::partials._post')
        @endforeach
    </div>
    {!! $posts->render('news::pagination.default') !!}
@endsection