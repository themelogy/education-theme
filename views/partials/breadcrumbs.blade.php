@if ($breadcrumbs)
    <ol class="breadcrumb">
        <li><a href="{{ route('homepage') }}"><i class="fa fa-home font-10"></i></a></li>
        @foreach ($breadcrumbs as $crumb)
            <?php
            $icon = isset($crumb->icon) ? '<i class="' . $crumb->icon . '"></i> ' : '';
            ?>

            @if ($crumb->url && ! $crumb->last)
                <li>
                    <a href="{{ $crumb->url }}">{!! $icon !!}{!! $crumb->title !!}</a>
                </li>
            @else
                <li>{!! $icon !!}{!! $crumb->title !!}</li>
            @endif
        @endforeach
    </ol>
@endif