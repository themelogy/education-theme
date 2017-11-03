<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}">
<head>
@include('partials.metadata')
</head>

<body id="top" class="has-header-search">

@include('partials.header')

@yield('content')

@include('partials.footer')

@include('partials.scripts')

@include('partials.p-notify')

@include('partials.components.popup')
</body>

</html>