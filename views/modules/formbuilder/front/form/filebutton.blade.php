<?php 
    $name = array_get($attr, 'name', 'name');
    $label = array_get($attr, 'label', 'label');
?>
<div class="form-group">
  <label class="col-md-3 font-12  control-label" for="<?php echo $name ?>"><?php echo $label ?></label>
  <div class="col-lg-6">
    <input id="<?php echo $name ?>" name="<?php echo $name ?>" id="fileInput" type="file">
      {!! $errors->first($name, '<span class="help-block">:message</span>') !!}
  </div>
</div>
