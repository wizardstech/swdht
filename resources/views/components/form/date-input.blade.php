<div class="form-group">
    {{ Form::label($name, null, ['class' => 'control-label']) }}
    {{ Form::date($name, $value, ['class' => 'form-control'], $attributes) }}
</div>