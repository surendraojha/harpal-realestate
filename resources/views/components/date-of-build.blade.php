<div class="col-md-4 mb-3">
    <div class="form-floating customForm">

        @php
            $current_year = date('Y');

            for ($i = $current_year; $i >= 1970; $i--) {
                $date = $i . '-' . date('m-d');
                $nepali_year = \App\Helpers\DateHelper::englishToNepaliYear($date);
                $years[] = $nepali_year;
            }

        @endphp

        <select name="date_of_build" id="date_of_build"
            class="form-select form-control  {{ $errors->has('date_of_build') ? ' is-invalid' : '' }}">

            <option value="" disabled selected>Select Option</option>
                @foreach ($years as $value)
                    <option value="{{ $value }}"
                        {{ old('date_of_build', @$information->date_of_build) == $value ? 'selected' : '' }}>
                        {{ $value }}</option>
                @endforeach
            </select>
        <label for="date_of_build">
            Date Of Build
            {{-- <span class="text-danger">*</span> --}}
        </label>


        @error('date_of_build')
            <span class="invalid-custom" role="alert">

                {{ $message }}
            </span>
        @enderror



        <span id="date-of-build-error" class="invalid-custom" role="alert">
        </span>
    </div>
</div>
