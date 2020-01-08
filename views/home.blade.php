@php $template = Request::query('template') ? 'custom' : 'master'; @endphp
@extends('layouts.'.$template)

@section('content')

    @themeSlide('anasayfa')

    <section class="section-block m-top-25 p-bot-0">
        <div class="container no-padding">
            {!! Block::get('home-news-top') !!}
        </div>
    </section>

    @include('news::widgets.home.news')

    @pageFindByOptions('settings.show_box', 'home.box')

    @portfolioBrands(20, 'brand')

@endsection

@section('popup')
    @php
        $popup = collect(app(\Modules\Popup\Repositories\PopupRepository::class)->getPopups('home'))->first();
    @endphp
    @if($popup)
        @include('partials.components.popup', ['popup'=>$popup])
    @endif
@endsection
