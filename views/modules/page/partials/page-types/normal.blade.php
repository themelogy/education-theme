@php
    if(request()->has('password')) {
        $password = request()->get('password');
        $isLogin = false;
        \Request::session()->put("page_{$page->id}", $password);
    }
    $sessPassword = session("page_{$page->id}");
    $loginPassword = isset($page->settings->password) ? $page->settings->password : '';
    if($sessPassword == $loginPassword) {
        $isLogin = true;
    } else {
        $isLogin = isset($page->settings->password) ? $currentUser ? true : false : true;
        if(request()->has('password')) {
            $errorMsg = 'Şifreyi yanlış girdiniz!';
        }
    }
@endphp

<div class="col-md-12">
    @if($isLogin == true)
        @if($page->settings->list_page ?? false)
            @include('page::partials.page.list', ['type'=>$page->settings->list_type])
        @else
            <div class="content md-padding-40 text-justify">
                {!! $page->body !!}
                @includeWhen($page->settings->image_gallery ?? false, 'page::widgets.page.gallery')
            </div>
        @endif
    @else
        @include('page::partials.components.password-form')
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="padding-40 p-top-0 p-bot-0">
                @pageTags($page, 10, 'page.tags')
                @includeIf('partials.components.share')
            </div>
        </div>
    </div>
</div>
