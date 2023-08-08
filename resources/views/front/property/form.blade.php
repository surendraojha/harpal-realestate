
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
                            <div class="col-md-2 mb-3">
                                <div class="form-floating customForm">
                                    <select class="form-select form-control {{ $errors->has('purpose_id') ? ' is-invalid' : '' }}" id="purpose_id" name="purpose_id"
                                        aria-label="Floating label select example">
                                        @foreach ($purposes as $value)
                                            <option value="{{ $value->id }}"
                                                {{ old('purpose_id',@$information->purpose_id) == $value->id ? 'selected' : '' }}>{{ $value->title }}</option>
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
                                    value="{{ old('title',@$information->title) }}" id="title"
                                        placeholder="eg.John" >
                                    <label for="fName">
                                        Rental Title <span class="text-danger">*</span>
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

                            {{-- Categories --}}
                            <div class="col-md-6 mb-3">
                                <div class="form-floating customForm">


                                    @livewire('property-category', ['categories' => $categories])


                                </div>
                            </div>

                            @php
                                $subcategories = \App\Models\Category::where('parent',old('category_id',@$information->category_id))->get();

                            @endphp

                            {{-- Subcategory --}}
                            <div class="col-md-6 mb-3">
                                <div class="form-floating customForm">
                                    <select class="form-select form-control {{ $errors->has('sub_category_id') ? ' is-invalid' : '' }}" id="sub-category"
                                        aria-label="Floating label select example" name="sub_category_id" >
                                        <option disabled selected>Select Option</option>
                                        @foreach ($subcategories as $value)
                                            <option value="{{$value->id}}"
                                                {{ old('sub_category_id',@$information->sub_category_id) == $value->id ? 'selected' : '' }}

                                                >{{$value->title}}</option>
                                        @endforeach
                                    </select>


                                    <label for="title">Rooms Type <span class="text-danger">*</span></label>


                                    @error('sub_category_id')

                                        <span class="invalid-custom" role="alert">

                                            {{ $message }}
                                        </span>

                                    @enderror

                                    <span id="sub-category-id-error" class="invalid-custom" role="alert">
                                    </span>
                                </div>
                            </div>


                            <div class="col-md-5">
                                <div class="form-floating customForm">
                                    <input type="file" name="featured_photo" accept="image/*"  class="form-control {{ $errors->has('featured_photo') ? ' is-invalid' : '' }}" id="featured_photo">
                                    <label for="price">
                                        Main Photo <span class="text-danger">*</span>
                                    </label>
                                </div>


                                @error('featured_photo')

                                    <span class="invalid-custom" role="alert">

                                        {{ $message }}
                                    </span>

                                @enderror

                                <span id="featured-photo-error" class="invalid-custom" role="alert">
                                </span>

                            </div>


                            {{-- price --}}
                            <div class="col-md-4">
                                <div class="form-floating customForm">
                                    <input type="text" name="price"
                                    class="form-control {{ $errors->has('price') ? ' is-invalid' : '' }}"  id="price"
                                     placeholder=""
                                        value="{{ old('price',@$information->price) }}">
                                    <label for="price">
                                        Price  *<span>eg. Rs 5000 per month</span>
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
                                            ''=>'Select Option',
                                            '0' => 'No',
                                            '1' => 'Yes',
                                        ];
                                    @endphp
                                    {!! Form::select('price_negotiable', $negotiation, @$information->price_negotiable, ['class' => 'form-select form-control '.($errors->has('price_negotiable') ?' is-invalid' : '' ) , '' , 'id'=>'price_negotiable']) !!}
                                    <label for="">Price Negotiable <span class="text-danger">*</span></label>
                                    @error('price_negotiable')
                                        <span class="invalid-custom" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                <span id="price-negotiable-error" class="invalid-custom" role="alert"></span>

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
                            <div class="col-md-4 mb-3">
                                <div class="form-floating customForm">
                                    <select name="date_of_build" id="" class="form-select form-control  {{ $errors->has('date_of_build') ? ' is-invalid' : '' }}">
                                        @foreach ($years as $value)
                                            <option value="{{ $value }}" {{ old('date_of_build',@$information->date_of_build) == $value ? 'selected' : '' }}>
                                                {{ $value }}</option>
                                        @endforeach
                                    </select>
                                    <label for="date_of_build">
                                        Date Of Build
                                    </label>


                                    @error('date_of_build')

                                        <span class="invalid-custom" role="alert">

                                            {{ $message }}
                                        </span>

                                    @enderror
                                </div>
                            </div>



                            {{-- BedRoom --}}
                            <div class="col-md-4 mb-3">
                                <div class="form-floating customForm">
                                    <input type="text" name="bedroom" class="form-control {{ $errors->has('bedroom') ? ' is-invalid' : '' }}" id="bedroom" placeholder="eg. 1,2,3 .."
                                        value="{{ old('bedroom',@$information->bedroom) }}" >
                                    <label for="bedroom">
                                        Bed Room *<span>eg. 1,2,3</span>
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

                            <livewire:commercial-property />


                            {{-- @livewire('commercial-property') --}}



                            {{-- No. Of Kitchen --}}
                            <div class="col-md-4 mb-3">
                                <div class="form-floating customForm">



                                    @php
                                        $kitchen = [
                                            '' => 'Select Kitchen',
                                            '1' => 'Yes',
                                            '0' => 'No'
                                        ];
                                    @endphp
                                    {!! Form::select('kitchen', $kitchen, @$information->kitchen, ['class' => 'form-select form-control']) !!}

                                    <label for="">Kitchen</label>

                                    @error('kitchen')

                                        <span class="invalid-custom" role="alert">

                                            {{ $message }}
                                        </span>

                                    @enderror
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
                                    {!! Form::select('furnishing', $furnishing, @$information->furnishing, ['class' => 'form-select form-control']) !!}

                                    <label for="">Furnishing</label>

                                    @error('furnishing')

                                        <span class="invalid-custom" role="alert">

                                            {{ $message }}
                                        </span>

                                    @enderror
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
                                    {!! Form::select('faced', $faced, @$information->faced, ['class' => 'form-select form-control ']) !!}

                                    <label for="">Faced</label>

                                    @error('faced')

                                        <span class="invalid-custom" role="alert">

                                            {{ $message }}
                                        </span>

                                    @enderror
                                </div>
                            </div>



                            {{-- Area Covered --}}
                            <div class="col-md-4 mb-3">
                                <div class="form-floating customForm">

                                    <input type="text" name="area_covered" class="form-control {{ $errors->has('area_covered') ? ' is-invalid' : '' }}" id="area_covered"
                                        placeholder="eg. 1,2,3 .." value="{{ old('area_covered',@$information->area_covered) }}">


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


                            {{-- Build Up Area --}}
                            <div class="col-md-4 mb-3">
                                <div class="form-floating customForm">

                                    <input type="text" name="buld_up_area" class="form-control {{ $errors->has('buld_up_area') ? ' is-invalid' : '' }}" id="buld_up_area"
                                        placeholder="eg. 1,2,3 .." value="{{ old('buld_up_area',@$information->buld_up_area) }}">

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




                            {{-- Bath Room --}}
                            <div class="col-md-4 mb-3">
                                <div class="form-floating customForm">
                                    <input type="text" name="bathroom" class="form-control {{ $errors->has('bathroom') ? ' is-invalid' : '' }}" id="bathroom" placeholder="eg. 1,2,3 .."
                                        value="{{ old('bathroom',@$information->bathroom) }}" >
                                    <label for="bathroom">
                                        Bath Room *<span>eg. 1,2,3 ..</span>
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


                            {{-- Parking --}}
                            <div class="col-md-4 mb-3">
                                <div class="form-floating customForm">
                                    <input type="text" name="parking" class="form-control {{ $errors->has('parking') ? ' is-invalid' : '' }}" id="parking"
                                        placeholder="eg. Avaible For 2 Bikes" value="{{ old('parking',@$information->parking) }}">
                                    <label for="parking">
                                        Parking <span>eg. Avaible For 2 Bikes</span>
                                    </label>


                                    @error('parking')

                                        <span class="invalid-custom" role="alert">

                                            {{ $message }}
                                        </span>

                                    @enderror
                                </div>
                            </div>




                            {{-- floor --}}
                            <div class="col-md-4 mb-3">
                                <div class="form-floating customForm">
                                    <select name="floor_id" id="floor_id" class="form-select form-control {{ $errors->has('floor_id') ? ' is-invalid' : '' }}" >
                                        <option value="" disabled selected>Select Option</option>
                                        @foreach ($floors as $value)
                                            <option value="{{ $value->id }}"
                                                {{old('floor_id',@$information->floor_id)==$value->id?'selected':''}}
                                                >{{ $value->title }}</option>
                                        @endforeach
                                    </select>
                                    <label for="floor_id">
                                        Floor *
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


                            {{-- Balcony --}}
                            <div class="col-md-4 mb-3">
                                <div class="form-floating customForm">
                                    <select name="balcony" id="balcony" class="form-select form-control {{ $errors->has('balcony') ? ' is-invalid' : '' }}">
                                        <option value="" disabled selected>Select Option</option>
                                        <option value="1" {{ old('balcony',@$information->balcony) == '1' ? 'selected' : '' }}>Yes</option>
                                        <option value="0" {{ old('balcony',@$information->balcony) == '0' ? 'selected' : '' }}>No</option>
                                    </select>
                                    <label for="balcony">
                                        Balcony
                                    </label>


                                    @error('balcony')

                                        <span class="invalid-custom" role="alert">

                                            {{ $message }}
                                        </span>

                                    @enderror
                                </div>
                            </div>


                            {{-- Water Facility --}}
                            <div class="col-md-4 mb-3">
                                <div class="form-floating customForm">
                                    <input type="text" name="water" class="form-control {{ $errors->has('water') ? ' is-invalid' : '' }}" id="water" placeholder="eg. 4 Time A Week"
                                        value="{{ old('water',@$information->water) }}" >
                                    <label for="water">
                                        Water Facility *<span>eg. 4 Time A Week</span>
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






                            {{-- Road Sizes --}}
                            <div class="col-md-4 mb-3">
                                <div class="form-floating customForm">
                                    <select name="road_size_id" id="road_size_id"
                                     class="form-select form-control {{ $errors->has('road_size_id') ? ' is-invalid' : '' }}" >
                                        <option value="" selected disabled>Select Option</option>
                                        @foreach ($road_sizes as $value)
                                            <option value="{{ $value->id }}" {{ old('road_size_id',@$information->road_size_id) == $value->id ? 'selected' : '' }}>
                                                {{ $value->title }}</option>
                                        @endforeach
                                    </select>
                                    <label for="road_size_id">
                                        Road Size
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
                                        if(old('contact_number',@$information->contact_number)){
                                            $number = old('contact_number',@$information->contact_number);
                                        }else{
                                            $number = $user->phone;
                                        }
                                    @endphp

                                    <input type="text" name="contact_number"

                                    class="form-control {{ $errors->has('contact_number') ? ' is-invalid' : '' }}"
                                     id="contact_number"
                                        placeholder="eg. 1,2,3 .." value="{{ $number }}" >

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



                            {{-- Location For Map (optional) --}}
                            <div class="col-md-12 mb-3">


                                <div class="append-locations mt-4 mb-4">
                                    <div class="form-floating customForm">

                                        <select name="location_id" id="location_id"  class="select2 {{ $errors->has('location_id') ? ' is-invalid' : '' }}">
                                            <option value="" disabled selected>Select or Type Location <span class="text-danger">*</span></option>
                                            @foreach ($locations as $value)
                                                <option value="{{ $value->id }}"
                                                    {{ old('location_id',@$information->location_id) == $value->id ? 'selected' : '' }}>{{ $value->location }}
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
                                    <input type="text" name="location_for_map" class="form-control {{ $errors->has('location_for_map') ? ' is-invalid' : '' }}" id="water"
                                        placeholder="eg. latitude and longitude" value="{{ old('location_for_map',@$information->location_for_map) }}">
                                    <label for="water">
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


                                    <textarea name="overview" id=""  class="form-control ckeditor {{ $errors->has('overview') ? ' is-invalid' : '' }}"
                                        placeholder="eg. Describe About Your Property">{{ old('overview',@$information->overview) }}</textarea>


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


                                    <div class="d-flex">
                                        @foreach ($additional_features as $value)
                                            <div class="form-check">
                                                <input class="form-check-input" name="feature_id[]"
                                                @if(@$checked_features)

                                                    @if(in_array($value->id,$checked_features))
                                                        checked
                                                    @endif
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
                                    <input type="file" accept="video/*" name="video" id="video" class="form-control {{ $errors->has('video') ? ' is-invalid' : '' }}" id="featured_video">
                                    <label for="video">
                                        Featured Video
                                    </label>

                                    <button type="button" class="colorBtn" onclick="unselectVideo()">
                                        Unselect Video
                                    </button>

                                    @error('video')

                                        <span class="invalid-custom" role="alert">

                                            {{ $message }}
                                        </span>

                                    @enderror
                                </div>

                                @if(@$information->video)
                                    <video width="320" height="240" controls>
                                        <source src="{{asset('uploads/'.@$information->video)}}" type="video/mp4">
                                        <source src="{{asset('uploads/'.@$information->video)}}" type="video/ogg">
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
