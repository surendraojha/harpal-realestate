<div class="col-12 mb-3">
    <div class="d-inline-flex mb-4 border-bottom ">
        <div>
            <h6 class="mb-0 formsmall-title">
              Your Review
            </h6>
            {{-- <span class="d-block mt-2">
                All the fileds with <span class="text-danger"> * </span>are mandotary
            </span> --}}
        </div>
    </div>
</div>
<div class="col-12">
    <div class="singleformbox">
        <div class="row">


            <div class="row clearfix">



                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-floating customForm">
                        {!! Form::file('photo', ['class' => 'form-control mb-3']) !!}
                        <label for="dob">
                            Photo
                        </label>

                    </div>
                    <div class="form-group">

                        @if (@$information->photo)
                            <img height="250px" src="{{ asset('uploads/' . @$information->photo) }}" alt="">
                        @endif
                    </div>
                </div>


                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-floating customForm">
                        @if (!@$information->name)
                                @php
                                    $name = $user->name;
                                @endphp
                            @else
                                @php
                                    $name = old('name',@$information->name)
                                @endphp
                            @endif

                            {!! Form::text('name', @$name, ['placeholder' => 'Enter Name', 'class' => 'form-control', 'required']) !!}
                            <label for="dob">
                                Full Name
                            </label>
                        </div>
                </div>

                {{-- Activity --}}
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-floating customForm">
                        @if (!@$information->name)
                                @php
                                    $name = $user->name;
                                @endphp
                            @else
                                @php
                                    $name = old('name',@$information->name)
                                @endphp
                            @endif

                            {!! Form::text('activity', @$information->activity, ['placeholder' => 'Enter Activity', 'class' => 'form-control', 'required']) !!}
                            <label for="dob">
                                Explain Activity
                            </label>
                        </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-floating">
                            @php
                                $ratings = [
                                    '1' => '1',
                                    '2' => '2',
                                    '3' => '3',
                                    '4' => '4',
                                    '5' => '5',
                                ];
                            @endphp
                                {!! Form::select('rating', $ratings, @$information->rating, ['placeholder' => 'Select Your Rating', 'class' => 'form-control', 'required']) !!}

                        <label for="floatingSelect">Rating</label>
                      </div>
                </div>
                {{-- message --}}
                <div class="col-lg-12 col-md-12 col-sm-12">


                <div class="form-floating">

                <span id="output"></span>
                <span>of 160 Characters</span>
                </div>
                    <div class="form-floating">
                        {!! Form::textarea('message', @$information->message, ['placeholder' => 'Enter Message', 'class' => 'form-control','id'=>'message', 'required', 'style' => "height:110px;"]) !!}
                        <label for="floatingTextarea">Message</label>
                      </div>
                </div>
                {{-- Rating --}}







            </div>
        </div>
    </div>
</div>



<script>
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    }
</script>
