<div class="row clearfix">



    @if (!@$position)
        @php
            $position = [];
        @endphp
    @endif









    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Link</span>
                </div>
                {!! Form::text('link', null, ['placeholder' => 'Link *', 'class' => 'form-control']) !!}


            </div>
        </div>
    </div>






    {{-- Featured Photo --}}
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Photo</span>
                </div>
                {!! Form::file('photo', ['class' => 'form-control']) !!}
            </div>
        </div>

        @if (@$information->photo)
            <img height="300px" src="{{ asset('uploads/' . @$information->photo) }}" alt="">
        @endif

    </div>



    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <h3>Ad Positioning </h3>

                {{-- <h5>Home Page</h5> --}}

            </div>
        </div>
    </div>

    @foreach ($ad_section as $key => $value)
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">{{ $value }}</span>
                    </div>

                    <input type="checkbox" class="form-control" name="ad_type[]" value="{{ $key }}"
                        @if (in_array($key, $position)) checked @endif>
                </div>
            </div>
        </div>
    @endforeach











    {{-- status --}}
    {{-- <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Status</span>
                </div>
                @php
                    $status = [
                        '1' => 'Active',
                        '0' => 'InActive',
                    ];
                @endphp
                {!! Form::select('status', $status, null, ['placeholder' => 'Select option', 'class' => 'form-control']) !!}

            </div>
        </div>
    </div> --}}
</div>
