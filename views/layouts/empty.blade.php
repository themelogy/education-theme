<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}">
<head>
    @include('partials.metadata')
</head>

<body id="top" class="has-header-search">

@yield('content')

@include('partials.scripts')

@include('partials.components.popup')
</body>

</html>