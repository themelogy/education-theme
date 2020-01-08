@php $template = Request::query('template') ? 'custom' : 'master'; @endphp
@extends('layouts.'.$template)

@section('content')

    @component('partials.components.page-title', ['page'=>$page, 'breadcrumb'=>'page'])
    {{ $page->title }}
    @endcomponent

    <section class="section-padding md-p-top-100 section-page">
        <div class="container">
            <div class="row">
                @php $parent = $page->parentpage @endphp
                @if($parent && isset($parent->settings->show_sidebar))
                    @includeIf('page::partials.page-types.menu', compact('parent', 'page'))
                @else
                    @includeIf('page::partials.page-types.normal', compact('page'))
                @endif
            </div>
        </div>
    </section>
    @portfolioBrands(20)
@stop


@push('js_inline')
    @if(isset($page->settings->tracking_code))
        {!! $page->settings->tracking_code !!}
    @endif
@endpush
