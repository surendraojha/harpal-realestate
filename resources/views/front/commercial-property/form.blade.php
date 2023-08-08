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
            <input type="hidden" name="purpose_id" value="1">

            {{-- title --}}
            <div class="col-md-8 mb-3">
                <div class="form-floating customForm">
                    <input type="text" name="title"
                        class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}"
                        value="{{ old('title', @$information->title) }}" id="title" placeholder="eg.John" max="100">
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

            @php
                $subcategories = \App\Models\Category::where('parent', 3)
                    ->orderBy('order')
                    ->where('status',1)
                    ->get();
            @endphp

            {{-- Subcategory --}}
            <div class="col-md-4 mb-3">
                <div class="form-floating customForm">
                    <select
                        class="form-select form-control {{ $errors->has('sub_category_id') ? ' is-invalid' : '' }}"
                        id="sub_category_id" aria-label="Floating label select example"
                         name="sub_category_id">
                        <option value="" disabled selected>Select Option</option>
                        @foreach ($subcategories as $value)
                            <option value="{{ $value->id }}"
                                {{ old('sub_category_id', @$information->sub_category_id) == $value->id ? 'selected' : '' }}>
                                {{ $value->title }}</option>
                        @endforeach
                    </select>


                    <label for="sub_category_id">Category <span class="text-danger">*</span></label>


                    @error('sub_category_id')
                        <span class="invalid-custom" role="alert">

                            {{ $message }}
                        </span>
                    @enderror

                    <span id="sub-category-id-error" class="invalid-custom" role="alert">
                    </span>
                </div>
            </div>

            {{-- main photo --}}

            <div class="col-md-5">
                <label for="price">
                    Main Photo <span class="text-danger">*</span>
                </label>
                <div class="form-floating customForm">
                    <input type="file" name="featured_photo" accept="image/*"
                        class="form-control {{ $errors->has('featured_photo') ? ' is-invalid' : '' }}"
                        id="featured_photo">
                </div>


                @error('featured_photo')
                    <span class="invalid-custom" role="alert">

                        {{ $message }}
                    </span>
                @enderror

                <span id="featured-photo-error" class="invalid-custom" role="alert">
                </span>

                <a href="#" class="d-block mb-4" onclick="event.preventDefault();addPhotos()"
                    class="a">Add More Photos <i class="fas fa-plus"></i></a>


            </div>


            {{-- price --}}
            <div class="col-md-4">
                <div class="form-floating customForm">
                    <input type="text" name="price"
                        class="form-control {{ $errors->has('price') ? ' is-invalid' : '' }}" id="price"
                        placeholder="" value="{{ old('price', @$information->price) }}">
                    <label for="price">
                        Price  <span class="text-danger">*</span><span>eg. Rs 5000 per month</span>
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
            <div class="col-md-6">
                <div class="">
                    <input type="hidden" name="category_id" value="3">
                </div>
                @if (@$information->featured_photo)
                    <img src="{{ asset('uploads/' . @$information->featured_photo) }}" alt="">
                @endif
                <div id="add-more-photos">

                    @php
                        $current_route = \Request::route()->getName();

                    @endphp


                    @if ($current_route == 'commercial-property.edit')
                        @include('front.property.edit-photos')
                    @endif
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
            @if(@$information)
            <x-date-of-build :information="$information"/>
            @else
            <x-date-of-build />

            @endif

            {{-- Build Up Area --}}
            <div class="col-md-4 mb-3">
                <div class="form-floating customForm">

                    <input type="text" name="buld_up_area"
                        class="form-control {{ $errors->has('buld_up_area') ? ' is-invalid' : '' }}"
                        id="buld_up_area" placeholder="eg. 1,2,3 .."
                        value="{{ old('buld_up_area', @$information->buld_up_area) }}">

                    <label for="bathroom">
                        Build Up Area
                    </label>

                    @error('buld_up_area')
                        <span class="invalid-custom" role="alert">

                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>

            {{-- Area Covered --}}
            <div class="col-md-4 mb-3">
                <div class="form-floating customForm">

                    <input type="text" name="area_covered"
                        class="form-control {{ $errors->has('area_covered') ? ' is-invalid' : '' }}"
                        id="area_covered" placeholder="eg. 1,2,3 .."
                        value="{{ old('area_covered', @$information->area_covered) }}">


                    <label for="bathroom">
                        Area Covered
                    </label>

                    @error('area_covered')
                        <span class="invalid-custom" role="alert">

                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>








            {{-- Parking --}}
            <div class="col-md-4 mb-3">
                <div class="form-floating customForm">



                    <select name="parking" id="parking"
                        class="form-select form-control {{ $errors->has('parking') ? ' is-invalid' : '' }}">
                        <option value="" disabled selected>--Select Option--</option>
                        <option value="Yes" {{ old('parking', @$information->parking == 'Yes' ? 'selected' : '') }}>
                            Yes
                        </option>
                        <option value="No" {{ old('parking', @$information->parking == 'No' ? 'selected' : '') }}>No
                        </option>
                    </select>

                    <label for="parking">
                        Parking <span class="text-danger">*</span>
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
                       Rental Floor
                         {{-- <span class="text-danger">*</span> --}}
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
                        Road Type  <span class="text-danger">*</span>
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

            {{-- Pantry --}}
            <div class="col-md-4 mb-3">
                <div class="form-floating customForm">
                    <select name="pantry" id="pantry"
                        class="form-select form-control {{ $errors->has('pantry') ? ' is-invalid' : '' }}">
                        <option value="" disabled selected>Select Option</option>
                        <option value="1" {{ old('pantry', @$information->pantry) == '1' ? 'selected' : '' }}>Yes
                        </option>
                        <option value="0" {{ old('pantry', @$information->pantry) == '0' ? 'selected' : '' }}>No
                        </option>
                    </select>
                    <label for="pantry">
                        Pantry
                         {{-- <span class="text-danger">*</span> --}}
                    </label>


                    @error('pantry')
                        <span class="invalid-custom" role="alert">

                            {{ $message }}
                        </span>
                    @enderror

                    <span id="pantry-error" class="invalid-custom" role="alert">
                    </span>
                </div>
            </div>


            {{-- Bath Room --}}
            <div class="col-md-4 mb-3">
                <div class="form-floating customForm">
                    <input type="number" name="bathroom"
                        class="form-control {{ $errors->has('bathroom') ? ' is-invalid' : '' }}" id="bathroom"
                        placeholder="eg. 1,2,3 .." value="{{ old('bathroom', @$information->bathroom) }}">
                    <label for="bathroom">
                        No Of. Bath Room
                         {{-- <span class="text-danger">*</span> --}}

                        <span>eg. 1,2,3 ..</span>
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


              {{-- Lift --}}
              <div class="col-md-4 mb-3">
                <div class="form-floating customForm">


                    @php
                        $water = [
                            '' => 'Select Option',
                            '1' => 'Yes',
                            '0' => 'No',
                        ];
                    @endphp
                    {!! Form::select('water', $water, @$information->water, ['class' => 'form-select form-control ','id'=>'water']) !!}

                    <label for="water">Water Facility
                      {{-- <span class="text-danger">*</span> --}}
                      </label>

                    @error('water')
                        <span class="invalid-custom" role="alert">

                            {{ $message }}
                        </span>
                    @enderror

                    <span id="water-error" class="invalid-custom" role="alert">
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
                    {!! Form::select('faced', $faced, @$information->faced, ['class' => 'form-select form-control ',

                        'id'=>'faced'
                    ]) !!}

                    <label for="">Faced
                    {{-- <span class="text-danger">*</span> --}}

                    </label>

                    @error('faced')
                        <span class="invalid-custom" role="alert">

                            {{ $message }}
                        </span>
                    @enderror



                    <span id="faced-error" class="invalid-custom" role="alert">
                    </span>
                </div>
            </div>




            {{-- Lift --}}
            <div class="col-md-4 mb-3">
                <div class="form-floating customForm">


                    @php
                        $lift = [
                            '' => 'Select Option',
                            '1' => 'Yes',
                            '0' => 'No',
                        ];
                    @endphp
                    {!! Form::select('lift', $lift, @$information->lift, ['class' => 'form-select form-control ','id'=>'lift']) !!}

                    <label for="lift">Elevator
                    {{-- <span class="text-danger">*</span> --}}

                    </label>

                    @error('lift')
                        <span class="invalid-custom" role="alert">

                            {{ $message }}
                        </span>
                    @enderror

                    <span id="lift-error" class="invalid-custom" role="alert">
                    </span>
                </div>
            </div>



             {{-- Shitting rooms --}}
            <div class="col-md-4 mb-3">
                <div class="form-floating customForm">



                    {!! Form::number('shitting_room', @$information->shitting_room, ['class' => 'form-select form-control ','id'=>'shitting_room']) !!}

                    <label for="shitting_room">Sitting Rooms

                    </label>

                    @error('shitting_room')
                        <span class="invalid-custom" role="alert">

                            {{ $message }}
                        </span>
                    @enderror

                    <span id="shitting-room-error" class="invalid-custom" role="alert">
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
                            $number = $user->phone;
                        }
                    @endphp

                    <input type="tel" name="contact_number"
                        class="form-control {{ $errors->has('contact_number') ? ' is-invalid' : '' }}"
                        id="contact_number" placeholder="eg. 1,2,3 .." value="{{ $number }}" max="15">

                    <label for="bathroom">
                        Contact Number  <span class="text-danger">*</span>
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
                            class="select2 {{ $errors->has('location_id') ? ' is-invalid' : '' }}" multiple>
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
                         id="location_for_map"
                        placeholder="eg. latitude and longitude"
                        value="{{ old('location_for_map', @$information->location_for_map) }}">
                    <label for="water">
                        Location if have latitude and longitude (optional)
                    </label>


                    @error('location_for_map')
                        <span class="invalid-custom" role="alert">

                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>

            {{-- Overview --}}
            <div class="col-md-12 mb-3">
                <label for="overview">
                    Description
                </label>
                <div class="form-floating customForm">


                    <textarea name="overview" id="" class="form-control ckeditor {{ $errors->has('overview') ? ' is-invalid' : '' }}"
                        placeholder="eg. Describe About Your Property">{{ old('overview', @$information->overview) }}</textarea>


                    @error('overview')
                        <span class="invalid-custom" role="alert">

                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>

            {{--  --}}
            @if(@$information)
                <x-local-area-facility :features="$additional_features"
                :checked="$checked_features" />
            @else


                <x-local-area-facility :features="$additional_features" />

            @endif

            {{-- Featured Video --}}
            <div class="col-md-6 mb-3">
                <label for="video">
                    Featured Video (Optional)
                </label>
                <div class="form-floating customForm">
                    <input type="file" accept="video/*" name="video" id="video"
                        class="form-control {{ $errors->has('video') ? ' is-invalid' : '' }}" id="featured_video">

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
        </div>
    </div>
</div>


<script>
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    }
</script>
