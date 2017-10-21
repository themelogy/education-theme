@extends('layouts.account')

@section('content')
    <section class="section-padding gray-bg p-top-bot-100">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 z-depth-1 whiten">
                    <h2 class="login-box-msg brand-bg white-text m-top-10" style="line-height: 50px;text-align: center;">{{ trans('user::auth.reset password') }}</h2>
                    <div class="login-box-body padding-20">
                        @include('partials.notifications')

                        {!! Form::open() !!}
                        <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                            <input type="password" class="form-control" autofocus
                                   name="password" placeholder="{{ trans('user::auth.password') }}">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? ' has-error has-feedback' : '' }}">
                            <input type="password" name="password_confirmation" class="form-control" placeholder="{{ trans('user::auth.password confirmation') }}">
                            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                            {!! $errors->first('password_confirmation', '<span class="help-block">:message</span>') !!}
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-primary btn-block btn-flat pull-right">
                                    {{ trans('user::auth.reset password') }}
                                </button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection