@php $images = $page->present()->images(null, 600,'resize',80); @endphp
@if(count($images)>1)
    <div class="fotorama m-top-50"
         data-allowfullscreen="true"
         data-keyboard="true"
         data-width="700"
         data-maxwidth="100%"
         data-ratio="16/9"
         data-nav="thumbs">
        @foreach($images as $image)
            <img src="{{ $image }}" alt="{{ $page->title.' '.$loop->iteration }}"/>
        @endforeach
    </div>
@endif

<div id="image-gallery"></div>

@push('js_inline')
    {!! Theme::style('js/vendors/fotorama/fotorama.css') !!}
    {!! Theme::script('js/vendors/fotorama/fotorama.js') !!}
@endpush
