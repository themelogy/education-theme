@extends('layouts.master')

@section('content')

    @yield('blog_title')

    <section class="section-padding md-p-top-80 m-bot-50 default-blog grid-blog">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @yield('blog_content')
                </div>
                <div class="col-md-4">
                    @include('blog::partials.sidebar')
                </div>
            </div>
        </div>
    </section>

@endsection