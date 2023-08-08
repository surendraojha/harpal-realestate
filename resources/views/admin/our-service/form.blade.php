<div class="row clearfix">

    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Title</span>
                </div>
                    {!! Form::text('title',null,['placeholder' => 'Title *',
                                'class'=>'form-control']) !!}
            </div>
        </div>
    </div>


    {{-- photo --}}


    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Photo</span>
                </div>
                @if(@$information)
                    <img src="{{ asset('public/uploads/'.$information->photo) }}" height="100px" alt="">
                @endif
                    {!! Form::file('photo') !!}
            </div>
        </div>
    </div>


    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="form-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Description</span>
            </div>
            <div class="input-group">





                    {!! Form::textarea('content',null,['placeholder' => 'Description',
                                'class'=>'tinymce']) !!}

            </div>
        </div>
    </div>

    {{-- Display Order --}}

    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="form-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Display Order</span>
            </div>
            <div class="input-group">

                {!! Form::text('order',null,['placeholder' => 'Display Order *',
                'class'=>'form-control']) !!}
            </div>
        </div>
    </div>


</div>
