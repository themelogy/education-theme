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

{!! Theme::style("plugins/iconfont/material-icons.css") !!}
<link rel="stylesheet" href="{{ mix('/themes/education/vendor/font-awesome/css/font-awesome.css') }}">
{!! Theme::style("vendor/magnific-popup/magnific-popup.css") !!}
{!! Theme::style("plugins/owl.carousel/assets/owl.carousel.min.css") !!}
{!! Theme::style("plugins/owl.carousel/assets/owl.theme.default.min.css") !!}
{!! Theme::style("vendor/flexslider/css/flexslider-rtl-min.css") !!}
{!! Theme::style("vendor/flag-icon-css/css/flag-icon.min.css") !!}
<link rel="stylesheet" href="{{ mix('/themes/education/vendor/materialize-css/css/materialize.css') }}">
<link rel="stylesheet" href="{{ mix('/themes/education/vendor/bootstrap/css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ mix('/themes/education/vendor/animate/css/animate.css') }}">
<link rel="stylesheet" href="{{ mix('/themes/education/css/style.css') }}">

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

@includeIf("partials.header.analytics")