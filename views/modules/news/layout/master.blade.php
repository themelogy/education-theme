@extends('layouts.master')

@section('content')

    @yield('news_title')

    <section class="section-padding md-p-top-80 m-bot-50 default-blog grid-blog">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @yield('news_content')
                </div>
                <div class="col-md-4">
                    @include('news::partials.sidebar')
                </div>
            </div>
        </div>
    </section>

@endsection

@push('css_inline')
<style>
.news.row {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display:         flex;
  flex-wrap: wrap;
}
.news.row > [class*='col-'] {
  display: flex;
  flex-direction: column;
}
</style>    
@endpush