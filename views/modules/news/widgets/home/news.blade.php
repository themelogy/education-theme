<section class="section-padding grid-news-hover p-bot-0 m-bot-20">
    <div class="container no-padding">
        <div class="col-md-12 no-padding">
            @newsLatestPosts(24, 'home.latest')
        </div>
    </div>
</section>

@push('js_inline')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
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
