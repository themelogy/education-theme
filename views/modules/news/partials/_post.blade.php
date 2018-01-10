<div class="col-md-6">
    <article class="post-wrapper">
        <div class="thumb-wrapper">
            <img src="{{ $post->present()->firstImage(360, 270, 'fit', 50) }}"
                 class="img-responsive" alt="{{ $post->title }}">
            <div class="entry-header">
                <span class="posted-in"><a href="{{ $post->category->url }}" class="red">{{ $post->category->name }}</a></span>
                <h2 class="entry-title"><a href="{{ $post->url }}">{{ $post->title }}</a>
                </h2>
            </div>
        </div>
        <div class="entry-content" style="min-height: 90px;">
            <p>{!! Str::words(strip_tags($post->intro), 15) !!}</p>
        </div>
    </article>
</div>