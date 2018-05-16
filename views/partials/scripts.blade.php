<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PHW8Q32"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

@stack('styles')
@stack('css_inline')
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

@if(Route::currentRouteName())
    <script type="text/javascript">
        var LHCChatOptions = {};
        LHCChatOptions.opt = {widget_height:340,widget_width:300,popup_height:520,popup_width:500,domain:'jaletezer.k12.tr'};
        (function() {
            var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
            var referrer = (document.referrer) ? encodeURIComponent(document.referrer.substr(document.referrer.indexOf('://')+1)) : '';
            var location  = (document.location) ? encodeURIComponent(window.location.href.substring(window.location.protocol.length)) : '';
            po.src = '//destek.jaletezer.k12.tr/index.php/tur/chat/getstatus/(click)/internal/(position)/bottom_right/(ma)/br/(hide_offline)/true/(top)/350/(units)/pixels/(leaveamessage)/true/(theme)/1?r='+referrer+'&l='+location;
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
        })();
    </script>
@endif