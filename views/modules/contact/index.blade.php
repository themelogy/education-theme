@extends('layouts.master')

@section('content')
    @component('partials.components.page-title', ['breadcrumb'=>'contact'])
    {{ trans('themes::contact.title') }}
    @endcomponent

    <section class="section-padding m-bot-20 section-contact">
        <div class="container no-padding">
            <h2 class="title no-background text-center md-p-top-bot-20">
                <span><img src="{{ Theme::url('img/logos/logo3.svg') }}" alt=""/></span>
            </h2>
            @include('contact::maps')
        </div>
        <hr class="padding-20"/>
        <div class="container m-bot-20">
            <div class="row">
                <div class="col-md-6">
                    @include('contact::guestbook')
                    <hr class="break p-top-bot-20"/>
                    <br/>
                    <h3 class="title">{!! trans("themes::contact.follow us") !!}</h3>
                    @include('partials.components.social', ['class'=>'social-link tt-animate ltr text-left'])
                </div>
                <div class="col-md-6">
                    <div class="contact-form md-p-lft-20">
                        @include('contact::form')
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection