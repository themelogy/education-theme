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
                    <a href="{{ $post->url }}"><img data-src="{{ $post->present()->firstImage(750, 469, 'fit', 80) }}"
                                                    class="img-responsive owl-lazy" alt="{{ $post->title }}"></a>
                    <div class="post-date">
                        {{ $post->created_at->format('d') }}<span>{{ $post->created_at->formatLocalized('%h') }}</span>
                    </div>
                    <div class="entry-header">
                        <h2 class="entry-title" style="font-size: 1.5rem;"><a href="{{ $post->url }}">{{ $post->title }}</a></h2>
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



@push('js_inline')
    {!! Theme::style('vendor/slick-carousel/slick.css') !!}
    {!! Theme::script('vendor/slick-carousel/slick.min.js') !!}
    <script>
        jQuery(document).ready(function () {
            var news_grid = $('.news-grid').owlCarousel({
                loop: true,
                nav: false,
                dots: false,
                singleItem: true,
                // autoplay: true,
                // autoplayTimeout: 8000,
                // autoplaySpeed: 1000,
                lazyLoad: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 4
                    }
                }
            });
            $(".news-grid-navigation .prev").click(function () {
                news_grid.trigger('prev.owl.carousel');
            });

            $(".news-grid-navigation .next").click(function () {
                news_grid.trigger('next.owl.carousel');
            });
            $('.slick-carousel').slick({
                infinite: false,
                vertical:true,
                verticalSwiping:true,
                slidesToShow: 3,
                slidesToScroll: 3,
                autoplay: true,
                mobileFirst: true,
                prevArrow: $('.prev'),
                nextArrow: $('.next'),
            });
            var announcement = $('.announcement-grid').owlCarousel({
                loop: true,
                nav: false,
                dots: false,
                singleItem: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplaySpeed: 1000,
                lazyLoad: true,
                animateOut: 'slideOutUp',
                animateIn: 'slideInUp',
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
            $(".announcement-grid-navigation .prev").click(function () {
                announcement.trigger('prev.owl.carousel');
            });

            $(".announcement-grid-navigation .next").click(function () {
                announcement.trigger('next.owl.carousel');
            });
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