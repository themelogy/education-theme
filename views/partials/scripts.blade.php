@stack('styles')
@stack('css_inline');
<!-- jQuery -->
{!! Theme::script("js/jquery.min.js") !!}
{!! Theme::script("js/bootstrap.min.js") !!}
{!! Theme::script("js/materialize.min.js") !!}
{!! Theme::script("js/vendors/jquery.easing.min.js") !!}
{!! Theme::script("js/vendors/smoothscroll.min.js") !!}
{!! Theme::script("js/vendors/bootstrap-tabcollapse.min.js") !!}
{!! Theme::script("js/vendors/owl.carousel/owl.carousel.min.js") !!}
{!! Theme::script("js/vendors/jquery.inview.min.js") !!}
{!! Theme::script("js/vendors/jquery.countTo.min.js") !!}
{!! Theme::script("js/vendors/imagesloaded.js") !!}
{!! Theme::script("js/vendors/jquery.shuffle.min.js") !!}
{!! Theme::script("js/vendors/jquery.stellar.min.js") !!}
{!! Theme::script("js/vendors/magnific-popup/jquery.magnific-popup.min.js") !!}
@stack('scripts')
{!! Theme::script("js/scripts.js") !!}
@stack('js_inline')

@include('partials.analytics')