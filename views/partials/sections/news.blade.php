<section class="section-padding grid-news-hover p-bot-0">
    <div class="container no-padding">
        <div class="col-md-8 no-padding p-rgt-10">
            @php
                $latestNews = collect(News::latest('10'))->whereNotIn('category.slug', ['duyuru','announcements']);
            @endphp
            @if(count($latestNews)>1)
            <h3 class="title padding-20 white-text no-margin z-depth-2 text-uppercase"><i class="fa fa-newspaper-o m-rgt-10"></i> {{ trans_choice('themes::news.title',[1]) }}</h3>
            <div class="news-grid-navigation">
                <a class="prev"><i class="fa fa-angle-left"></i></a>
                <a class="next"><i class="fa fa-angle-right"></i></a>
            </div>
            <div class="news-grid">
                @foreach($latestNews as $latestNew)
                <article class="post-wrapper no-margin">
                    <div class="thumb-wrapper waves-effect waves-block waves-light height-150">
                        <a href="{{ $latestNew->url }}"><img src="{{ $latestNew->present()->firstImage(370, 150, 'fit', 80) }}" class="img-responsive img-fit" alt=""></a>
                        <div class="post-date">
                            {{ $latestNew->created_at->format('d') }}<span>{{ $latestNew->created_at->formatLocalized('%h') }}</span>
                        </div>
                    </div>
                    <div class="blog-content" style="min-height: 170px;">
                        <div class="hover-overlay grey lighten-4"></div> 
                        <header class="entry-header-wrapper">
                            <div class="entry-header">
                                <h2 class="entry-title"><a href="{{ $latestNew->url }}">{{ $latestNew->title }}</a></h2>
                            </div>
                        </header>
                        <div class="entry-content">
                            {!! strip_tags($latestNew->intro) !!}
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
            @endif
        </div>
        <div class="col-md-4">
            @php $anouncements = NewsCategory::findBySlug('duyuru')->load('posts', 'translations') @endphp
            @if(count($anouncements->posts)>1)
            <div class="announcement">
                <h3 class="title padding-20 no-margin z-depth-2 text-uppercase"><i class="fa fa-bullhorn m-rgt-10" aria-hidden="true"></i> {{ trans_choice('themes::news.announcement',[1]) }}</h3>
                <div class="announcement-grid-navigation">
                    <a class="prev"><i class="fa fa-angle-left"></i></a>
                    <a class="next"><i class="fa fa-angle-right"></i></a>
                </div>
                <div class="announcement-grid">
                    @foreach($anouncements->posts as $announcement)
                        <article class="post-wrapper no-margin">
                            <div class="thumb-wrapper waves-effect waves-block waves-light height-150">
                                <a href="{{ $announcement->url }}"><img src="{{ $announcement->present()->firstImage(370, 150, 'fit', 80) }}" class="img-responsive img-fit" alt=""></a>
                                <div class="post-date">
                                    {{ $announcement->created_at->format('d') }}<span>{{ $announcement->created_at->formatLocalized('%h') }}</span>
                                </div>
                            </div>
                            <div class="blog-content" style="min-height: 170px;">
                                <div class="hover-overlay grey lighten-4"></div>
                                <header class="entry-header-wrapper">
                                    <div class="entry-header">
                                        <h2 class="entry-title"><a href="{{ $announcement->url }}">{{ $announcement->title }}</a></h2>
                                    </div>
                                </header>
                                <div class="entry-content">
                                    {!! strip_tags($announcement->intro) !!}
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</section>

@push('js_inline')
<script>
    jQuery(document).ready(function () {
        @if(count($latestNews)>1)
        var news_grid = $('.news-grid').owlCarousel({
            loop: true,
            nav: false,
            dots: false,
            singleItem: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplaySpeed: 1000,
            lazyLoad: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 2
                }
            }
        });
        $(".news-grid-navigation .prev").click(function () {
            news_grid.trigger('prev.owl.carousel');
        });

        $(".news-grid-navigation .next").click(function () {
            news_grid.trigger('next.owl.carousel');
        });
        @endif
        @if(count($anouncements->posts)>1)
        var announcement = $('.announcement-grid').owlCarousel({
            loop: true,
            nav: false,
            dots: false,
            singleItem: true,
            autoplay: true,
            autoplayTimeout: 2000,
            autoplaySpeed: 1000,
            lazyLoad: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });
        $(".announcement-grid-navigation .prev").click(function () {
            announcement.trigger('prev.owl.carousel');
        });

        $(".announcement-grid-navigation .next").click(function () {
            announcement.trigger('next.owl.carousel');
        });
        @endif
    });
</script>
@endpush