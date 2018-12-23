<section class="section-padding grid-news-hover m-top-25 p-bot-0">
    <div class="container no-padding">
        <div class="col-md-8 no-padding p-rgt-10">
            @newsLatestPosts(6, 'home.latest')
        </div>
        <div class="col-md-4">
            @newsFindByCategory('duyuru', 6, 'home.announcements')
        </div>
    </div>
</section>

@push('js_inline')
    <script>
        jQuery(document).ready(function () {
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