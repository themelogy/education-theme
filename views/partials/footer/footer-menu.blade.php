@if(isset($name))
    @if($menu = $menu->where('name', $name)->first())
    <h2 class="white-text"><i class="fa fa-{{ isset($icon) ? $icon : null }} m-rgt-5" aria-hidden="true"></i> {{ $menu->title }}</h2>
    {!! Menu::render($menu->name, \Themes\Education\Presenter\FooterMenuLinksPresenter::class) !!}
    @endif
@endif