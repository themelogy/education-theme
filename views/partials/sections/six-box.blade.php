<section class="section-padding featured-boxes m-top-25 p-bot-0">
    <div class="container">
        <div class="text-center">
            <div class="row">
                @foreach([2,3,4,5,6,7] as $item)
                    @if($subpage = Page::find($item))
                        @include('partials.components.box', $subpage)
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</section>