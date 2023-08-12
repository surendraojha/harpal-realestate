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



    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Category</span>
                </div>

                <select name="category_id" class="form-control">
                    <option value="" selected>Select Option</option>
                    @foreach ($categories as $value)
                    <option value="{{ $value->id }}"
                        {{ old('category_id',@$information->category_id)==$value->id?'selected':"" }}
                        >{{ $value->title }}</option>
                    @endforeach

                </select>


            </div>
        </div>
    </div>

    {{-- Location for map --}}
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Content</span>
                </div>
                {!! Form::textarea('description', null, ['placeholder' => 'Details', 'class' => 'form-control ckeditor']) !!}
            </div>
        </div>
    </div>




    {{--  Photo --}}
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Photo</span>
                </div>
                {!! Form::file('photo', ['class' => 'form-control']) !!}


            </div>


        </div>

        @if (@$information->photo)
            <img height="300px" src="{{ asset('blogs/' . @$information->photo) }}" alt="">
        @endif

    </div>











    {{-- Display order --}}

    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Writer Name</span>
                </div>

                <input type="text" name="writer_name"
                    value="{{ old('writer_name', @$information->writer_name) ?? auth()->user()->name }}" required>

            </div>
        </div>
    </div>












</div>
