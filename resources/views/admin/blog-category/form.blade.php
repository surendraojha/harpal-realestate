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





    {{--  Photo --}}
    {{-- <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Photo</span>
                </div>
                {!! Form::file('photo', ['class' => 'form-control']) !!}


            </div>


        </div>

        @if(@$information->photo)
            <img height="300px" src="{{asset('blogs/'.@$information->photo)}}" alt="">
        @endif

    </div> --}}











    {{-- Display order --}}













</div>
