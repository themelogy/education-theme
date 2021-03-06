<div class="widget widget_categories_page">
<a style="display: block; text-align: left; padding: 15px 20px;" class="title play-1 waves-effect waves-light btn mt-30" href="{{ $page->settings->video ?? '' }}"><i class="fa fa-play"></i>&nbsp; {{ trans('themes::theme.buttons.video') }}</a>
</div>

@push('scripts')
    {!! Theme::style('vendor/youtubeurl/jquery.yu2fvl.css') !!}
    {!! Theme::script('vendor/youtubeurl/jquery.yu2fvl.min.js') !!}
@endpush

@push('js_inline')
    <script> jQuery('.play-1').yu2fvl({minPaddingX: 200, minPaddingY: 200}); </script>
@endpush
