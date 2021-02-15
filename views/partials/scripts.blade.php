@stack('styles')

@stack('css_inline')
<!-- jQuery -->
{!! Theme::script("js/jquery.min.js") !!}
{!! Theme::script("vendor/bootstrap/js/bootstrap.min.js") !!}
{!! Theme::script("vendor/materialize-css/js/materialize.min.js") !!}
{!! Theme::script("vendor/jquery.easing.min.js") !!}
{!! Theme::script("vendor/smoothscroll.min.js") !!}
{!! Theme::script("vendor/bootstrap-tabcollapse.js") !!}
{!! Theme::script("plugins/owl.carousel/owl.carousel.min.js") !!}
{!! Theme::script("vendor/jquery.inview.min.js") !!}
{!! Theme::script("vendor/jquery.countTo.js") !!}
{!! Theme::script("vendor/imagesloaded.pkgd.min.js") !!}
{!! Theme::script("plugins/jquery.shuffle.min.js") !!}
{!! Theme::script("vendor/jquery.stellar.js") !!}
{!! Theme::script("vendor/magnific-popup/jquery.magnific-popup.min.js") !!}
{!! Theme::script("vendor/jquery.lazy.min.js") !!}

@stack('scripts')
<script src="{{ mix("/themes/education/js/scripts.min.js") }}"></script>
@stack('js_inline')

@includeIf('partials.chat')