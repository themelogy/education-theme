@extends('layouts.master')

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
                        @if($page->settings->list_page ?? false)
                            @include('page::partials.sub-page', ['type'=>$page->settings->list_type])
                        @else
                            <div class="content md-padding-40 text-justify">
								@php
									$cover_image = isset($page->settings->cover_image) ? $page->present()->firstImage(null,300,'resize',50) : 0;
								@endphp
								@if($cover_image)
								<div class="row">
									<div class="col-md-12 m-bot-20">
										<img src="{{ $cover_image }}" class="img-responsive" alt="{{ $page->title }}">
									</div>
								</div>
								@endif
                                {!! $page->body !!}
                            </div>
                        @endif
                    </div>
                @else
                    <div class="col-md-12">
                        @if($page->settings->list_page ?? false)
                            @include('page::partials.sub-page', ['type'=>$page->settings->list_type])
                        @else
                            <div class="content md-padding-40 text-justify">
                                {!! $page->body !!}
                            </div>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </section>

    {!! Widget::get('portfolio_brands', [20]) !!}
@stop
