<div class="widget widget_categories_page m-bot-20 z-depth-2">
    <h2 class="title font-16 bold-700 uppercase">@lang('themes::gallery.meta.title')</h2>
    <ul class="list-group">
        @foreach($categories as $category)
        <li><a href="{{ $category->url }}">{{ $category->title }}</a></li>
        @endforeach
    </ul>
</div>
