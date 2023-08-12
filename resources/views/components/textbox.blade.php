
{{-- @dd($d) --}}

@php
    $field = $information['name'];
@endphp
<input

type="{{ $information['type'] }}"
class="{{ $information['class'] }}"
placeholder="{{ $information['placeholder'] }}"
name="{{ $information['name'] }}"
value="{{old($information['name'],@$d->$field)}}"

@if(@$information['id'])
    id="{{ $information['id'] }}"
@endif

@if($information['required'])
    required="required"
@endif


>
