@component('administrator::components.table.row')
    @slot('label', Form::label($field->id(), $field->title()))
    @slot('input')
        @foreach($options as $optionValue => $optionLabel)
            <label for="{{ $id = str_slug($field->id().'-'.$optionValue) }}" style="margin-right: 10px;">
                {!! Form::radio($field->name(), $optionValue, null, ['id' => $id]) !!}
                <span>{{ $optionLabel }}</span>
            </label>
        @endforeach
    @endslot
@endcomponent