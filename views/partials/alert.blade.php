<div class="alert {{ $type ?? 'success' }}-icon icon" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="{{ trans('global.buttons.close') }}"><span aria-hidden="true">×</span></button>
    <i class="fa fa-lg fa-warning"></i> {{ $slot }}
</div>