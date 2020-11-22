@php $template = Request::query('template') ? 'custom' : 'master'; @endphp
@extends('layouts.master')

@section('content')

    @component('partials.components.page-title', ['page'=>$page, 'breadcrumb'=>'page'])
    {{ $page->title }}
    @endcomponent

    <section class="section-padding md-p-top-100 section-page">
        <div class="container">
            <div class="row">
                @includeIf('page::partials.page-types.normal', compact('page'))
            </div>
        </div>
    </section>
    @portfolioBrands(20)
@stop
