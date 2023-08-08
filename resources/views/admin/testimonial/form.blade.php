<div class="row clearfix">



    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Photo</span>
                </div>
                {!! Form::file('photo', ['class' => 'form-control mb-3']) !!}



            </div>
        </div>
        <div class="form-group">

            @if (@$information->photo)
                <img height="250px" src="{{ asset('uploads/' . @$information->photo) }}" alt="">
            @endif
        </div>
    </div>


    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Name</span>
                </div>
                {!! Form::text('name', null, ['placeholder' => 'Enter Name', 'class' => 'form-control' ,'required']) !!}


            </div>
        </div>
    </div>

    {{-- Activity --}}
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Activity</span>
                </div>
                {!! Form::text('activity', null, ['placeholder' => 'Enter Activity', 'class' => 'form-control','required']) !!}


            </div>
        </div>
    </div>
{{-- message --}}
    <div class="col-lg-6 col-md-6 col-sm-12">

    <div class="form-group">
    <span id="output"></span>
                <span>of 160 Characters</span>
    </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Message</span>
                </div>
                {!! Form::textarea('message', null, ['placeholder' => 'Enter Message', 'class' => 'form-control','required','id'=>'message']) !!}



            </div>
        </div>
    </div>
    {{-- Rating --}}
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rating</span>
                </div>

                @php
                    $ratings = [
                        '1' => '1',
                        '2' => '2',
                        '3' => '3',
                        '4' => '4',
                        '5' => '5',
                    ];
                @endphp
                {!! Form::select('rating', $ratings, null, ['placeholder' => 'Select Your Rating', 'class' => 'form-control','required']) !!}


            </div>
        </div>
    </div>

    {{-- order --}}

    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Display Order</span>
                </div>
                {!! Form::number('order', null, ['placeholder' => 'Display Order', 'class' => 'form-control' ,'required']) !!}


            </div>
        </div>
    </div>



    {{-- status --}}


    <div class="col-lg-6 col-md-6 col-sm-12">
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
                {!! Form::select('status', $status, null, ['placeholder' => 'Select Status', 'class' => 'form-control','required']) !!}


            </div>
        </div>
    </div>
</div>
