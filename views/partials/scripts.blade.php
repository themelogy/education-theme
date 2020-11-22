<noscript id="deferred-styles">
@stack('styles')
</noscript>

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


<script type="text/javascript">
var LHCChatOptions = {};
LHCChatOptions.opt = {widget_height:340,widget_width:300,popup_height:520,popup_width:500};
(function() {
var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
var referrer = (document.referrer) ? encodeURIComponent(document.referrer.substr(document.referrer.indexOf('://')+1)) : '';
var location  = (document.location) ? encodeURIComponent(window.location.href.substring(window.location.protocol.length)) : '';
po.src = '//destek.jaletezer.k12.tr/index.php/tur/chat/getstatus/(click)/internal/(position)/bottom_right/(ma)/br/(top)/350/(units)/pixels/(leaveamessage)/true?r='+referrer+'&l='+location;
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
})();
</script>

<style>
@media only screen and (max-width: 640px) {
    #lhc_status_container {
        position: fixed;
        top: inherit;
        right: 0;
        bottom: 0;
        left: 0;
        width: 100%;
        border-radius: 2px;
        box-shadow: none;
        border: 1px solid #cfcfcf;
        margin-bottom: 0;
    }
}
@media screen and (max-width: 768px) {
    .has-header-search .menuzord-responsive .showhide {
        margin-right: 0 !important;
    }
}
</style>