<div class="content md-padding-40 text-justify">
    @php
        $cover_image = isset($page->settings->cover_image) ? $page->present()->firstImage(null,300,'resize',50) : 0;
    @endphp
    @if($cover_image)
        <div class="row">
            <div class="col-md-12 m-bot-20">
                <img src="{{ $cover_image }}" class="img-responsive"
                     alt="{{ $page->title }}">
            </div>
        </div>
    @endif
    {!! $page->body !!}

    @if(isset($page->settings->image_gallery))
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
                    <img src="{{ $image }}" alt="image" />
                @endforeach
            </div>
        @endif
    @endif
</div>

@if(isset($page->settings->image_gallery))
    @push('js_inline')
    {!! Theme::style('js/vendors/fotorama/fotorama.css') !!}
    {!! Theme::script('js/vendors/fotorama/fotorama.js') !!}
    @endpush
@endif