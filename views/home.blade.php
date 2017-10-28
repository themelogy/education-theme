@extends('layouts.master')

@section('content')

    @include('partials.sections.slider')

    @include('partials.sections.six-box')

    @include('partials.sections.news')

    @include('partials.components.clients')

@endsection

@section('popup')
    @php
        $popup = collect(app(\Modules\Popup\Repositories\PopupRepository::class)->getPopups('home'))->first();
    @endphp
    @if($popup)
        @include('partials.components.popup', ['popup'=>$popup])
    @endif
@endsection