<div class="row clearfix">
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">

            <label for="title">Title</label>

            {!! Form::text('title', null, ['placeholder' => 'Title', 'class' => 'form-control']) !!}


        </div>
    </div>


    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">


            <label for="subtitle">Sub title</label>

            {!! Form::text('subtitle', null, ['placeholder' => 'Subtitle', 'class' => 'form-control']) !!}
        </div>
    </div>



    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">


            <label for="photo">Photo</label>

            {!! Form::file('photo', [ 'class' => 'form-control']) !!}
        </div>
    </div>



    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">


            <label for="insurance">Insurance</label>


            @php
                $insurances = [
                    '0' => 'No',
                    '1' => 'Yes',
                ];
            @endphp

            <select name="insurance" class="form-control">
                @foreach ($insurances as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
        </div>
    </div>


    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">


            <label for="loan_year">Loan Year</label>

            {!! Form::number('loan_year', null, ['placeholder' => 'Loan Year', 'class' => 'form-control']) !!}


        </div>
    </div>


    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">

            <label for="interest_rate">Interest Rate</label>
            {!! Form::number('interest_rate', null, ['placeholder' => 'Subtitle', 'min' => '1', 'class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">


            <label for="display-order">Display Order</label>

            {!! Form::number('order', null, ['placeholder' => 'Display Order', 'class' => 'form-control']) !!}


        </div>
    </div>


    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">


            <label for="description">Description</label>

            <textarea class="form-control ckeditor" name="description" cols="30" rows="10">{{ old('description', @$information->description) }}</textarea>


        </div>
    </div>
</div>
