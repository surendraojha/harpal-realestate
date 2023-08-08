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



    {{-- Categories  --}}
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Category (optional)</span>
                </div>
                {!! Form::select('category_id', $categories,null, ['placeholder' => 'Select Category', 'class' => 'form-control']) !!}
            </div>
        </div>
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
                        '0' => 'Inactive',
                    ];
                @endphp
                {!! Form::select('status', $status, null, ['placeholder' => 'Select option', 'class' => 'form-control']) !!}

            </div>
        </div>
    </div>


</div>
