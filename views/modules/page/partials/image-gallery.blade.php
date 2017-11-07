@push('js_inline')
<script type="text/x-template" id="gallery">
    <div>
        <carousel :scrollPerPage="true" :perPage="3" :perPageCustom="[[0, 1],[480, 1], [768,3], [1024, 3], [2000, 4]]" :autoplay="true">
            @foreach($page->present()->images(600,null,'resize',50) as $image)
                <slide>
                    <img v-img:group :title="true" alt="{{ $page->title }}" src="{{ $image }}" />
                </slide>
            @endforeach
        </carousel>
    </div>
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.4.4/vue.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/v-img@0.1.9/dist/v-img.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue-carousel@0.6.5/dist/vue-carousel.min.js"></script>
<script>
    new Vue({
        el: '#image-gallery',
        components: {
            'carousel': VueCarousel.Carousel,
            'slide': VueCarousel.Slide
        },
        template: '#gallery'
    });
</script>
<style>
    .VueCarousel-slide {
        margin-right: 10px;
    }
</style>
@endpush