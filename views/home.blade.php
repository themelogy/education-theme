@extends('layouts.master')

@section('content')

    @themeSlide('anasayfa')

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