<div class="col-md-{{ $subpage->settings->column_box or 4 }} col-sm-6 col-xs-12">
    <div class="featured-box text-center z-depth-2">
        <div class="overlay-image" style="background-image: url({{ $subpage->present()->firstImage(380,300,'fit',50) }})"></div>
        <div class="featured-wrapper">
            <div class="intro-header">
                <i class="material-icons white-text">{{ $subpage->settings->icon or null }}</i>
                <h2 class="white-text"><a href="{{ $subpage->url }}">{{ $subpage->title }}</a></h2>
            </div>
            <div class="content white-text">
                <p>{{ $subpage->sub_title or null }}</p>
            </div>
        </div>
    </div>
</div>