@extends('layouts.master')

@section('content')
    @component('partials.components.page-title', ['page'=>$page, 'breadcrumb'=>'page'])
    {{ $page->title }}
    @endcomponent

    <section class="section-padding md-p-top-100 section-page">
        <div class="container">
            <div class="row">
                @if($parent = $page->parentpage)
                    <div class="col-md-3">
                        @include('partials.components.page-sublist', [$parent])
                    </div>
                    <div class="col-md-9">
                        <div class="content md-padding-40 text-justify">
                            {!! $page->body !!}
                        </div>
                    </div>
                @else
                    <div class="col-md-12">
                        <div class="content md-padding-40 text-justify">
                            {!! $page->body !!}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@stop
