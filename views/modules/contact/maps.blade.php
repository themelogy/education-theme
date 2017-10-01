<div class="address-grid-navigation">
    <a class="prev"><i class="fa fa-angle-left"></i></a>
    <a class="next"><i class="fa fa-angle-right"></i></a>
</div>
<div class="address-grid m-bot-30">
    @foreach(app('locations') as $location)
        <div class="contact-info z-depth-1">
            <h4 class="title"><img class="logo" src="{{ Theme::url('img/logos/ikon.svg') }}" alt="logo"/> {{ $location->name }}</h4>
            <address>
                @if($location->address)
                    <i class="material-icons brand-color">&#xE55F;</i>
                    <div class="address">
                        {{ $location->present()->address }}
                    </div>
                @endif
                @if($location->phone1 || $location->phone2)
                    <i class="material-icons brand-color">phone</i>
                    <div class="phone">
                        <ul>
                            <li>{{ $location->phone1 }}</li>
                            <li>{{ $location->phone2 }}</li>
                        </ul>
                    </div>
                @endif
                @if($location->email)
                    <i class="material-icons brand-color">&#xE0E1;</i>
                    <div class="mail">
                        <p><a href="mailto:{{ Html::email($location->email) }}">{{ Html::email($location->email) }}</a>
                    </div>
                @endif
            </address>
            <div style="width:100%; margin: 0; padding: 0 15px 15px;">
                <div style="width:100%; margin:0; height: 150px; border:1px solid #ebebeb;" id="map{{ $location->id }}"></div>
            </div>
        </div>
    @endforeach
</div>
@push('js_inline')
<script>
    function initMap() {
        @foreach(app('locations') as $location)
        var coordinate{{ $location->id }} = {lat: {{ $location->lat }}, lng: {{ $location->long }} };
        var map{{ $location->id }} = new google.maps.Map(document.getElementById('map{{ $location->id }}'), {
            zoom: 15,
            center: coordinate{{ $location->id }}
        });
        var marker{{ $location->id }} = new google.maps.Marker({
            position: coordinate{{ $location->id }},
            map: map{{ $location->id }},
            icon: "{{ Theme::url('img/ico/favicon.png') }}"
        });
        @endforeach
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBpvcV4WyemrP7OUfrDuXTkEaazIzwqe1U&callback=initMap&language={{ locale() }}"></script>
<script>
    jQuery(document).ready(function () {
        var address_grid = $('.address-grid').owlCarousel({
            loop: false,
            nav: false,
            dots: false,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplaySpeed: 1000,
            lazyLoad: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });
        $(".address-grid-navigation .prev").click(function () {
            address_grid.trigger('prev.owl.carousel');
        });

        $(".address-grid-navigation .next").click(function () {
            address_grid.trigger('next.owl.carousel');
        });
    });
</script>
@endpush