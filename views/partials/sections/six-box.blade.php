<section class="section-padding featured-boxes m-top-25 p-bot-0">
    <div class="container">
        <div class="text-center">
            <div class="row">
                @foreach(['yabanci-dil', 'basarilarimiz', 'montessori-sistemi', 'sosyal-etkinlikler', 'mezunlar', 'veli-gorusleri'] as $item)
                    @if($subpage = Page::findBySlug($item))
                        @include('partials.components.box', $subpage)
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</section>