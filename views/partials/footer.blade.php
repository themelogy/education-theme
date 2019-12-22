<footer class="footer footer-one">
    <div class="primary-footer" style="padding: 40px 30px;">
        <div class="overlay"></div>
        <div class="container-fluid">
            <a href="#top" class="page-scroll btn-floating btn-large back-top waves-effect waves-light tt-animate btt" data-section="#top">
                <i class="material-icons dark-text">&#xE316;</i>
            </a>
            <div class="row">
                <div class="col-md-3 widget">
                    <div class="footer-logo">
                        <img src="{{ Theme::url('img/logos/logo3-white.svg?v=1') }}" alt="" style="width: 100%;"/>
                    </div>
                    @include('partials.components.social', ['class'=>'social-link tt-animate ltr text-left m-top-10'])
                    <p style="font-size: 0.8em; line-height: 1.5em; text-align: justify;">{!! strip_tags(Block::get('footer-intro')) !!}</p>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        @php $menu = app(\Modules\Menu\Repositories\MenuRepository::class)->all() @endphp
                        <div class="col-md-3 widget">
                            @include('partials.footer.footer-menu', ['name'=>'kurumsal', 'icon'=>'building', 'menu'=>$menu])
                        </div>
                        <div class="col-md-3 widget">
                            @include('partials.footer.footer-menu', ['name'=>'kayit', 'icon'=>'user-plus', 'menu'=>$menu])
                            @include('partials.footer.footer-menu-prefixed', ['name'=>'akademik', 'icon'=>'graduation-cap', 'menu'=>$menu])
                        </div>
                        <div class="col-md-3 widget">
                            @include('partials.footer.footer-menu', ['name'=>'alt-hizli-menu', 'icon'=>'bars', 'menu'=>$menu])
                        </div>
                        <div class="col-md-3 widget">
                            <h2 class="white-text"><i class="fa fa-map-marker m-rgt-5" aria-hidden="true"></i> İLETİŞİM</h2>
                            <div class="address carousel vertical slide p-bot-20 address-ticker">
                                @foreach(app('locations') as $location)
                                <div class="item @if($loop->first)active @endif">
                                    <h6>{{ $location->name }}</h6>
                                    <ul>
                                        @if($location->address)
                                            <li style="line-height: 1.75rem;"><i class="fa fa-map-marker"></i> {{ $location->present()->address }}</li>
                                        @endif
                                        @if($location->phone1)
                                            <li><i class="fa fa-phone"></i> {{ $location->phone1 }}</li>
                                        @endif
                                        @if($location->phone2)
                                            <li><i class="fa"></i> {{ $location->phone2 }}</li>
                                        @endif
                                        @if($location->email)
                                            <li><i class="fa fa-envelope"></i> {{ $location->email }}</li>
                                        @endif
                                    </ul>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="secondary-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    {!! trans('themes::theme.footer.copyrights', ['date'=> Carbon::now()->format('Y'), 'company'=>setting('theme::company-name'), 'url'=>url(locale())]) !!}
                </div>
                <div class="col-md-6">
                    @include('partials.components.social', ['class'=>'social-link tt-animate ltr md-text-right xs-text-center'])
                </div>
            </div>
        </div>
    </div>
</footer>

<div id="preloader">
    <div class="preloader-position">
        <img src="{{ Theme::url('img/logos/logo3.svg') }}" height="100" alt="logo">
        <div class="progress">
            <div class="indeterminate"></div>
        </div>
    </div>
</div>

@includeIf('core::cookie-law'))