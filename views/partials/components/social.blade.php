@if(isset($class))
<ul class="{{ $class }}">
    @if(setting('theme::facebook'))<li><a target="_blank" href="{{ setting('theme::facebook') }}"><i class="fa fa-facebook"></i></a></li>@endif
    @if(setting('theme::twitter'))<li><a target="_blank" href="{{ setting('theme::twitter') }}"><i class="fa fa-twitter"></i></a></li>@endif
    @if(setting('theme::google'))<li><a target="_blank" href="{{ setting('theme::google') }}"><i class="fa fa-google-plus"></i></a></li>@endif
    @if(setting('theme::linkedin'))<li><a target="_blank" href="{{ setting('theme::linkedin') }}"><i class="fa fa-linkedin"></i></a></li>@endif
    @if(setting('theme::pinterest'))<li><a target="_blank" href="{{ setting('theme::pinterest') }}"><i class="fa fa-pinterest"></i></a></li>@endif
    @if(setting('theme::instagram'))<li><a target="_blank" href="{{ setting('theme::instagram') }}"><i class="fa fa-instagram"></i></a></li>@endif
    @if(setting('theme::youtube'))<li><a target="_blank" href="{{ setting('theme::youtube') }}"><i class="fa fa-youtube"></i></a></li>@endif
    @if(setting('theme::rss'))<li><a target="_blank" href="{{ setting('theme::rss') }}"><i class="fa fa-rss"></i></a></li>@endif
</ul>
@endif