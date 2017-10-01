@if(isset($class))
<ul class="{{ $class }}">
    @if(setting('theme::facebook'))<li><a target="_blank" href="{{ setting('theme::facebook') }}"><i class="fa fa-facebook"></i></a></li>@endif
    @if(setting('theme::twitter'))<li><a target="_blank" href="{{ setting('theme::twitter') }}"><i class="fa fa-twitter"></i></a></li>@endif
    @if(setting('theme::tumblr'))<li><a target="_blank" href="{{ setting('theme::tumblr') }}"><i class="fa fa-tumblr"></i></a></li>@endif
    @if(setting('theme::linkedin'))<li><a target="_blank" href="{{ setting('theme::linkedin') }}"><i class="fa fa-linkedin"></i></a></li>@endif
    @if(setting('theme::dribbble'))<li><a target="_blank" href="{{ setting('theme::dribbble') }}"><i class="fa fa-dribbble"></i></a></li>@endif
    @if(setting('theme::instagram'))<li><a target="_blank" href="{{ setting('theme::instagram') }}"><i class="fa fa-instagram"></i></a></li>@endif
    @if(setting('theme::youtube'))<li><a target="_blank" href="{{ setting('theme::youtube') }}"><i class="fa fa-youtube"></i></a></li>@endif
    @if(setting('theme::rss'))<li><a target="_blank" href="{{ setting('theme::rss') }}"><i class="fa fa-rss"></i></a></li>@endif
</ul>
@endif