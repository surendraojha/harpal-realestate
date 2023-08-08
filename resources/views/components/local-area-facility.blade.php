<div class="col-md-12 mb-3">

    <div class="customForm custom-checkbox">
        <span class="radioTitle">
            Local Area Facilities
        </span>


        <div class="d-flex label-checkbox">
            @foreach ($additional_features as $value)
                <div class="form-check">
                    <input class="form-check-input" name="feature_id[]"
                        @if (@$checked_features) @if (in_array($value->id, $checked_features))
                            checked @endif
                        @endif

                    type="checkbox"
                    value="{{ $value->id }}" id="feature{{ $value->id }}">
                    <label class="form-check-label" for="feature{{ $value->id }}">
                        {{ $value->title }}
                    </label>
                </div>
              
            @endforeach

        </div>
    </div>
</div>
