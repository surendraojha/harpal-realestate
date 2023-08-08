<div class="col-12 mb-3">
    <div class="d-inline-flex mb-4 border-bottom ">
        <span class="form-nuumber">1.</span>
        <div>
            <h6 class="mb-0 formsmall-title">
                Basic Details
            </h6>
            <span class="d-block mt-2">
                All the fileds with <span class="text-danger"> * </span>are mandotary
            </span>
        </div>
    </div>
</div>
<div class="col-12">
    <div class="singleformbox">
        <div class="row">

            {{-- purpose --}}

            <div class="col-md-2 mb-3">
                <div class="form-floating customForm">
                    <select class="form-select form-control {{ $errors->has('purpose_id') ? ' is-invalid' : '' }}"
                        id="purpose_id" name="purpose_id" aria-label="Floating label select example">
                        @foreach ($purposes as $value)
                            <option value="{{ $value->id }}"
                                {{ old('purpose_id', @$information->purpose_id) == $value->id ? 'selected' : '' }}>
                                {{ $value->title }}</option>
                        @endforeach

                    </select>
                    <label for="purpose">Purpose <span class="text-danger">*</span></label>


                    @error('purpose_id')
                        <span class="invalid-custom" role="alert">

                            {{ $message }}
                        </span>
                    @enderror

                    <span id="purpose-id-error" class="invalid-custom" role="alert">
                    </span>
                </div>
            </div>

            {{-- title --}}
            <div class="col-md-10 mb-3">
                <div class="form-floating customForm">
                    <input type="text" name="title"
                        class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}"
                        value="{{ old('title', @$information->title) }}" id="title" placeholder="Propety Title">
                    <label for="fName">
                        Your Title <span class="text-danger">*</span>
                    </label>



                </div>

                @error('title')
                    <span class="invalid-custom" role="alert">

                        {{ $message }}
                    </span>
                @enderror

                <span id="title-error" class="invalid-custom" role="alert">
                </span>
            </div>

            {{-- main photo --}}

            <div class="col-md-5">
                <div class="form-floating customForm">
                    <input type="file" name="featured_photo" accept="image/*"
                        class="form-control {{ $errors->has('featured_photo') ? ' is-invalid' : '' }}"
                        id="featured_photo">
                    <label for="price">
                        Main Photo
                        {{-- <span class="text-danger">*</span> --}}
                    </label>
                </div>


                @error('featured_photo')
                    <span class="invalid-custom" role="alert">

                        {{ $message }}
                    </span>
                @enderror

                <span id="featured-photo-error" class="invalid-custom" role="alert"></span>

                <a href="#" class="d-block mb-4" onclick="event.preventDefault();addPhotos()" class="a">Add
                    More Photos <i class="fas fa-plus"></i></a>

                @if (@$information->featured_photo)
                    <img src="{{ asset('uploads/' . @$information->featured_photo) }}" alt="">
                @endif


                <div id="add-more-photos">

                    @php
                        $current_route = \Request::route()->getName();
                    @endphp


                    @if ($current_route == 'admin-residental-property.edit')
                        @include('admin.property.edit-photos')
                    @endif
                </div>
            </div>


            {{-- price --}}
            <div class="col-md-4">
                <div class="form-floating customForm">
                    <input type="text" name="price"
                        class="form-control {{ $errors->has('price') ? ' is-invalid' : '' }}" id="price"
                        placeholder="" value="{{ old('price', @$information->price) }}">
                    <label for="price">
                        Price *<span>eg. Rs 5000 per month</span>
                    </label>
                    @error('price')
                        <span class="invalid-custom" role="alert">
                            {{ $message }}
                        </span>
                    @enderror

                    <span id="price-error" class="invalid-custom" role="alert"></span>
                </div>
            </div>


            {{-- Price Negotiable --}}
            <div class="col-md-3">
                <div class="form-floating customForm">
                    @php
                        $negotiation = [
                            '' => 'Select Option',
                            '0' => 'No',
                            '1' => 'Yes',
                        ];
                    @endphp
                    {!! Form::select('price_negotiable', $negotiation, @$information->price_negotiable, ['class' => 'form-select form-control ' . ($errors->has('price_negotiable') ? ' is-invalid' : ''), '', 'id' => 'price_negotiable']) !!}
                    <label for="">Price Negotiable <span class="text-danger">*</span></label>
                    @error('price_negotiable')
                        <span class="invalid-custom" role="alert">
                            {{ $message }}
                        </span>
                    @enderror

                    <span id="price-negotiable-error" class="invalid-custom" role="alert"></span>

                </div>
            </div>

            {{-- Categories --}}
            <div class="col-md-6 mb-3">
                <div class="form-floating customForm">
                    <input type="hidden" name="category_id" value="1">
                </div>
            </div>


            @php
                $subcategories = \App\Models\Category::where('parent', 1)
                    ->orderBy('order')
                    ->where('status', 1)
                    ->get();

            @endphp

            {{-- Subcategory --}}
            <div class="col-md-6 mb-3">
                <div class="form-floating customForm">
                    <select
                        class="form-select form-control {{ $errors->has('sub_category_id') ? ' is-invalid' : '' }}"
                        id="sub_category_id" aria-label="Floating label select example" name="sub_category_id">
                        <option value="" disabled selected>Select Option</option>
                        @foreach ($subcategories as $value)
                            <option value="{{ $value->id }}"
                                {{ old('sub_category_id', @$information->sub_category_id) == $value->id ? 'selected' : '' }}>
                                {{ $value->title }}</option>
                        @endforeach
                    </select>


                    <label for="sub_category_id">Category<span class="text-danger">*</span></label>


                    @error('sub_category_id')
                        <span class="invalid-custom" role="alert">

                            {{ $message }}
                        </span>
                    @enderror

                    <span id="sub-category-id-error" class="invalid-custom" role="alert">
                    </span>
                </div>
            </div>




        </div>
    </div>
</div>


{{-- second step --}}

<div class="col-12">
    <div class="d-inline-flex mb-4 border-bottom ">
        <span class="form-nuumber">2.</span>
        <div>
            <h6 class="mb-0 formsmall-title">
                Amenities
            </h6>
            <span class="d-block mt-2">
                All the fileds with <span class="text-danger"> * </span>are mandotary
            </span>
        </div>
    </div>
</div>
<div class="col-12">
    <div class="singleformbox">





        <div class="row">
            {{-- Date Of Build --}}

            @if (@$information)
                <x-date-of-build :information="$information" />
            @else
                <x-date-of-build />

            @endif
            {{-- BedRoom --}}
            <div class="col-md-4 mb-3">
                <div class="form-floating customForm">
                    <input type="text" name="bedroom"
                        class="form-control {{ $errors->has('bedroom') ? ' is-invalid' : '' }}" id="bedroom"
                        placeholder="eg. 1,2,3 .." value="{{ old('bedroom', @$information->bedroom) }}">
                    <label for="bedroom">
                        Bed Room <span>eg. 1,2,3</span>
                    </label>


                    @error('bedroom')
                        <span class="invalid-custom" role="alert">

                            {{ $message }}
                        </span>
                    @enderror

                    <span id="bedroom-error" class="invalid-custom" role="alert">
                    </span>
                </div>
            </div>



            {{-- Shitting Rooms --}}
            <div class="col-md-4 mb-3">
                <div class="form-floating customForm">
                    <input type="text" name="shitting_room"
                        class="form-control {{ $errors->has('shitting_room') ? ' is-invalid' : '' }}" id="shitting_room"
                        placeholder="eg. 1,2,3 .." value="{{ old('shitting_room', @$information->shitting_room) }}">
                    <label for="shitting_room">
                        Sitting Rooms <span>eg. 1,2,3</span>
                    </label>


                    @error('shitting_room')
                        <span class="invalid-custom" role="alert">

                            {{ $message }}
                        </span>
                    @enderror

                    <span id="shitting_room-error" class="invalid-custom" role="alert">
                    </span>
                </div>
            </div>





            {{-- Kitchen --}}
            <div class="col-md-4 mb-3">
                <div class="form-floating customForm">



                    @php
                        $kitchen = [
                            '' => 'Select Kitchen',
                            '1' => 'Yes',
                            '0' => 'No',
                        ];
                    @endphp
                    {!! Form::select('kitchen', $kitchen, @$information->kitchen, ['class' => 'form-select form-control', 'id' => 'kitchen']) !!}

                    <label for="kitchen">Kitchen</label>

                    @error('kitchen')
                        <span class="invalid-custom" role="alert">

                            {{ $message }}
                        </span>
                    @enderror

                    <span id="kitchen-error" class="invalid-custom" role="alert">
                    </span>
                </div>
            </div>

            {{-- Bath Room --}}
            <div class="col-md-4 mb-3">
                <div class="form-floating customForm">
                    <input type="text" name="bathroom"
                        class="form-control {{ $errors->has('bathroom') ? ' is-invalid' : '' }}" id="bathroom"
                        placeholder="eg. 1,2,3 .." value="{{ old('bathroom', @$information->bathroom) }}">
                    <label for="bathroom">
                        Bath Room <span>eg. 1,2,3 ..</span>
                    </label>


                    @error('bathroom')
                        <span class="invalid-custom" role="alert">

                            {{ $message }}
                        </span>
                    @enderror

                    <span id="bathroom-error" class="invalid-custom" role="alert">
                    </span>
                </div>
            </div>

            {{-- Furnishing --}}
            <div class="col-md-4 mb-3">
                <div class="form-floating customForm">


                    @php
                        $furnishing = [
                            '' => 'Select Option',
                            'Yes' => 'Yes',
                            'No' => 'No',
                            'Semi Furnished' => 'Semi Furnished',
                        ];
                    @endphp
                    {!! Form::select('furnishing', $furnishing, @$information->furnishing, ['class' => 'form-select form-control', 'id' => 'furnishing']) !!}

                    <label for="">Furnishing</label>

                    @error('furnishing')
                        <span class="invalid-custom" role="alert">

                            {{ $message }}
                        </span>
                    @enderror


                    <span id="furnishing-error" class="invalid-custom" role="alert">
                    </span>
                </div>
            </div>


            {{-- Faced --}}
            <div class="col-md-4 mb-3">
                <div class="form-floating customForm">


                    @php
                        $faced = [
                            '' => 'Select Option',
                            'East' => 'East',
                            'West' => 'West',
                            'North' => 'North',
                            'South' => 'South',
                        ];
                    @endphp
                    {!! Form::select('faced', $faced, @$information->faced, ['class' => 'form-select form-control ', 'id' => 'faced']) !!}

                    <label for="">Faced</label>

                    @error('faced')
                        <span class="invalid-custom" role="alert">

                            {{ $message }}
                        </span>
                    @enderror

                    <span id="faced-error" class="invalid-custom" role="alert">
                    </span>
                </div>
            </div>

            {{-- Parking --}}
            <div class="col-md-4 mb-3">
                <div class="form-floating customForm">



                    <select name="parking" id="parking"
                        class="form-control {{ $errors->has('parking') ? ' is-invalid' : '' }}">
                        <option value="" disabled selected>--Select Option--</option>
                        <option value="Yes"
                            {{ old('parking', @$information->parking == 'Yes' ? 'selected' : '') }}>
                            Yes
                        </option>
                        <option value="No"
                            {{ old('parking', @$information->parking == 'No' ? 'selected' : '') }}>No
                        </option>
                    </select>

                    <label for="parking">
                        Parking
                    </label>


                    @error('parking')
                        <span class="invalid-custom" role="alert">

                            {{ $message }}
                        </span>
                    @enderror

                    <span id="parking-error" class="invalid-custom" role="alert">
                    </span>
                </div>
            </div>
            {{-- Balcony --}}
            <div class="col-md-4 mb-3">
                <div class="form-floating customForm">
                    <select name="balcony" id="balcony"
                        class="form-select form-control {{ $errors->has('balcony') ? ' is-invalid' : '' }}">
                        <option value="" disabled selected>Select Option</option>
                        <option value="1"
                            {{ old('balcony', @$information->balcony) == '1' ? 'selected' : '' }}>Yes
                        </option>
                        <option value="0"
                            {{ old('balcony', @$information->balcony) == '0' ? 'selected' : '' }}>No
                        </option>
                    </select>
                    <label for="balcony">
                        Balcony
                    </label>


                    @error('balcony')
                        <span class="invalid-custom" role="alert">

                            {{ $message }}
                        </span>
                    @enderror

                    <span id="balcony-error" class="invalid-custom" role="alert">
                    </span>
                </div>
            </div>


            {{-- floor --}}
            <div class="col-md-4 mb-3">
                <div class="form-floating customForm">
                    <select name="floor_id" id="floor_id"
                        class="form-select form-control {{ $errors->has('floor_id') ? ' is-invalid' : '' }}">
                        <option value="" disabled selected>Select Option</option>
                        @foreach ($floors as $value)
                            <option value="{{ $value->id }}"
                                {{ old('floor_id', @$information->floor_id) == $value->id ? 'selected' : '' }}>
                                {{ $value->title }}</option>
                        @endforeach
                    </select>
                    <label for="floor_id">
                      Rental  Floor
                    </label>


                    @error('floor_id')
                        <span class="invalid-custom" role="alert">

                            {{ $message }}
                        </span>
                    @enderror

                    <span id="floor-id-error" class="invalid-custom" role="alert">
                    </span>
                </div>
            </div>

            {{-- Road Type --}}
            <div class="col-md-4 mb-3">
                <div class="form-floating customForm">
                    <select name="road_size_id" id="road_size_id"
                        class="form-select form-control {{ $errors->has('road_size_id') ? ' is-invalid' : '' }}">
                        <option value="" selected disabled>Select Option</option>
                        @foreach ($road_sizes as $value)
                            <option value="{{ $value->id }}"
                                {{ old('road_size_id', @$information->road_size_id) == $value->id ? 'selected' : '' }}>
                                {{ $value->title }}</option>
                        @endforeach
                    </select>
                    <label for="road_size_id">
                        Road Type
                    </label>


                    @error('road_size_id')
                        <span class="invalid-custom" role="alert">

                            {{ $message }}
                        </span>
                    @enderror

                    <span id="road-size-id-error" class="invalid-custom" role="alert">
                    </span>
                </div>
            </div>

            {{-- Water Facility --}}
            <div class="col-md-4 mb-3">
                <div class="form-floating customForm">

                    @php
                        $water = [
                            '' => 'Select Option',
                            '1' => 'Yes',
                            '0' => 'No',
                        ];
                    @endphp
                    {!! Form::select('water', $water, @$information->water, ['class' => 'form-select form-control ', 'id' => 'water']) !!}

                    <label for="water">Water</label>

                    @error('water')
                        <span class="invalid-custom" role="alert">

                            {{ $message }}
                        </span>
                    @enderror

                    <span id="water-error" class="invalid-custom" role="alert">
                    </span>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="col-12">
    <div class="d-inline-flex mb-4 border-bottom ">
        <span class="form-nuumber">2.</span>
        <div>
            <h6 class="mb-0 formsmall-title">
                More Details
            </h6>
            <span class="d-block mt-2">
                All the fileds with <span class="text-danger"> * </span>are mandotary
            </span>
        </div>
    </div>
</div>
<div class="col-12">
    <div class="singleformbox">
        <div class="row">

            {{-- Contact Number --}}
            <div class="col-md-6 mb-3">
                <div class="form-floating customForm">

                    @php
                        if (old('contact_number', @$information->contact_number)) {
                            $number = old('contact_number', @$information->contact_number);
                        } else {
                            $number = auth()->user()->phone;
                        }
                    @endphp

                    <input type="text" name="contact_number"
                        class="form-control {{ $errors->has('contact_number') ? ' is-invalid' : '' }}"
                        id="contact_number" placeholder="eg. 1,2,3 .." value="{{ $number }}">

                    <label for="bathroom">
                        Contact Number
                    </label>

                    @error('contact_number')
                        <span class="invalid-custom" role="alert">

                            {{ $message }}
                        </span>
                    @enderror

                    <span id="contact-number-error" class="invalid-custom" role="alert">
                    </span>
                </div>


            </div>



            {{-- Location --}}
            <div class="col-md-12 mb-3">


                <div class="append-locations mt-4 mb-4">
                    <div class="form-floating customForm">

                        <select name="location_id" id="location_id"
                            class="select2 {{ $errors->has('location_id') ? ' is-invalid' : '' }}">
                            <option value="" disabled selected>Select or Type Location <span
                                    class="text-danger">*</span></option>
                            @foreach ($locations as $value)
                                <option value="{{ $value->id }}"
                                    {{ old('location_id', @$information->location_id) == $value->id ? 'selected' : '' }}>
                                    {{ $value->location }}
                                </option>
                            @endforeach
                        </select>


                        {{-- <label for="propertyLocation">
                            Property Location *
                        </label> --}}

                        @error('location_id')
                            <span class="invalid-custom" role="alert">

                                {{ $message }}
                            </span>
                        @enderror

                        <span id="location-id-error" class="invalid-custom" role="alert">
                        </span>
                    </div>
                </div>

                <div class="form-floating customForm">
                    <input type="text" name="location_for_map"
                        class="form-control {{ $errors->has('location_for_map') ? ' is-invalid' : '' }}"
                        id="geo-code" placeholder="eg. latitude and longitude"
                        value="{{ old('location_for_map', @$information->location_for_map) }}">
                    <label for="geo-code">
                        Location if have latitude and longitude (optional)
                    </label>


                    @error('location_for_map')
                        <span class="invalid-custom" role="alert">

                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <hr />
            </div>



            {{-- Overview --}}
            <div class="col-md-12 mb-3">
                <label for="overview">
                    Description
                </label>
                <div class="form-floating customForm">


                    <textarea name="overview" id=""
                        class="form-control ckeditor {{ $errors->has('overview') ? ' is-invalid' : '' }}"
                        placeholder="eg. Describe About Your Property">{{ old('overview', @$information->overview) }}</textarea>


                    @error('overview')
                        <span class="invalid-custom" role="alert">

                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>

            <div class="col-md-12 mb-3">

                <div class="customForm">
                    <span class="radioTitle">
                        Local Area Facilities
                    </span>


                    <div class="d-flex " style="flex-wrap: wrap">
                        @foreach ($additional_features as $value)
                            <div class="form-check mb-2" style="white-space: nowrap">
                                <input class="form-check-input" name="feature_id[]"
                                    @if (@$checked_features) @if (in_array($value->id, $checked_features))
                                        checked @endif
                                    @endif

                                type="checkbox"
                                value="{{ $value->id }}" id="feature{{ $value->id }}">
                                <label class="form-check-label" for="feature{{ $value->id }}">
                                    {{ $value->title }}
                                </label>
                            </div>
                            {{-- <div class="form-check">
                        <input class="form-check-input" name="post" type="radio" value="" id="female">
                        <label class="form-check-label" for="female">
                            Famale
                        </label>
                    </div> --}}
                        @endforeach

                    </div>
                </div>
            </div>

            {{-- Featured Video --}}

            <div class="col-md-6 mb-3">
                <div class="form-floating customForm">
                    <input type="file" accept="video/*" name="video" id="video"
                        class="form-control {{ $errors->has('video') ? ' is-invalid' : '' }}" id="featured_video">
                    <label for="video">
                        Featured Video
                    </label>


                    <x-unselect-video />

                    @error('video')
                        <span class="invalid-custom" role="alert">

                            {{ $message }}
                        </span>
                    @enderror
                </div>

                @if (@$information->video)
                    <video width="320" height="240" controls>
                        <source src="{{ asset('uploads/' . @$information->video) }}" type="video/mp4">
                        <source src="{{ asset('uploads/' . @$information->video) }}" type="video/ogg">
                        Your browser does not support the video tag.
                    </video>

                @endif

            </div>


            {{-- status --}}
            <div class="col-md-6 mb-3">
                <div class="form-floating customForm">
                    <select name="status" id="status" class="form-control">
                                            <option value="" selected disabled>Select Option</option>

                        <option value="1" {{ old('status', @$information->status) == "1" ? 'selected' : '' }}>
                            Active
                        </option>
                        <option value="0" {{ old('status', @$information->status) == "0" ? 'selected' : '' }}>
                            InActive
                        </option>
                    </select>


                    <label for="status">
                        Status
                    </label>



                </div>


            </div>


            {{-- view --}}
            <div class="col-md-6 mb-3">
                <div class="form-floating customForm">
                    <input type="number" class="form-control" name="view" id="view"
                        value="{{ old('view', @$information->view) }}">


                    <label for="view">
                        Views
                    </label>



                </div>


            </div>

            {{-- Video COde --}}
            <div class="col-md-6 mb-3">
                <div class="form-floating customForm">
                    <input type="text" class="form-control" name="video_code" id="video_code"
                        value="{{ old('video_code', @$information->video_code) }}">


                    <label for="view">
                        Video Code
                    </label>



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
    </div>
</div>
