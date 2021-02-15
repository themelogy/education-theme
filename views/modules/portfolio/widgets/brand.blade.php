<section class="section-padding clients" style="background-color: #fbfbf9;">
    <div class="container">
        <div class="clients-grid p-top-bot-20">
            @foreach($brands as $brand)
                <div class="border-box">
                    <a target="_blank" href="{{ $brand->website }}" data-position="bottom" data-tooltip="{{ $brand->title }}" class="tooltipped">
                        <img class="owl-lazy" data-src="{{ $brand->present()->firstImage(null, 110, 'resize', 80) }}" alt="{{ $brand->title }}">
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
                lazyLoad: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplaySpeed: 500,
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
      $(document).ready(function(){
        $('.tooltipped').tooltip();
      });
    </script>
    <style>
.material-tooltip .backdrop{
    background-color: #DB0000;
}
.material-tooltip 
{
    font-family: Arial, sans-serif;
}


    </style>
@endpush
