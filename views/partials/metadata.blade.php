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

{!! Theme::style("css/all.min.css?v=".Carbon::now()->format('dmY')) !!}

    <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->