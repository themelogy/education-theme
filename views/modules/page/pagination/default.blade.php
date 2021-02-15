@if ($paginator->hasPages())
    <ul class="pagination post-pagination text-center">
        <!-- Previous Page Link -->
        @if ($paginator->onFirstPage())
            <li class="disabled hide">&laquo;</li>
        @else
            <li><a class="waves-effect waves-light" href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="fa fa-angle-left"></i></a></li>
        @endif

{{--    <!-- Pagination Elements -->--}}
{{--        @foreach ($elements as $element)--}}
{{--        <!-- "Three Dots" Separator -->--}}
{{--            @if (is_string($element))--}}
{{--                <li class="disabled">{{ $element }}</li>--}}
{{--            @endif--}}

{{--        <!-- Array Of Links -->--}}
{{--            @if (is_array($element))--}}
{{--                @foreach ($element as $page => $url)--}}
{{--                    @if ($page == $paginator->currentPage())--}}
{{--                        <li><span class="current waves-effect waves-light">{{ $page }}</span></li>--}}
{{--                    @else--}}
{{--                        <li><a class="waves-effect waves-light" href="{{ $url }}">{{ $page }}</a></li>--}}
{{--                    @endif--}}
{{--                @endforeach--}}
{{--            @endif--}}
{{--        @endforeach--}}
        <li><span class="">{{ $paginator->currentPage() }} / {{ $paginator->lastPage() }}</span></li>

    <!-- Next Page Link -->
        @if ($paginator->hasMorePages())
            <li><a class="waves-effect waves-light" href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="fa fa-angle-right"></i></a></li>
        @else
            <li class="disabled hide">&raquo;</li>
        @endif
    </ul>
@endif
