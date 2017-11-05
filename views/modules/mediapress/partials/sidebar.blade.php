<div class="widget widget_categories_page m-bot-20 z-depth-2">
    <h2 class="title font-16 bold-700 uppercase">{{ $page->title }}</h2>
    <ul class="list-group">
        @foreach($mediaTypes as $key => $mediaType)
            <li><a href="{{ route('mediapress.media.category', $key) }}">{{ $mediaType }}</a></li>
        @endforeach
    </ul>
</div>