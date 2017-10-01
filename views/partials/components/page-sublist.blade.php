@if($parent)
    <div class="widget widget_categories m-bot-20 z-depth-2">
        <h2 class="title font-16 bold-700">{{ mb_strtoupper($parent->title) }}</h2>
        @php $children = $parent->children()->orderBy('position', 'asc')->get() @endphp
        @if(count($children)>0)
            <ul class="list-group">
                @foreach($children as $child)
                    @php $sub_children = $child->children()->orderBy('position', 'asc')->get() @endphp
                    @if(count($sub_children)>0)
                        <li>
                            <a href="{{ $child->url }}">{{ $child->title }}</a>
                            <a href="#"
                               class="toggle-custom"
                               id="btn-4"
                               data-toggle="collapse"
                               data-target="#submenu4"
                               aria-expanded="false">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </a>
                            <ul class="collapse" id="submenu4" role="menu" aria-labelledby="btn-1">
                                @foreach($sub_children as $sub_child)
                                    <li><a href="{{ $sub_child->url }}">{{ $sub_child->title }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @else
                        <li><a href="{{ $child->url }}">{{ $child->title }}</a></li>
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
        $('.widget_categories').affix({
            offset: {
                top: 245,
                bottom: $('footer').outerHeight(true) + 100
            }
        });
        $body.scrollspy({
            target: '.left-side',
            offset: navHeight
        });
    });
</script>
@endpush