@php
    if(isset($page)) {
        $popup = collect(app(\Modules\Popup\Repositories\PopupRepository::class)->getPopups($page->template));
        $popup = $popup->filter(function($value, $key) {
            return isset($value->settings->show_session) ? Auth::check() : true;
        })->first();
    }
    if(!isset($popup)) {
        $popup = collect(app(\Modules\Popup\Repositories\PopupRepository::class)->getPopups());
        $popup = $popup->filter(function($value, $key) {
            return isset($value->settings->show_session) ? Auth::check() : true;
        })->first();
    }
@endphp
@if(isset($popup))
    @include('popup::popup', ['popup'=>$popup])
@endif