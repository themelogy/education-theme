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
    {!! Theme::style("css/all.min.css?v=159") !!}
@endif

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-98121507-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-98121507-3');
</script>