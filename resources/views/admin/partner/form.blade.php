<div class="row clearfix">




    {{-- <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Title</span>
                </div>
                {!! Form::text('title', null, ['placeholder' => 'Title', 'class' => 'form-control']) !!}


            </div>
        </div>
    </div> --}}

    {{-- Featured Photo --}}
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> Photo/Logo</span>
                </div>
                {!! Form::file('photo', ['class' => 'form-control']) !!}
            </div>
        </div>

        @if(@$information->photo)
            <img height="300px" src="{{asset('uploads/'.@$information->photo)}}" alt="">
        @endif
    </div>


    {{-- Display Order --}}
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Link</span>
                </div>
                {!! Form::text('link', null, ['placeholder' => 'Website URL', 'class' => 'form-control']) !!}
            </div>
        </div>
    </div>



    {{-- Display Order --}}
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Display Order</span>
                </div>
                {!! Form::number('order', null, ['placeholder' => 'Display Order', 'class' => 'form-control']) !!}
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
                        '0' => 'Pending'
                    ];
                @endphp
                {!! Form::select('status', $status, null, [ 'class' => 'form-control']) !!}

            </div>
        </div>
    </div>





</div>
