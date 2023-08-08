<div class="row clearfix">




    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Title</span>
                </div>
                {!! Form::text('title', null, ['placeholder' => 'Title', 'class' => 'form-control']) !!}


            </div>
        </div>
    </div>
    {{-- subtitle --}}
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Sub Title</span>
                </div>
                {!! Form::text('subtitle', null, ['placeholder' => 'Sub Title', 'class' => 'form-control']) !!}


            </div>
        </div>
    </div>
    {{-- Location for map --}}
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Content</span>
                </div>
                {!! Form::textarea('description', null, ['placeholder' => 'Details', 'class' => 'form-control ckeditor']) !!}
            </div>
        </div>
    </div>




    {{--  Photo --}}
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Photo</span>
                </div>
                {!! Form::file('photo', ['class' => 'form-control']) !!}


            </div>


        </div>

        @if(@$information->photo)
            <img height="300px" src="{{asset('uploads/'.@$information->photo)}}" alt="">
        @endif

    </div>











    {{-- Display order --}}

    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Display Order</span>
                </div>
                {!! Form::text('order', null, ['placeholder' => 'Display Order', 'class' => 'form-control']) !!}

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
                {!! Form::select('status', $status, null, ['placeholder' => 'Select option', 'class' => 'form-control']) !!}

            </div>
        </div>
    </div>






</div>
