<div class="row">
    <fieldset>
        <legend>Video Ayarları</legend>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group{{ $errors->has("settings.video") ? ' has-error' : '' }}">
                        {!! Form::label("settings.video", "Video Url".':') !!}
                        {!! Form::input('text', 'settings[video]', !isset($page->settings->video) ? '' : $page->settings->video, ['class'=>'form-control']) !!}
                        {!! $errors->first("settings.video", '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
            </div>
        </div>
    </fieldset>
</div>
