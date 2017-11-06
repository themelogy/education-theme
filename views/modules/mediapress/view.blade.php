@extends('layouts.master')

@section('content')

    @php
        $page = Page::findBySlug('basinda-biz');
    @endphp

    @if($page)
        @component('partials.components.page-title', ['page'=>$page, 'breadcrumb'=>'mediapress.view', 'title_show'=>'true'])
        {{ $media->title }}
        @endcomponent
    @else
        @component('partials.components.page-title', ['breadcrumb'=>'mediapress.view', 'title_show'=>'true'])
        {{ $media->title }}
        @endcomponent
    @endif

    <section class="section-padding md-p-top-100 section-page">
        <div class="container">
            <div class="row">

                <div class="col-md-3 left-side">
                    @include('mediapress::partials.sidebar')
                </div>

                <div class="col-md-9">
                    <div class="content md-padding-40 text-justify">
                        <h2 class="title align-left"><span class="label label-default m-rgt-10">{{ $media->brand }}</span> {{ $media->title }}</h2>
						<span class="date">{{ $media->release_at->formatLocalized('%d %B %Y') }}</span><br/>
                        @if($media->media_type == 'tv')
                        {!! $media->present()->media_desc !!}
                        @else
                            <div style="padding:10px 0;">
								<img class="img-responsive img-thumbnail" src="{{ $media->present()->media_image(790,'') }}" />
							</div>
                        @endif
                        <div class="description">
                            {!! $media->description !!}
							<br/>
							@if($media->media_desc)
							Kaynak : <a href="{{ $media->media_desc }}" target="_blank">{{ $media->media_desc }}</a>
							@endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection