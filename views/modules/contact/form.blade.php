<h3 class="title">{{ trans('themes::contact.write us') }}</h3>
<p>{{ trans('themes::contact.write us desc') }}</p>
{!! Form::open(['route' => 'contact.send', 'class' => 'contact-form', 'method'=>'post']) !!}
{!! Form::hidden('from', Request::path()) !!}
<div class="row">
    <div class="col-md-6">
        <div class="input-field">
            {!! Form::text('first_name', old('first_name')) !!}
            {!! Form::label('first_name', trans('contact::contacts.form.first_name')) !!}
            {!! $errors->first("first_name", '<span class="help-block red-text">:message</span>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="input-field">
            {!! Form::text('last_name', old('last_name')) !!}
            {!! Form::label('last_name', trans('contact::contacts.form.last_name')) !!}
            {!! $errors->first("last_name", '<span class="help-block red-text">:message</span>') !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="input-field">
            {!! Form::text('phone', old('phone')) !!}
            {!! Form::label('phone', trans('contact::contacts.form.phone')) !!}
            {!! $errors->first("phone", '<span class="help-block red-text">:message</span>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="input-field">
            {!! Form::text('email', old('email')) !!}
            {!! Form::label('email', trans('contact::contacts.form.email')) !!}
            {!! $errors->first("email", '<span class="help-block red-text">:message</span>') !!}
        </div>
    </div>
</div>
<div class="input-field">
    {!! Form::textarea('enquiry', old('enquiry'), ['class'=>'materialize-textarea']) !!}
    {!! Form::label('enquiry', trans('contact::contacts.form.enquiry')) !!}
    {!! $errors->first("enquiry", '<span class="help-block red-text">:message</span>') !!}
</div>
<div class="row">
    <div class="col-md-6">
        <button type="submit" name="submit" class="waves-effect waves-light btn submit-button brang-bg mt-30">{{ trans('contact::contacts.form.submit') }}</button>
    </div>
    <div class="col-md-6">
        <div class="form-group pull-right @if ($errors->has('g-recaptcha-response')) has-error @endif">
            {!! Captcha::display() !!}
            <span class="help-block red-text"><small>{!! $errors->first('g-recaptcha-response') !!}</small></span>
        </div>
    </div>
</div>
{!! Form::close() !!}

@push('js_inline')
{!! Captcha::script() !!}
@endpush