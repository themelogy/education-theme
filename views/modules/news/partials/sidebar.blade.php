<div class="tt-sidebar-wrapper" role="complementary">
    @if(setting('news::search'))
        <div class="widget widget_search">
            <form role="search" method="get" class="search-form">
                <input type="text" class="form-control" value="" name="s" id="s"
                       placeholder="Write any keywords">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    @endif
    <div class="widget widget_categories">
        <h3 class="widget-title uppercase">{{ trans('news::category.title.category') }}</h3>
        <ul>
            @foreach(app(\Modules\News\Repositories\CategoryRepository::class)->all() as $category)
                <li><a href="{{ $category->url }}">{{ $category->name }}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="widget widget_tt_popular_post">
        <div class="tt-popular-post border-bottom-tab">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#tt-popular-post-tab1" data-toggle="tab"
                       aria-expanded="true">Duyurular</a>
                </li>
                <li class="">
                    <a href="#tt-popular-post-tab2" data-toggle="tab"
                       aria-expanded="false">{{ trans('themes::news.recent posts') }}</a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="tt-popular-post-tab1" class="tab-pane fade active in">
                    @foreach(NewsCategory::findBySlug('duyuru')->posts()->get() as $latest)
                        <div class="media">
                            <a class="media-left" href="#">
                                <img src="{{ $latest->present()->firstImage(50,50,'fit',50) }}" alt="{{ $latest->title }}">
                            </a>

                            <div class="media-body">
                                <h4><a href="{{ $latest->url }}">{{ $latest->title }}</a>
                                </h4>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div id="tt-popular-post-tab2" class="tab-pane fade">

                    @foreach(News::popular(5) as $popular)
                        <div class="media">
                            <a class="media-left" href="#">
                                <img src="{{ $popular->present()->firstImage(50,50,'fit',50) }}" alt="{{ $popular->title }}">
                            </a>

                            <div class="media-body">
                                <h4><a href="{{ $popular->url }}">{{ $popular->title }}</a>
                                </h4>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>