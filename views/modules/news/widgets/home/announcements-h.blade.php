<div class="announcement">
    <h3 class="title padding-20 no-margin z-depth-1 text-uppercase"><i class="fa fa-bullhorn m-rgt-10" aria-hidden="true"></i> {{ trans_choice('themes::news.announcement',[1]) }}</h3>
    <div class="announcement-grid-navigation">
        <a class="prev"><i class="fa fa-angle-left"></i></a>
        <a class="next"><i class="fa fa-angle-right"></i></a>
        <a href="{{ route('news.category', ['duyuru']) }}" class="all"><i class="fa fa-th font-18"></i></a>
    </div>
    <div class="announcement-grid default-blog grid-blog">
        @foreach($posts as $post)
            <article class="post-wrapper no-margin">
                <div class="thumb-wrapper">
                    <a href="{{ $post->url }}"><img src="{{ $post->present()->firstImage(360, 280, 'fit', 50) }}"
                                                    class="img-responsive" alt="{{ $post->title }}"></a>
                    <div class="post-date">
                        {{ $post->created_at->format('d') }}<span>{{ $post->created_at->formatLocalized('%h') }}</span>
                    </div>
                    <div class="entry-header">
                        <h2 class="entry-title"><a href="{{ $post->url }}">{{ $post->title }}</a>
                        </h2>
                    </div>
                </div>
                <div class="entry-content p-top-bot-10 p-lft-rgt-20 height-130">
                    <p>{!! Str::words(strip_tags($post->intro), 15) !!}</p>
                </div>
            </article>
        @endforeach
    </div>
</div>
