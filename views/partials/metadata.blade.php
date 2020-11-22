{!! seo_helper()->render() !!}
<meta id="token" name="token" content="{{ csrf_token() }}" />
@if($currentUser)
<meta id="authorization" name="authorization" content="{{ $currentUser->getFirstApiKey() }}" />
@endif

<!--  favicon -->
<link rel="shortcut icon" href="{{ Theme::url('img/ico/favicon.png') }}">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ Theme::url('img/ico/apple-touch-icon-144-precomposed.png') }}">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ Theme::url('img/ico/apple-touch-icon-72-precomposed.png') }}">
<link rel="apple-touch-icon-precomposed" href="{{ Theme::url('img/ico/apple-touch-icon-57-precomposed.png') }}">

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TGP25CM');</script>
<!-- End Google Tag Manager -->

<script async>
    WebFontConfig = { google: {
            families: ['Roboto:400,300,100,500,700:latin-ext', 'Great Vibes'
            ]
        }};
    (function(d) {
        var wf = d.createElement('script'), s = d.scripts[0];
        wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';
        wf.async = true;
        s.parentNode.insertBefore(wf, s);
    })(document);
</script>

@if(env('APP_ENV')=="local")
    {!! Theme::style("fonts/iconfont/material-icons.css") !!}
    @push('styles')
    {!! Theme::style("css/font-awesome.css") !!}
    @endpush
    {!! Theme::style("css/vendors/magnific-popup/magnific-popup.css") !!}

    {!! Theme::style("css/vendors/owl.carousel/assets/owl.carousel.css") !!}
    {!! Theme::style("css/vendors/owl.carousel/assets/owl.theme.default.min.css") !!}

    {!! Theme::style("css/vendors/flexSlider/flexslider.css") !!}
    {!! Theme::style("css/flag-icon-css/css/flag-icon.min.css") !!}

    {!! Theme::style("css/materialize.css") !!}
    {!! Theme::style("css/bootstrap.css") !!}
    {!! Theme::style("css/style.css?v=3") !!}
@else
    {!! Theme::style("css/all.min.css?v=160") !!}
@endif

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '1990717361001684');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=1990717361001684&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-132350117-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-132350117-2');
</script>