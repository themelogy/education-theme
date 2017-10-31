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
                        @if(isset($page->settings->list_page))
                            @include('page::partials.sub-page', ['type'=>$page->settings->list_type])
                        @else
                        <div class="content md-padding-40 text-justify">
                            {!! $page->body !!}
                        </div>
                        @endif
                    </div>
                @else
                    <div class="col-md-12">
                        @if(isset($page->settings->list_page))
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
@stop
