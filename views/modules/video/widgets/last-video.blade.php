<div class="announcement">
    <h3 class="title padding-20 no-margin z-depth-1 text-uppercase"><i class="fa fa-paint-brush m-rgt-10" aria-hidden="true"></i> {{ trans_choice('themes::news.announcement',[1]) }}</h3>
    <div class="announcement-grid-navigation">
        <a class="prev"><i class="fa fa-angle-left"></i></a>
        <a class="next"><i class="fa fa-angle-right"></i></a>
        <a href="{{ route('video.media.index') }}" class="all"><i class="fa fa-th font-18"></i></a>
    </div>
    <div class="slick-carousel default-blog grid-blog">
        @foreach($medias as $media)
            <article class="post-wrapper no-margin">
                <div class="thumb-wrapper">
                    <a href="{{ $media->url }}"><img src="{{ $media->present()->firstImage(480, 305, 'fit', 80) }}" class="img-responsive" alt="{{ $media->title }}"></a>
                    <div class="post-date">
                        {{ $media->created_at->format('d') }}<span>{{ $media->created_at->formatLocalized('%h') }}</span>
                    </div>
                    <div class="entry-header">
                        <h2 class="entry-title" style="font-size: 1.5rem;"><a href="{{ $media->url }}">{{ $media->title }}</a>
                        </h2>
                    </div>
                </div>
            </article>
        @endforeach
    </div>
</div>
