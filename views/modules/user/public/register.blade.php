@extends('layouts.account')

@php
    seo_helper()->setTitle(trans('user::auth.register'))
                ->setDescription(trans('user::auth.register'));
@endphp

@section('content')
    <section class="section-padding gray-bg p-top-bot-100">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 z-depth-2 whiten">
                    <h2 class="login-box-msg brand-bg white-text m-top-10" style="line-height: 50px;text-align: center;"><i class="fa fa-user-plus"></i> {{ trans('user::auth.register') }}</h2>
                    <div class="register-box-body padding-20">
                        @include('partials.notifications')
                        {!! Form::open(['route' => 'register.post']) !!}
                        <div class="form-group has-feedback {{ $errors->has('first_name') ? ' has-error has-feedback' : '' }}">
                            <input type="text" name="first_name" class="form-control" autofocus
                                   placeholder="{{ trans('user::users.form.first_name') }}" value="{{ old('first_name') }}">
                            {!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="form-group has-feedback {{ $errors->has('last_name') ? ' has-error has-feedback' : '' }}">
                            <input type="text" name="last_name" class="form-control" autofocus
                                   placeholder="{{ trans('user::users.form.last_name') }}" value="{{ old('last_name') }}">
                            {!! $errors->first('last_name', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error has-feedback' : '' }}">
                            <input type="email" name="email" class="form-control"
                                   placeholder="{{ trans('user::auth.email') }}" value="{{ old('email') }}">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error has-feedback' : '' }}">
                            <input type="password" name="password" class="form-control" placeholder="{{ trans('user::auth.password') }}">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? ' has-error has-feedback' : '' }}">
                            <input type="password" name="password_confirmation" class="form-control" placeholder="{{ trans('user::auth.password confirmation') }}">
                            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                            {!! $errors->first('password_confirmation', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error has-feedback' : '' }}">
                            {!! Captcha::display() !!}
                            {!! $errors->first('g-recaptcha-response', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-primary btn-block btn-flat border-5">{{ trans('user::auth.register me') }}</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
						
                        <div class="row">
                            <div class="col-xs-12 m-top-10">
								<a href="{{ route('login') }}" class="btn btn-primary btn-block brand-bg btn-flat wave">{{ trans('user::auth.I already have a membership') }}</a>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js_inline')
{!! Captcha::setLang(locale())->script() !!}
@endpush

@push('css_inline')
<style>
.help-block {
	font-size: 12px;
	margin:-5px 0 0 0;
}
</style>
@endpush