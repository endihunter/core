@if ('datalist' === $type)
    {!! Form::text($field->name(), $field->value(), ['id' => $field->id(), 'class' => 'form-control', 'list' => "scaffold_{$field->id()}"]) !!}
    {!! Form::datalist("scaffold_{$field->id()}", $options) !!}
@else
    {{ Form::select($field->name(), $options ?? [], $field->value(), ['class' => 'form-control', 'multiple' => $multiple] + $attributes) }}
@endif

