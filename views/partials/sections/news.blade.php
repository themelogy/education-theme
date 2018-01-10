<section class="section-padding grid-news-hover m-top-25 p-bot-0">
    <div class="container no-padding">
        <div class="col-md-8 no-padding p-rgt-10">
            @php
                $latestNews = collect(News::latest('10'))->whereNotIn('category.slug', ['duyuru','announcements']);
            @endphp
            @if(count($latestNews)>1)
                <h3 class="title padding-20 white-text no-margin z-depth-1 text-uppercase"><i class="fa fa-newspaper-o m-rgt-10"></i> {{ trans_choice('themes::news.title',[1]) }}</h3>
                <div class="news-grid-navigation">
                    <a class="prev"><i class="fa fa-angle-left"></i></a>
                    <a class="next"><i class="fa fa-angle-right"></i></a>
                    <a href="{{ route('news.index') }}" class="all"><i class="fa fa-th font-18"></i></a>
                </div>
                <div class="news-grid default-blog grid-blog">
                    @foreach($latestNews as $latestNew)
                        <article class="post-wrapper no-margin">
                            <div class="thumb-wrapper">
                                <img src="{{ $latestNew->present()->firstImage(360, 270, 'fit', 50) }}"
                                     class="img-responsive" alt="{{ $latestNew->title }}">
                                <div class="post-date">
                                    {{ $latestNew->created_at->format('d') }}<span>{{ $latestNew->created_at->formatLocalized('%h') }}</span>
                                </div>
                                <div class="entry-header">
                                    <h2 class="entry-title"><a href="{{ $latestNew->url }}">{{ $latestNew->title }}</a>
                                    </h2>
                                </div>
                            </div>
                            <div class="entry-content p-top-bot-10 p-lft-rgt-20 height-130">
                                <p>{!! Str::words(strip_tags($latestNew->intro), 15) !!}</p>
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
                    <h3 class="title padding-20 no-margin z-depth-1 text-uppercase"><i class="fa fa-bullhorn m-rgt-10" aria-hidden="true"></i> {{ trans_choice('themes::news.announcement',[1]) }}</h3>
                    <div class="announcement-grid-navigation">
                        <a class="prev"><i class="fa fa-angle-left"></i></a>
                        <a class="next"><i class="fa fa-angle-right"></i></a>
                        <a href="{{ route('news.category', ['duyuru']) }}" class="all"><i class="fa fa-th font-18"></i></a>
                    </div>
                    <div class="announcement-grid default-blog grid-blog">
                        @foreach($anouncements->posts as $announcement)
                            <article class="post-wrapper no-margin">
                                <div class="thumb-wrapper">
                                    <img src="{{ $announcement->present()->firstImage(360, 280, 'fit', 50) }}"
                                         class="img-responsive" alt="{{ $announcement->title }}">
                                    <div class="post-date">
                                        {{ $latestNew->created_at->format('d') }}<span>{{ $latestNew->created_at->formatLocalized('%h') }}</span>
                                    </div>
                                    <div class="entry-header">
                                        <h2 class="entry-title"><a href="{{ $announcement->url }}">{{ $announcement->title }}</a>
                                        </h2>
                                    </div>
                                </div>
                                <div class="entry-content p-top-bot-10 p-lft-rgt-20 height-130">
                                    <p>{!! Str::words(strip_tags($announcement->intro), 15) !!}</p>
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
                    autoplayTimeout: 8000,
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
                    autoplayTimeout: 5000,
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
<style>
    .owl-stage {
        display: -webkit-box;
        display: -moz-box;
        display: -ms-box;
        display: box;
    }
</style>
@endpush