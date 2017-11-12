@if($parent)
    <div class="widget widget_categories_page m-bot-20 z-depth-2">
        <h2 class="title font-16 bold-700 uppercase">{{ $parent->title }}</h2>
        @php $children = $parent->children()->orderBy('position', 'asc')->get()->where('settings.show_sidebar', 1) @endphp
        @if(count($children)>0)
            <ul class="list-group">
                @foreach($children as $child)
                    @php $sub_children = $child->children()->orderBy('position', 'asc')->get()->where('settings.show_sidebar', 1) @endphp
                    @if(count($sub_children)>0)
                        <li{{ Request::segment(3) == $child->slug ? ' class=active' : '' }}>
                            <a href="{{ $child->url }}">{{ $child->title }}</a>
                            <a href="#"
                               class="toggle-custom"
                               id="btn-4"
                               data-toggle="collapse"
                               data-target="#submenu{{ $child->id }}"
                               aria-expanded="{{ Request::segment(3) == $child->slug ? 'true' : 'false' }}">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </a>
                            <ul class="collapse{{ Request::segment(3) == $child->slug ? ' in' : '' }}" id="submenu{{ $child->id }}" role="menu" aria-labelledby="btn-1">
                                @foreach($sub_children as $sub_child)
                                    <li{{ Request::segment(4) == $sub_child->slug ? ' class=active' : '' }}><a href="{{ $sub_child->url }}">{{ $sub_child->title }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @else
                        <li{{ Request::segment(3) == $child->slug ? ' class=active' : '' }}><a href="{{ $child->url }}">{{ $child->title }}</a></li>
                    @endif
                @endforeach
            </ul>
        @endif
    </div>
@endif

@push('js_inline')
<script>
    jQuery(document).ready(function () {
        var $body = $(document.body);
        var navHeight = $('header').outerHeight(true) + 10;
        $('.widget_categories_page').affix({
            offset: {
                top: navHeight,
                bottom: $('footer').outerHeight(true) + 300
            }
        });
        $body.scrollspy({
            target: '.left-side',
            offset: navHeight
        });
    });
</script>
@endpush

@if(isset($parent->settings))
    @push('css_inline')
    <style>
        .page-title.page-title-bg-overlay .title-bg .overlay.background::before {
            background: {{ $parent->settings->title_bg_color or null }} !important;
        }
        .section-page .left-side .title {
            background: {{ $parent->settings->menu_bg_color or null }} !important;
            border-color: {{ $parent->settings->menu_bg_color or null }} !important;
            color: {{ $parent->settings->menu_title_color or null }} !important;
        }
        .widget_categories_page {
            background: {{ $parent->settings->menu_text_bg_color or null}} !important;
            border-color: {{ $parent->settings->menu_border_color or null }} !important;
        }
        .widget_categories_page a {
            color: {{ $parent->settings->menu_text_color or null }} !important;
        }
        .widget_categories_page li, .widget_categories_page li:before {
            border-color: {{ $parent->settings->menu_border_color or null }} !important;
            color: {{ $parent->settings->menu_text_color or null }} !important;
        }
        .widget_categories_page li:hover:before {
            color: {{ $parent->settings->menu_text_hover or null }} !important;
        }
        .widget_categories_page a:hover {
            color: {{ $parent->settings->menu_text_hover or null }} !important;
        }
        .widget_categories_page ul > li.active > a, .widget_categories_page ul > li.active:before {
            color: {{ $parent->settings->menu_text_hover or null }} !important;
        }
    </style>
    @endpush
@endif