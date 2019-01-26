<div id="share"></div>
@push('js_inline')
    {!! Theme::script('vendor/jssocials/jssocials.min.js') !!}
    {!! Theme::style('vendor/jssocials/jssocials.css') !!}
    {!! Theme::style('vendor/jssocials/jssocials-theme-classic.css') !!}
    <script>
        $("#share").jsSocials({
            shareIn: "popup",
            showLabel: false,
            showCount: "inside",
            shares: ["twitter", "facebook", "googleplus", "linkedin", "pinterest", "stumbleupon", "whatsapp"]
        });
    </script>
@endpush
