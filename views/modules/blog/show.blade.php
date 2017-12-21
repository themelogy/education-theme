@extends('news::layout.show')

@section('news_title')
    @component('partials.components.page-title', ['breadcrumb'=>'news.show'])
        {{ $post->title }}
    @endcomponent
@endsection

@section('news_content')
    <div class="row">
        <div class="posts-content single-post">
            <article class="post-wrapper">
                <header class="entry-header-wrapper clearfix">
                    <div class="entry-header">
                        <h2 class="entry-title">{{ $post->title }}</h2>
                        <div class="entry-meta">
                            <ul class="list-inline">
                                <li>
                                    <i class="fa fa-user"></i><a href="{{ $post->category->url }}">{{ $post->category->name }}</a>
                                </li>
                                <li>
                                    <i class="fa fa-clock-o"></i><a href="#">{{ $post->created_at->formatLocalized('%d %B %Y') }}</a>
                                </li>
                                <li>
                                    <i class="fa fa-comment-o"></i><a href="#">0</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </header>
                <div class="entry-content">
                    @if($image = $post->present()->firstImage(250, null, 'resize', 50))
                        <a href="{{ $post->present()->firstImage(600, null, 'resize', 50) }}" data-lightbox="image-1" data-title="{{ $post->title }}">
                            <img src="{{ $image }}" alt="{{ $post->title }}" style="margin:0 20px 20px 0; float:left;">
                        </a>
                    @endif

                    {!! $post->content !!}

                    @php $images = $post->present()->images(600, null,'resize',80); @endphp
                    @if(count($images)>1)
                            <div class="fotorama m-top-50"
                                 data-allowfullscreen="true"
                                 data-keyboard="true"
                                 data-width="700"
                                 data-maxwidth="100%"
                                 data-ratio="16/9"
                                 data-nav="thumbs">
                                @foreach($images as $image)
                                    <img src="{{ $image }}" alt="{{ $post->title }}" />
                                @endforeach
                            </div>
                            @push('js_inline')
                            {!! Theme::style('js/vendors/fotorama/fotorama.css') !!}
                            {!! Theme::script('js/vendors/fotorama/fotorama.js') !!}
                            @endpush
                    @endif

                    <div class="clearfix"></div>
                </div>
                <footer class="entry-footer">
                    <div class="post-tags">
                      <span class="tags-links">
                        <i class="fa fa-tags"></i>
                          @foreach($post->tags()->get() as $tag)
                              <a href="{{ route('news.tag', [$tag->slug]) }}">{{ $tag->name }} @if(!$loop->last),@endif</a>
                          @endforeach
                      </span>
                    </div>
                    <ul class="list-inline right share-post">
                        <li><a href="#"><i class="fa fa-facebook"></i> <span>Paylaş</span></a>
                        </li>
                        <li><a href="#"><i class="fa fa-twitter"></i> <span>Tweet</span></a>
                        </li>
                        <li><a href="#"><i class="fa fa-google-plus"></i> <span>Plus</span></a>
                        </li>
                    </ul>
                </footer>
            </article>

            <nav class="single-post-navigation" role="navigation">
                <div class="row">
                    <div class="col-xs-6">
                        @if($previous = $post->present()->previous)
                            <div class="previous-post-link">
                                <a class="waves-effect waves-light" href="{{ $previous->url }}"><i class="fa fa-long-arrow-left"></i>{{ trans('blog::post.button.previous') }}</a>
                            </div>
                        @endif
                    </div>
                    <div class="col-xs-6">
                        @if($next = $post->present()->next)
                            <div class="next-post-link">
                                <a class="waves-effect waves-light" href="{{ $next->url }}">{{ trans('blog::post.button.next') }}<i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        @endif
                    </div>
                </div>
            </nav>

        </div>
    </div>
@endsection