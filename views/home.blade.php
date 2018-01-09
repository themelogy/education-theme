@extends('layouts.master')

@section('content')

    @include('partials.sections.slider')

    @include('partials.sections.news')

    @include('partials.sections.six-box')

    {!! Widget::get('portfolio_brands', [20]) !!}

@endsection

@section('popup')
    @php
        $popup = collect(app(\Modules\Popup\Repositories\PopupRepository::class)->getPopups('home'))->first();
    @endphp
    @if($popup)
        @include('partials.components.popup', ['popup'=>$popup])
    @endif
@endsection