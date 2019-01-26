<section class="section-padding featured-boxes p-top-0">
    <div class="container">
        <div class="text-center">
            <div class="row">
                @foreach($pages as $page)
                    <div class="col-md-{{ $page->settings->column_box ?? 4 }} col-sm-6 col-xs-12">
                        <div class="featured-box text-center z-depth-2">
                            <div class="overlay-image" style="background-image: url({{ $page->present()->firstImage(380,300,'fit',50) }})"></div>
                            <div class="featured-wrapper">
                                <div class="intro-header">
                                    <i class="material-icons white-text">{{ $page->settings->icon ?? null }}</i>
                                    <h2 class="white-text"><a href="{{ $page->url }}">{{ $page->title }}</a></h2>
                                </div>
                                <div class="content white-text">
                                    @php $locale = locale() @endphp
                                    <p>{{ $page->settings->sub_title->{$locale} ?? null }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
