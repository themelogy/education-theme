<section class="section-padding clients" style="background-color: #fbfbf9;">
    <div class="container">
        <div class="clients-grid p-top-bot-20">
            @foreach($brands as $brand)
                <div class="border-box">
                    <a target="_blank" href="{{ $brand->website }}">
                        <img src="{{ $brand->present()->firstImage(null, 110, 'resize', 80) }}" alt="{{ $brand->title }}">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
@push('js_inline')
    <script type="text/javascript">
        jQuery(document).ready(function () {
            $('.clients-grid').owlCarousel({
                loop: true,
                nav: false,
                dots: false,
                autoplay: true,
                autoplayTimeout: 1500,
                autoplaySpeed: 2000,
                lazyLoad: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 4
                    },
                    1000: {
                        items: 5
                    }
                }
            });
        });
    </script>
@endpush
