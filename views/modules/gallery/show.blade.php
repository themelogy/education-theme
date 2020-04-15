@extends('layouts.master')

@section('content')

    @component('partials.components.page-title', ['breadcrumb'=>'gallery.show'])
        @lang('themes::gallery.meta.title')
    @endcomponent

    <section class="section-padding md-p-top-50 md-p-bot-50 section-page">
        <div class="container">
            <div class="row">
                <div class="default-blog grid-blog grid-page">
                    <div class="col-md-12">
                        @php $files = $album->files()->paginate(1); @endphp
                        @foreach($files as $file)
                            <img class="img-responsive img-thumbnail" src="{{ \Imagy::getImage($file->filename, 'albumImage', ['width' => null, 'height' => 600, 'mode' => 'resize', 'quality' => 80]) }}" alt="{{ $album->title }}" />
                        @endforeach
                    </div>
                    {!! $files->links('partials.pagination.default') !!}
                </div>
            </div>
        </div>
    </section>
@endsection

@push('css_inline')
    <style>
        .entry-title {
            text-align: left;
            text-transform: capitalize !important;
            margin-bottom: 0 !important;
        }

        .entry-title:before {
            display: none;
        }

        .grid-page .row {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            flex-wrap: wrap;
        }

        .grid-page .row > [class*='col-'] {
            display: flex;
            flex-direction: column;
        }
    </style>
@endpush


@push('js_inline')
    @if(isset($page->settings->tracking_code))
        {!! $page->settings->tracking_code !!}
    @endif
@endpush
