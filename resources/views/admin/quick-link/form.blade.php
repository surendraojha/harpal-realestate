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



    {{-- Link --}}
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

 {{-- Link --}}
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




    {{-- status --}}
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Status</span>
                </div>
                {!! Form::select('status',[ '1'=>'Active','0'=>'Inactive'],null,['placeholder' => 'Select Status',
                'class'=>'form-control']) !!}
            </div>
        </div>
    </div>


</div>
