@php
$active = $children->contains(function($value, $key){
    return $value->slug == Request::segment(2);
});
@endphp
<li{{ $active ? ' class=active' : '' }}>
    <a href="{{ $page->url }}">{{ $page->title }}</a>
    <a href="#"
       class="toggle-custom"
       id="btn-4"
       data-toggle="collapse"
       data-target="#submenu{{ $page->id }}"
       aria-expanded="{{ $active ? 'true' : 'false' }}">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
    </a>
    <ul class="collapse{{ $active ? ' in' : '' }}" id="submenu{{ $page->id }}" role="menu" aria-labelledby="btn-1">
        @foreach($children as $child)
            @if(isset($child->settings->show_sidebar))
                @php
                    $child_active = $children->contains(function($value) use ($child){
                        return Request::segment(2) == $child->slug;
                    });
                @endphp
            <li{{ $child_active ? ' class=active' : '' }}><a href="{{ $child->url }}">{{ $child->title }}</a></li>
            @endif
        @endforeach
    </ul>
</li>
