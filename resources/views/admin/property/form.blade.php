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



    {{-- category_id --}}
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rental Type</span>


                    {!! Form::select('category_id', $categories, null, ['class' => 'form-control', 'id' => 'category_id']) !!}


                </div>
            </div>
        </div>
    </div>



    {{-- category_id --}}
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Room Type</span>

                    @php
                        $category_id = old('category_id', @$information->category_id);

                        if ($category_id) {
                            $sub_categories = \App\Models\Category::where('parent', $category_id)->pluck('title', 'id');
                        } else {
                            $sub_categories = [];
                        }
                    @endphp
                    {!! Form::select('sub_category_id', $sub_categories, null, ['placeholder' => 'Room Type', 'class' => 'form-control', 'id' => 'sub_category_id']) !!}


                </div>
            </div>
        </div>

    </div>



    {{-- Purpose --}}
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Purpose</span>
                </div>
                {!! Form::select('purpose_id', $purposes, null, ['placeholder' => 'Purpose', 'class' => 'form-control']) !!}
            </div>
        </div>
    </div>


    {{-- Date Of Build --}}
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Date Of Build</span>
                </div>

                <select name="date_of_build" id="" class="form-control">
                    <option value="" selected disabled>Select Option</option>

                    @foreach ($years as $value)
                        <option value="{{ $value }}"
                            {{ old('date_of_build', @$information->date_of_build) == $value ? 'selected' : '' }}>
                            {{ $value }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    {{-- No. Of Bed Rooms --}}
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">No. Of Bed Rooms</span>
                </div>
                {!! Form::text('bedroom', null, ['placeholder' => 'No. Of Bed Rooms', 'class' => 'form-control']) !!}


            </div>
        </div>
    </div>



    {{-- No. Of Bath Rooms --}}
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">No. Of Bath Rooms</span>
                </div>
                {!! Form::text('bathroom', null, ['placeholder' => 'No. Of Bed Rooms', 'class' => 'form-control']) !!}


            </div>
        </div>
    </div>

    {{-- No. Of Kitchen --}}
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">No. Of Kitchen</span>
                </div>

                @php
                $kitchen = [
                    '' => 'Select Kitchen',
                    '1' => 'Yes',
                    '0' => 'No'
                ];
            @endphp
                {!! Form::select('kitchen', $kitchen, null, ['class' => 'form-control']) !!}


            </div>
        </div>
    </div>

    {{-- Furnishing --}}
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Furnishing</span>
                </div>

                @php
                    $furnishing = [
                        '' => 'Select Option',
                        'Yes' => 'Yes',
                        'No' => 'No',
                        'Semi Furnished' => 'Semi Furnished',
                    ];
                @endphp
                {!! Form::select('furnishing', $furnishing, null, ['class' => 'form-control']) !!}


            </div>
        </div>
    </div>


    {{-- Faced --}}
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Faced</span>
                </div>

                @php
                    $faced = [
                        '' => 'Select Option',
                        'East' => 'East',
                        'West' => 'West',
                        'North' => 'North',
                        'South' => 'South',
                    ];
                @endphp
                {!! Form::select('faced', $faced, null, ['class' => 'form-control']) !!}


            </div>
        </div>
    </div>



    {{-- Faced --}}
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Area Covered</span>
                </div>


                {!! Form::text('area_covered', null, ['placeholder' => 'Eg. 45 Ropani', 'class' => 'form-control']) !!}


            </div>
        </div>
    </div>


    {{-- Build Up Area --}}
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Build Up Area</span>
                </div>


                {!! Form::text('buld_up_area', null, ['placeholder' => 'Eg. 1474.29 Sq. Feet', 'class' => 'form-control']) !!}


            </div>
        </div>
    </div>




    {{-- Contact Number --}}
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Contact Number</span>
                </div>


                {!! Form::text('contact_number', null, ['placeholder' => 'Eg. 98XXXXXXXX', 'class' => 'form-control']) !!}


            </div>
        </div>
    </div>

    {{-- Parking --}}
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Parking</span>
                </div>
                {!! Form::text('parking', null, ['placeholder' => 'Parking Facility', 'class' => 'form-control']) !!}


            </div>
        </div>
    </div>


    {{-- Balcony --}}
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Balcony</span>
                </div>
                {!! Form::select('balcony', ['1' => 'Yes', '0' => 'No'], null, ['placeholder' => 'Select Option', 'class' => 'form-control']) !!}

            </div>
        </div>
    </div>



    {{-- Water --}}
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Water</span>
                </div>
                {!! Form::text('water', null, ['placeholder' => 'Water Facility', 'class' => 'form-control']) !!}
            </div>
        </div>
    </div>


    {{-- Location for map --}}
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Location for map (optional)</span>
                </div>
                {!! Form::text('location_for_map', null, ['placeholder' => 'Lalitude and longitude', 'class' => 'form-control']) !!}
            </div>
        </div>
    </div>

    {{-- Location for map --}}
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Overview</span>
                </div>
                {!! Form::textarea('overview', null, ['placeholder' => 'Details', 'class' => 'form-control ckeditor']) !!}
            </div>
        </div>
    </div>




    {{-- Featured Photo --}}
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Featured Photo</span>
                </div>
                {!! Form::file('featured_photo', ['class' => 'form-control', 'accept' => 'image/*']) !!}

                <button type="button" class="btn btn-success" onclick="addPhotos();">Add More Photos</button>

            </div>

            <div id="add-more-photos">
                @if (@$information)
                    @include('admin.property.edit-photos')
                @endif
            </div>
        </div>

        @if (@$information->featured_photo)
            <img height="300px" style="object-fit: cover; width:300px" class="mb-3"
                src="{{ asset('uploads/' . @$information->featured_photo) }}" alt="">
        @endif

    </div>





    {{-- price --}}
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Price</span>
                </div>
                {!! Form::text('price', @$information->price, ['placeholder' => 'Price in Rs.', 'class' => 'form-control']) !!}
            </div>
        </div>
    </div>

    {{-- Price Negotiable --}}
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Price Negotiable</span>
                </div>

                @php
                    $negotiation = [
                        '0' => 'No',
                        '1' => 'Yes',
                    ];
                @endphp
                {!! Form::select('price_negotiable', $negotiation, null, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>


    {{-- floor --}}
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Floor</span>
                </div>
                {!! Form::select('floor_id', $floors, null, ['placeholder' => 'Select Floor', 'class' => 'form-control']) !!}

            </div>
        </div>
    </div>
    {{-- road size --}}
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Road Size</span>
                </div>
                {!! Form::select('road_size_id', $road_sizes, null, ['placeholder' => 'Select Road Size', 'class' => 'form-control']) !!}

            </div>
        </div>
    </div>

    {{-- location --}}

    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Location</span>
                </div>
                {!! Form::select('location_id', $locations, null, ['placeholder' => 'Select Location', 'class' => 'form-control']) !!}

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
                        '0' => 'Pending',
                        '2' => 'Fulfilled /Expired',
                    ];
                @endphp
                {!! Form::select('status', $status, null, ['placeholder' => 'Select option', 'class' => 'form-control']) !!}

            </div>
        </div>
    </div>


    {{-- Views --}}

    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Views</span>
                </div>
                {!! Form::number('view', null, ['placeholder' => 'Default Views', 'class' => 'form-control']) !!}


            </div>
        </div>
    </div>


    {{-- Additional Features --}}
    <div class="col-lg-12 col-md-12 col-sm-12">
        <h3>Additional Features</h3>
        @foreach ($additional_features as $value)
            <div class="form-group">
                <div class="input-group">
                    <input class="form-control" type="checkbox" name="feature_id[]" value="{{ $value->id }}"
                        @if (in_array($value->id, $checked_features)) checked @endif> {{ $value->title }}
                </div>
            </div>
        @endforeach
    </div>


    {{-- Featured Video --}}
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Featured Video Link</span>
                </div>
                {!! Form::text('featured_video', null, ['placeholder' => 'Youtube link of your video', 'class' => 'form-control']) !!}
            </div>
        </div>


        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Featured Video</span>
                </div>
                {!! Form::file('video', ['accept' => 'video/*', 'class' => 'form-control']) !!}
            </div>
        </div>


        @if (@$information->video)
            <div id="video-div">

                <video width="320" height="240" controls>
                    <source src="{{ asset('uploads/' . @$information->video) }}" type="video/mp4">
                    <source src="{{ asset('uploads/' . @$information->video) }}" type="video/ogg">
                    Your browser does not support the video tag.
                </video>


                <button type="button" onclick="deleteVideo('{{ $information->id }}');" class="btn btn-danger"><i
                        class="fa fa-trash"></i></button>
        @endif
    </div>
</div>

</div>
