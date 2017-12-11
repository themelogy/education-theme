<div class="col-md-6">
    <article class="post-wrapper">
        <div class="thumb-wrapper">
            <img src="{{ $post->present()->firstImage(375, 300, 'fit', 50) }}"
                 class="img-responsive" alt="{{ $post->title }}">
            <div class="entry-header">
                <span class="posted-in"><a href="{{ $post->category->url }}" class="red">{{ $post->category->name }}</a></span>
                <h2 class="entry-title"><a href="{{ $post->url }}">{{ $post->title }}</a>
                </h2>
            </div>
            <span class="post-comments-number"><i class="fa fa-comments"></i><a href="#">0</a></span>
        </div>
        <div class="entry-content">
            <p>{!! Str::words(strip_tags($post->intro), 15) !!}</p>
        </div>
    </article>
</div>