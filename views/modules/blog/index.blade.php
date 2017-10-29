@extends('blog::layout.master')

@section('blog_title')
    @component('partials.components.page-title', ['breadcrumb'=>'blog'])
    {{ trans('themes::blog.title') }}
    @endcomponent
@endsection

@section('blog_content')
    <div class="row">
        @foreach($posts as $post)
            @include('blog::partials._post')
        @endforeach
    </div>
    {!! $posts->render('blog::pagination.default') !!}
@endsection