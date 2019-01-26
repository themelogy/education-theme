<div class="content md-padding-40 text-justify">

    @includeWhen($page->settings->cover_image ?? false, 'page::partials.components.cover_image')

    {!! $page->body !!}

    @includeWhen($page->settings->image_gallery ?? false, 'page::widgets.page.gallery')

</div>
