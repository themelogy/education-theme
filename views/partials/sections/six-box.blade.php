<section class="section-padding featured-boxes m-top-25 p-bot-0">
    <div class="container">
        <div class="text-center">
            <div class="row">
                @if($subpages = Page::all()->where('settings.show_box', 1))
                    @foreach($subpages as $subpage)
                        @include('partials.components.box', $subpage)
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>