<div class="col-md-12">
    <div class="md-form">
        @foreach ($custom_fields as $value)
            <input type="hidden" name="custom_field_identifier[]"
            value="{{ $value->identifier }}">

            <input type="hidden" name="custom_field_label[]"
            value="{{ $value->label }}">

            <label for="{{ $value->identifier }}">{{ $value->label }}</label>
            <input type="text" name="custom_field_value[]" @if ($value->required) required @endif>
        @endforeach
    </div>
</div>
