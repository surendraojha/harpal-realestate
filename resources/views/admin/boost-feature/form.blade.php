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



   
</div>
