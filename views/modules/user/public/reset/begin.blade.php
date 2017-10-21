@extends('layouts.account')

@section('content')
    <section class="section-padding gray-bg p-top-bot-100">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 z-depth-1 whiten">
                    <div class="login-box-body padding-20">
                        {{ trans('user::auth.to reset password complete this form') }}
                        @include('partials.notifications')

                        {!! Form::open(['route' => 'reset.post']) !!}
                        <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                            <input type="email" class="form-control" autofocus
                                   name="email" placeholder="{{ trans('user::auth.email') }}" value="{{ old('email')}}">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-primary btn-block btn-flat pull-right">
                                    {{ trans('user::auth.reset password') }}
                                </button>
                            </div>
                        </div>
                        {!! Form::close() !!}

                        <a href="{{ route('login') }}" class="text-center">{{ trans('user::auth.I remembered my password') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection