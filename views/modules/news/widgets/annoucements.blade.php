<div id="carousel-ticker" class="carousel vertical slide carousel-ticker" data-ride="carousel" data-interval="5000">
    <div class="carousel-inner" role="listbox">
        @foreach($posts as $post)
            <div class="item @if($loop->first)active @endif">
                <p class="ticker-headline">
                    <a href="{{ $post->url }}">
                        <strong><i class="fa fa-bullhorn" aria-hidden="true"></i></strong>
                        {{ $post->title }}
                    </a>
                </p>
            </div>
        @endforeach
    </div>

    <!-- Controls -->
    <a class="up carousel-control" href="#carousel-ticker" role="button" data-slide="prev">
        <span class="fa fa-angle-up" aria-hidden="true"></span>
        <span class="sr-only">{{ trans('global.buttons.next') }}</span>
    </a>
    <a class="down carousel-control" href="#carousel-ticker" role="button" data-slide="next">
        <span class="fa fa-angle-down" aria-hidden="true"></span>
        <span class="sr-only">{{ trans('global.buttons.previous') }}</span>
    </a>
</div>