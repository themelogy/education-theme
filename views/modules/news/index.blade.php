@extends('news::layout.master')

@section('news_title')
    @component('partials.components.page-title', ['breadcrumb'=>'news'])
    {{ trans('themes::news.title') }}
    @endcomponent
@endsection

@section('news_content')
    <div class="news row">
        @foreach($posts as $post)
            @include('news::partials._post')
        @endforeach
    </div>
    {!! $posts->render('news::pagination.default') !!}
@endsection