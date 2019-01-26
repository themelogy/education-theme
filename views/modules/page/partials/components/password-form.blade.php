<div class="content md-padding-40 text-justify">
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['method'=>'post']) !!}
            <div class="form-group">
                {!! Form::label('password', 'Sayfaya giriş yapmak için şifrenizi giriniz', ['class'=>'font-16']) !!}
                {!! Form::input('password', 'password', null, ['class'=>'browser-default form-control']) !!}
                <span class="error error-danger">{{ $errorMsg ?? '' }}</span>
            </div>
            {!! Form::submit('Giriş Yap', ['class'=>'btn']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>