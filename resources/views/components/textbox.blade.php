<input

type="{{ $information['type'] }}"
class="{{ $information['class'] }}"
placeholder="{{ $information['placeholder'] }}"
name="{{ $information['name'] }}"
value="{{old($information['name'])}}"

@if(@$information['id'])
    id="{{ $information['id'] }}"
@endif

@if($information['required'])
    required="required"
@endif


>
