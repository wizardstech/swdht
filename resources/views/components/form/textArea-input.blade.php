<div class="form-group">
    {{ Form::label('Description', null, ['class' => 'control-label']) }}
    {{ Form::textarea($name, $value, array_merge(['class' => 'form-control'], $attributes)) }}
</div>