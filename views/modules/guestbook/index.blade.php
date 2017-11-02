@extends('layouts.master')

@section('content')

    @component('partials.components.page-title', ['breadcrumb'=>'guestbook.index'])
    {{ trans('themes::guestbook.title') }}
    @endcomponent

    <section class="ls ms md-p-bot-50 section-testimonials">
        <div class="container">
			<div class="row">
				<div class="col-md-12 p-bot-20">
					<div class="promo-box gray-bg border-box">
						<div class="promo-info">
							<i class="fa fa-commenting-o promo-icon circle brand-bg"></i>
							<h2 class="text-extrabold text-uppercase">{{ trans('themes::guestbook.leave comment') }}</h2>
							<p>{{ trans('themes::guestbook.leave comment description') }}</p>
						</div>
						<div class="promo-btn">
							<a href="{{ route('guestbook.comment.form') }}" class="btn btn-primary brand-bg waves-effect waves-light">{{ trans('themes::guestbook.leave a comment') }}</a>
						</div>
					</div>
				</div>
			</div>
            <div class="row">
                @if(count($reviews)>0)
                    @foreach($reviews as $review)
                        <div class="col-sm-12">
                            <blockquote class="blockquote">
                                @if($image = $review->present()->firstImage(null,100,'resize',50))
                                    <figure><img src="{{ $image }}" alt="{{ $review->fullname }}" /></figure>
                                @else
                                    <figure><img src="{{ Theme::url('img/modules/tebrikler.jpg') }}" alt="{{ $review->fullname }}" /></figure>
                                @endif
                                <main>{!! nl2br($review->message) !!}</main>
                                <footer class="blockquote-footer"><cite title="Source Title">{{ $review->fullname }}</cite></footer>
                            </blockquote>
                            <div class="clear"></div>
                        </div>
                    @endforeach
                @else
                    <div class="col-md-12 md-m-bot-50">
                        @component('partials.alert', ['type'=>'warning'])
                            {{ trans('guestbook::comments.messages.not found') }}
                        @endcomponent
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-12">
                    {!! $reviews->render('partials.pagination.default') !!}
                </div>
            </div>
        </div>
    </section>
@endsection

@push('css_inline')
<style>
    .section-testimonials blockquote {
        border: 1px solid #d7d7d7;
        font-size: 14px;
        line-height: 20px;
        padding: 20px 20px 15px 20px;
        overflow: hidden;
        transition: all 0.2s ease;
    }
    .section-testimonials blockquote figure {
        float: left;
        margin: 0 20px 10px 0;
    }
    .section-testimonials blockquote figure img {
        max-height: 100px;
    }
    .section-testimonials blockquote footer {
        margin-top: 10px;
    }
    .section-testimonials blockquote:hover {
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
</style>
@endpush