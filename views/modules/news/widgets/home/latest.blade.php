<h3 class="title padding-20 white-text no-margin z-depth-1 text-uppercase"><i class="fa fa-newspaper-o m-rgt-10"></i> {{ trans_choice('themes::news.title',[1]) }}</h3>
<div class="news-grid-navigation">
    <a class="prev"><i class="fa fa-angle-left"></i></a>
    <a class="next"><i class="fa fa-angle-right"></i></a>
    <a href="{{ route('news.index') }}" class="all"><i class="fa fa-th font-18"></i></a>
</div>
<div class="news-grid default-blog grid-blog">
    @foreach($posts->chunk(3) as $chunk)
        <div>
            @foreach($chunk as $post)
            <article class="post-wrapper no-margin m-bot-10">
                <div class="thumb-wrapper">
                    <a href="{{ $post->url }}"><img src="{{ $post->present()->firstImage(750, 469, 'fit', 80) }}"
                                                    class="img-responsive" alt="{{ $post->title }}"></a>
                    <div class="post-date">
                        {{ $post->created_at->format('d') }}<span>{{ $post->created_at->formatLocalized('%h') }}</span>
                    </div>
                    <div class="entry-header">
                        <h2 class="entry-title"><a href="{{ $post->url }}">{{ $post->title }}</a></h2>
                    </div>
                </div>
                <!--
                <div class="entry-content p-top-bot-10 p-lft-rgt-20 height-130">
                    <p>{!! Str::words(strip_tags($post->intro), 15) !!}</p>
                </div>
                -->
            </article>
            @endforeach
        </div>
    @endforeach
</div>
