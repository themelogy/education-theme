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
                            </ul>
                        </div>
                    </div>
                </header>

                <div class="entry-content">
                    @if(@$post->settings->show_image)
                    @php $images = $post->present()->images(600, null,'resize',80); @endphp

                    @if(count($images)==1)
                        @if($image = $post->present()->firstImage(250, null, 'resize', 50))
                            <a class="first-image" href="{{ $post->present()->firstImage(600, null, 'resize', 50) }}" data-lightbox="image-1" data-title="{{ $post->title }}">
                                <img src="{{ $image }}" alt="{{ $post->title }}" style="margin:0 20px 20px 0; float:left;">
                            </a>
                        @endif
                    @endif
                    @endif

                    {!! $post->content !!}

                    @if(@$post->settings->show_image)
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
                    @endif

                    <div class="clearfix"></div>
                </div>
                <br/>
                <footer class="entry-footer">
                    @if($tags = $post->tags()->get())
                    @if(count($tags)>0)
                    <div class="post-tags">
                      <span class="tags-links">
                        <i class="fa fa-tags"></i>
                          @foreach($tags as $tag)
                              <a href="{{ route('news.tag', [$tag->slug]) }}">{{ $tag->name }}
                                  @if(!$loop->last),@endif</a>
                          @endforeach
                      </span>
                    </div>
                    <br/>
                    <hr class="p-top-bot-10" />
                    @endif
                    @endif
                    <div id="share"></div>
                </footer>
            </article>

            <nav class="single-post-navigation" role="navigation">
                <div class="row">
                    <div class="col-xs-6">
                        @if($previous = $post->present()->previous)
                            <div class="previous-post-link">
                                <a class="waves-effect waves-light" href="{{ $previous->url }}"><i
                                            class="fa fa-long-arrow-left"></i>{{ trans('news::post.button.previous') }}
                                </a>
                            </div>
                        @endif
                    </div>
                    <div class="col-xs-6">
                        @if($next = $post->present()->next)
                            <div class="next-post-link">
                                <a class="waves-effect waves-light"
                                   href="{{ $next->url }}">{{ trans('news::post.button.next') }}<i
                                            class="fa fa-long-arrow-right"></i></a>
                            </div>
                        @endif
                    </div>
                </div>
            </nav>

        </div>
    </div>
@endsection

@push('js_inline')
{!! Theme::style('vendor/lightbox2/css/lightbox.min.css') !!}
{!! Theme::script('vendor/lightbox2/js/lightbox.min.js') !!}

{!! Theme::script('vendor/jssocials/jssocials.min.js') !!}
{!! Theme::style('vendor/jssocials/jssocials.css') !!}
{!! Theme::style('vendor/jssocials/jssocials-theme-classic.css') !!}

<script>
    $("#share").jsSocials({
        shareIn: "popup",
        showLabel: false,
        showCount: "inside",
        shares: ["twitter", "facebook", "googleplus", "linkedin", "pinterest", "stumbleupon", "whatsapp"]
    });
</script>
@endpush