<div class="form-group">
    {{ Form::label('Montant', null, ['class' => 'control-label']) }}
    {{ Form::number($name, $value, array_merge(['class' => 'form-control'], $attributes)) }}
</div>