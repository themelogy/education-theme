<div class="top-bar visible-lg visible-sm">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-left">
                @if($topNews = NewsCategory::findBySlug('duyuru')->load('posts', 'translations'))
                    <div id="carousel-ticker" class="carousel vertical slide carousel-ticker" data-ride="carousel" data-interval="5000">
                        <div class="carousel-inner" role="listbox">
                            @foreach($topNews->posts()->where('status', 2)->get() as $topNew)
                                <div class="item @if($loop->first)active @endif">
                                    <p class="ticker-headline">
                                        <a href="{{ $topNew->url }}">
                                            <strong><i class="fa fa-bullhorn" aria-hidden="true"></i></strong>
                                            {{ $topNew->title }}
                                        </a>
                                    </p>
                                </div>
                            @endforeach
                        </div>

                        <!-- Controls -->
                        <a class="up carousel-control" href="#carousel-ticker" role="button" data-slide="prev">
                            <span class="fa fa-angle-up" aria-hidden="true"></span>
                            <span class="sr-only">{{ trans('global.buttons.next') }}</span>
                        </a>
                        <a class="down carousel-control" href="#carousel-ticker" role="button" data-slide="next">
                            <span class="fa fa-angle-down" aria-hidden="true"></span>
                            <span class="sr-only">{{ trans('global.buttons.previous') }}</span>
                        </a>
                    </div>
                @endif
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
                <div class="quick-menu">
                    <a class="dropdown-button btn bold-500 waves-effect waves-light"
                       href="#" data-activates="language"
                       data-hover="true"
                       data-constrainWidth="true"
                       data-alignment="left"
                       data-belowOrigin="true" style="margin-right: -1px;">
                        <span class="flag-icon flag-icon-{{ LaravelLocalization::getCurrentLocale() == "en" ? "us" : LaravelLocalization::getCurrentLocale() }} m-rgt-10"></span> {{ LaravelLocalization::getCurrentLocaleNative() }} <i class="fa fa-angle-down m-lft-5"></i>
                    </a>
                    <ul id="language" class="dropdown-content">
                        @foreach(LaravelLocalization::getSupportedLocales() as $locale => $supportedLocale)
                            <li @if($locale==LaravelLocalization::getCurrentLocale()) class="active" @endif>
                                @php
                                    switch (Request::route()->getName()) {
                                        case 'page' && isset($page):
                                        $url = $page->present()->url($locale);
                                        break;
                                        case 'news.slug' && isset($post):
                                        case 'blog.slug' && isset($post):
                                        $url = $post->present()->url($locale);
                                        break;
                                        case 'news.category' && isset($category):
                                        case 'blog.category' && isset($category):
                                        case 'store.category.slug' && isset($category):
                                        $url = $category->present()->url($locale);
                                        break;
                                        case 'store.product.slug' && isset($product):
                                        $url = $product->present()->url($locale);
                                        break;
                                        case 'employee.view' && isset($employee):
                                        $url = $employee->present()->url($locale);
                                        break;
                                        default:
                                        $url = null;
                                        break;
                                    }
                                    $localizedUrl = LaravelLocalization::getLocalizedURL($locale, $url);
                                @endphp
                                <a rel="alternate" hreflang="{!! $locale !!}" href="{{ $localizedUrl }}" class="font-14">
                                    <span class="flag-icon flag-icon-{{ $locale == "en" ? "gb" : $locale }} m-rgt-10"></span>
                                    {!! mb_strtoupper($supportedLocale['native']) !!}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                @if($menu = app(\Modules\Menu\Repositories\MenuRepository::class)->findBySlug('ust-hizli-erisim'))
                    <div class="quick-menu">
                        <a class="dropdown-button btn bold-500 waves-effect waves-light"
                           href="#"
                           data-activates="quick-menu"
                           data-hover="true"
                           data-constrainWidth="false"
                           data-alignment="right"
                           data-belowOrigin="true">
                            <i class="fa fa-bars m-rgt-10"></i> {{ $menu->title }} <i class="fa fa-angle-down m-lft-5"></i>
                        </a>
                        {!! Menu::render($menu->name, \Themes\Education\Presenter\TopMenuPresenter::class) !!}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
