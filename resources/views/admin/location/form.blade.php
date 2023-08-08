<div class="row clearfix">
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Location</span>
                </div>
                {!! Form::text('location',null,['placeholder' => 'Location',
                'class'=>'form-control']) !!}


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
                {!! Form::number('order',null,['placeholder' => 'Display Order',
                'class'=>'form-control']) !!}


            </div>
        </div>
    </div>



    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Status</span>
                </div>

                @php
                    $status = [
                        '1'=>'Active',
                        '0'=>'InActive'
                    ]
                @endphp

                {!! Form::select('status',$status,null,['placeholder' => 'Select Option',
                'class'=>'form-control']) !!}


            </div>
        </div>
    </div>



            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> Meta Title</span>
                        </div>
                        {!! Form::text('meta_title', null, ['placeholder' => 'Meta Title', 'class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            {{-- Meta Keyword --}}

            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> Meta Keyword</span>
                        </div>
                        {!! Form::text('meta_keyword', null, ['placeholder' => 'Meta Keyword', 'class' => 'form-control']) !!}
                    </div>
                </div>
            </div>



            {{-- Meta Description --}}

            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Meta Description</span>
                        </div>
                        {!! Form::textarea('meta_description', null, ['placeholder' => 'Meta Description', 'class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

</div>
