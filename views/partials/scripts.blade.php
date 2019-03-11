<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PHW8Q32"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<noscript id="deferred-styles">
@stack('styles')
</noscript>

@stack('css_inline')
<!-- jQuery -->
{!! Theme::script("js/jquery.min.js") !!}
{!! Theme::script("js/bootstrap.min.js", ['defer']) !!}
{!! Theme::script("js/materialize.min.js", ['defer']) !!}
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/unveil/1.3.0/jquery.unveil.min.js"></script>
<script>
$(document).ready(function() {
  $("img").unveil();
});
</script>
@stack('scripts')
{!! Theme::script("js/scripts.js") !!}
<script async>
    var loadDeferredStyles = function() {
        var addStylesNode = document.getElementById("deferred-styles");
        var replacement = document.createElement("div");
        replacement.innerHTML = addStylesNode.textContent;
        document.body.appendChild(replacement)
        addStylesNode.parentElement.removeChild(addStylesNode);
    };
    var raf = window.requestAnimationFrame || window.mozRequestAnimationFrame ||
        window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;
    if (raf) raf(function() { window.setTimeout(loadDeferredStyles, 0); });
    else window.addEventListener('load', loadDeferredStyles);
</script>
@stack('js_inline')

@include('partials.analytics')