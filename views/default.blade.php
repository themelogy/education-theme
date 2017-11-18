@extends('layouts.master')

@php
if(request()->has('password')) {
    $password = request()->get('password');
    $isLogin = false;
    \Request::session()->put("page_{$page->id}", $password);
}
$sessPassword = session("page_{$page->id}");
$loginPassword = isset($page->settings->password) ? $page->settings->password : '';
if($sessPassword == $loginPassword) {
    $isLogin = true;
} else {
    $isLogin = isset($page->settings->password) ? $currentUser ? true : false : true;
    if(request()->has('password')) {
        $errorMsg = 'Şifreyi yanlış girdiniz!';
    }
}
@endphp

@section('content')
    @component('partials.components.page-title', ['page'=>$page, 'breadcrumb'=>'page'])
    {{ $page->title }}
    @endcomponent

    <section class="section-padding md-p-top-100 section-page">
        <div class="container">
            <div class="row">
                @php $parent = $page->parentpage @endphp
                @if($parent && isset($parent->settings->show_sidebar))
                    <div class="col-md-3 left-side">
                        @include('partials.components.page-sublist', [$parent])
                    </div>
                    <div class="col-md-9">
                        @if($isLogin == true)
                            @if($page->settings->list_page ?? false)
                                @include('page::partials.sub-page', ['type'=>$page->settings->list_type])
                            @else
                                @include('page::partials.sub-normal')
                            @endif
                        @else
                            @include('page::partials.password-form')
                        @endif
                    </div>
                @else
                    <div class="col-md-12">
                        @if($isLogin == true)
                        @if($page->settings->list_page ?? false)
                            @include('page::partials.sub-page', ['type'=>$page->settings->list_type])
                        @else
                            <div class="content md-padding-40 text-justify">
                                {!! $page->body !!}
                                <div id="image-gallery"></div>
                            </div>
                        @endif
                        @else
                            @include('page::partials.password-form')
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </section>

    {!! Widget::get('portfolio_brands', [20]) !!}
@stop