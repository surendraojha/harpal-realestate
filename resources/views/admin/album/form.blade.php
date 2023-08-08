<div class="row clearfix">
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Title</span>
                </div>
                {!! Form::text('title',null,['placeholder' => 'Title',
                'class'=>'form-control']) !!}


            </div>
        </div>
    </div>


    {{-- Display Order --}}

    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Order</span>
                </div>
                {!! Form::text('order',null,['placeholder' => 'Display Order *',
                'class'=>'form-control']) !!}
            </div>
        </div>
    </div>

    {{-- Status --}}
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Status</span>
                </div>
                {!! Form::select('status', ['1'=>'Active','0'=>'InActive'], null, ['placeholder' => 'Select
                Status',
                'class'=>'form-control']) !!}
            </div>
        </div>


    </div>



    {{-- Image --}}

    {{-- <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Image</span>
                </div>
                {!! Form::file('image',null,['class'=>'form-control']) !!}
                @if(@$information)
                    <img height="100px" src="{{ asset('public/uploads/'.$information->image) }}" alt="">
                @endif
            </div>
        </div>
    </div> --}}
</div>
