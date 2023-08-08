<div class="row clearfix">

    {{-- Question --}}

    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Question</span>
                </div>
                {!! Form::text('question',null,['placeholder' => 'Question',
                'class'=>'form-control']) !!}
            </div>
        </div>
    </div>




    {{-- Answer --}}

    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Answer</span>
                </div>
                {!! Form::text('answer',null,['placeholder' => 'Answer',
                'class'=>'form-control']) !!}
            </div>
        </div>
    </div>

     {{-- Property --}}

     <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Property</span>
                </div>
                {!! Form::select('property_id',$properties,null,['placeholder' => 'Select Property',
                'class'=>'form-control']) !!}
            </div>
        </div>
    </div>

     {{-- Display Order  --}}

     <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Display Order</span>
                </div>
                {!! Form::text('order',null,['placeholder' => 'Display Order',
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
                    ];
                @endphp
                {!! Form::select('status',$status,null,['placeholder' => 'Select Option',
                'class'=>'form-control']) !!}
            </div>
        </div>
    </div>



</div>
