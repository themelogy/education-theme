<div class="widget widget_categories_page m-bot-20 z-depth-2">
    <h2 class="title font-16 bold-700 uppercase">{{ $page->title }}</h2>
    <ul class="list-group">
        @foreach($children as $child)
            @if($child->settings->show_sidebar ?? false)
                @php $sub_children = $child->children()->orderBy('position', 'asc')->get()->where('settings.show_sidebar', 1) @endphp
                @if($sub_children->count()>0)
                    @findChildren($child, 'sidebar.sub-menu')
                @else
                    <li{{ Request::segment(2) == $child->slug ? ' class=active' : '' }}><a href="{{ $child->url }}">{{ $child->title }}</a></li>
                @endif
            @endif
        @endforeach
    </ul>
</div>

@if(isset($page->settings))
    @push('css_inline')
        <style>
            .page-title.page-title-bg-overlay .title-bg .overlay.background::before {
                background: {{ $page->settings->title_bg_color ?? null }} !important;
            }
            .section-page .left-side .title {
                background: {{ $page->settings->menu_bg_color ?? null }} !important;
                border-color: {{ $page->settings->menu_bg_color ?? null }} !important;
                color: {{ $page->settings->menu_title_color ?? null }} !important;
            }
            .widget_categories_page {
                background: {{ $page->settings->menu_text_bg_color ?? null}} !important;
                border-color: {{ $page->settings->menu_border_color ?? null }} !important;
            }
            .widget_categories_page a {
                color: {{ $page->settings->menu_text_color ?? null }} !important;
            }
            .widget_categories_page li, .widget_categories_page li:before {
                border-color: {{ $page->settings->menu_border_color ?? null }} !important;
                color: {{ $page->settings->menu_text_color ?? null }} !important;
            }
            .widget_categories_page li:hover:before {
                color: {{ $page->settings->menu_text_hover ?? null }} !important;
            }
            .widget_categories_page a:hover {
                color: {{ $page->settings->menu_text_hover ?? null }} !important;
            }
            .widget_categories_page ul > li.active > a, .widget_categories_page ul > li.active:before {
                color: {{ $page->settings->menu_text_hover ?? null }} !important;
            }
        </style>
    @endpush
@endif
