@extends('layouts.account')

@section('content')
    <section class="section-padding gray-bg p-top-bot-100">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 z-depth-1 whiten">
                    <h2 class="login-box-msg brand-bg white-text m-top-10" style="line-height: 50px;text-align: center;">{{ trans('themes::user.titles.login') }}</h2>
                    <div class="login-box-body padding-20">
                        @include('partials.notifications')

                        {!! Form::open(['route' => 'login.post']) !!}
                        <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                            <input type="email" class="form-control" autofocus
                                   name="email" placeholder="{{ trans('user::auth.email') }}" value="{{ old('email')}}">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                            <input type="password" class="form-control"
                                   name="password" placeholder="{{ trans('user::auth.password') }}" value="{{ old('password')}}">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="row">
                            <div class="col-xs-8">
                                <div class="checkbox icheck">
                                    <input type="checkbox" name="remember_me" id="remember_me" />
                                    <label for="remember_me"> &nbsp; {{ trans('user::auth.remember me') }}</label>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">
                                    {{ trans('user::auth.login') }}
                                </button>
                            </div>
                        </div>
                        </form>

                        <a href="{{ route('reset')}}">{{ trans('user::auth.forgot password') }}</a><br>
                        @if (config('asgard.user.config.allow_user_registration'))
                            <a href="{{ route('register')}}" class="text-center">{{ trans('user::auth.register')}}</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection