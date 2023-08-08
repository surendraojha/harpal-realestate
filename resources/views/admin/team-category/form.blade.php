<div class="row clearfix">
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Location/Country</span>
                </div>

                {!! Form::select('country', $countries, null, ['placeholder' => 'Select
                Country',
                'class'=>'form-control']) !!}

            </div>
        </div>
    </div>


    {{-- Content --}}
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Content</span>
                </div>

                {!! Form::textarea('content', null, ['placeholder' => 'Content','class'=>'form-control']) !!}


            </div>
        </div>
    </div>


     {{-- Dislay Order --}}

     <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Display Order</span>
                </div>

                {!! Form::text('order', null, ['placeholder' => 'Display Order','class'=>'form-control']) !!}

            </div>
        </div>
    </div>


</div>
