<div class="top-bar visible-lg visible-sm">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-left">
                {{-- @newsFindByCategory('duyuru', 6, 'annoucements') --}}
            </div>
            <div class="col-md-6 text-right">
                @if($currentUser)
                    <div class="quick-menu">
                        <a class="dropdown-button btn bold-500 waves-effect waves-light"
                           href="#" data-activates="user"
                           data-hover="true"
                           data-constrainWidth="false"
                           data-alignment="left"
                           data-belowOrigin="true" style="margin-right: -1px;">
                            <i class="fa fa-user m-rgt-10"></i> {{ trans('user::users.my account') }} <i class="fa fa-angle-down m-lft-5"></i>
                        </a>
                        <ul id="user" class="dropdown-content">
                            @if($currentUser->hasAccess('dashboard.index'))
                                <li><a href="{{ route('dashboard.index') }}">{{ trans('dashboard::dashboard.name') }}</a></li>
                            @endif
                            <li><a href="{{ route('hr.application.form') }}">{{ trans('hr::hr.title.hr') }}</a></li>
                            <li><a href="{{ route('logout') }}">{{ trans('core::core.general.sign out') }}</a></li>
                        </ul>
                    </div>
                @else
                    <div class="top-social">
                        @include('partials.components.social', ['class'=>'list-inline social-top tt-animate btt m-rgt-10'])
                    </div>
                @endif
                @if(count(LaravelLocalization::getSupportedLocales())>1)
                <div class="quick-menu">
                    <a class="dropdown-button btn bold-500 waves-effect waves-light"
                       href="#" data-activates="language"
                       data-hover="true"
                       data-constrainWidth="true"
                       data-alignment="left"
                       data-belowOrigin="true" style="margin-right: -1px;">
                        <span class="flag-icon flag-icon-{{ LaravelLocalization::getCurrentLocale() == "en" ? "gb" : LaravelLocalization::getCurrentLocale() }} m-rgt-10"></span> {{ LaravelLocalization::getCurrentLocaleNative() }} <i class="fa fa-angle-down m-lft-5"></i>
                    </a>
                    <ul id="language" class="dropdown-content">
                        @foreach(LaravelLocalization::getSupportedLocales() as $locale => $supportedLocale)
                            <li @if($locale==LaravelLocalization::getCurrentLocale()) class="active" @endif>
                                <a rel="alternate" hreflang="{!! $locale !!}" href="{{ LaravelLocalization::getLocalizedURL($locale, route('homepage')) }}" class="font-14">
                                    <span class="flag-icon flag-icon-{{ $locale == "en" ? "gb" : $locale }} m-rgt-10"></span>
                                    {!! mb_strtoupper($supportedLocale['native']) !!}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @inject("menu", "\Modules\Menu\Services\MenuService")
                <div class="quick-menu">
                    <a class="dropdown-button btn bold-500 waves-effect waves-light"
                       href="#"
                       data-activates="quick-menu"
                       data-hover="true"
                       data-constrainWidth="false"
                       data-alignment="right"
                       data-belowOrigin="true">
                        <i class="fa fa-bars m-rgt-10"></i> {{ $menu->title("ust-hizli-erisim") }} <i class="fa fa-angle-down m-lft-5"></i>
                    </a>
                    {!! Menu::render("ust-hizli-erisim", \Themes\Education\Presenter\TopMenuPresenter::class) !!}
                </div>
            </div>
        </div>
    </div>
</div>
