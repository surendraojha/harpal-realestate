<div class="row clearfix">



    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Link</span>
                </div>
                {!! Form::text('link',null,['placeholder' => 'Link',
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
                {!! Form::select('status', $status ,null,['placeholder' => 'Select Option',
                'class'=>'form-control']) !!}


            </div>
        </div>
    </div>
</div>
