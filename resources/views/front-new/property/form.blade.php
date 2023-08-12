<div class="row">
    <div class="col-md-12">
        <div class="md-form">
            <label for="title" class="">Title</label>

            @php
                $field = [
                    'type' => 'text',
                    'placeholder' => 'Title',
                    'class' => 'form-control',
                    'name' => 'title',
                    'id' => 'title',
                    'required' => false,
                ];
            @endphp
            <x-textbox :information="$field" :d="@$information" />
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <label>Main Category</label>
        <select name="main_category_id" id="main_category_id" class="form-control">
            <option value="">-- Type of Property --</option>
            @foreach ($categories as $value)
                <option value="{{ $value->id }}"
                    {{ old('main_category_id', @$information->subcategory->category->parent) == $value->id ? 'selected' : '' }}>
                    {{ $value->title }}</option>
            @endforeach

        </select>
    </div>
</div>

@php
    // dd(@$information->subcategory->category->parent);
    // try{
    $sub_categories = \App\Models\Category::where('parent', @$information->subcategory->category->parent)->get();
    // dd($sub_categories);
    // }catch(\Exception $e){
    //     dd($e);
    // }
@endphp
<div class="row">
    <div class="col-md-12">
        <label>Parent Category</label>
        <select name="sub_category_id" id="sub_category_id" class="form-control">
            <option value="">-- Type of Property --</option>

            @if (@$information)
                @foreach ($sub_categories as $value)
                    <option value="{{ $value->id }}"
                        {{ old('sub_category_id', $information->subcategory->category->id) == $value->id ? 'selected' : '' }}>
                        {{ $value->title }}</option>
                @endforeach

            @endif

        </select>
    </div>
</div>


@php
    // dd('hii');
    $child_categories = \App\Models\Category::where('parent', @$information->subcategory->parent)->get();

@endphp
<div class="row">
    <div class="col-md-12">
        <label>Category</label>
        <select name="child_category_id" id="child_category_id" class="form-control">
            <option value="">-- Select Option --</option>
            @if (@$information)

                @foreach ($child_categories as $value)
                    <option value="{{ $value->id }}"
                        {{ old('child_category_id', $information->sub_category_id) == $value->id ? 'selected' : '' }}>
                        {{ $value->title }}</option>
                @endforeach

            @endif

        </select>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <label>Purpose</label>
        <select name="purpose_id" id="purpose_id" class="form-control">
            <option value="">-- Select Option --</option>
            @foreach ($purposes as $value)
                <option value="{{ $value->id }}" {{ old('purpose_id', @$information->purpose_id)==$value->id?'selected':'' }}>
                    {{ $value->title }}</option>
            @endforeach

        </select>
    </div>
</div>



<div class="row">
    <div class="col-md-12">
        <label>Road Size</label>
        <select name="road_size_id" id="road_size_id" class="form-control" required>
            <option value="">-- Select Option --</option>
            @foreach ($road_types as $value)
                <option value="{{ $value->id }}" {{ old('road_size_id', @$information->road_size_id)==$value->id?'selected':'' }}>
                    {{ $value->title }}</option>
            @endforeach

        </select>
    </div>
</div>


{{-- <div class="row">
    <div class="col-md-12">
        <div class="md-form">
            <label for="message">Address</label>
        </div>
    </div>
    <div class="col-md-6">
        <div class="md-form">
            <input type="text" name="name" class="form-control" placeholder="street Name">
        </div>
    </div>
    <div class="col-md-6">
        <div class="md-form">
            <input type="text" name="name" class="form-control" placeholder="Post Code">
        </div>
    </div>
    <div class="col-md-6">
        <div class="md-form">
            <input type="text" name="name" class="form-control" placeholder="Province">
        </div>
    </div>
    <div class="col-md-6">
        <div class="md-form">
            <input type="text" name="name" class="form-control" placeholder="Country">
        </div>
    </div>
</div> --}}


<div class="row">
    <div class="col-md-12">
        <div class="md-form">
            <label for="location_for_map" class="">Location For Map</label>

            @php
                $field = [
                    'type' => 'text',
                    'placeholder' => 'latitude,longiture',
                    'class' => 'form-control',
                    'name' => 'location_for_map',
                    'id' => 'location_for_map',
                    'required' => false,
                ];

                // dd(@$information->$field['name'],$information);

            @endphp

            <x-textbox :information="$field" :d="@$information" />
        </div>
    </div>
</div>



<div class="row">
    {{-- <div class="col-md-12">
        <div class="md-form">
            <label for="message">Price </label>
        </div>
    </div> --}}
    <div class="col-md-6">
        <div class="md-form">

            <label for="message">Price </label>


            @php
                $field = [
                    'type' => 'number',
                    'placeholder' => 'Rs 123456.00',
                    'class' => 'form-control',
                    'name' => 'price',
                    'id' => 'price',
                    'required' => true,
                ];
            @endphp
            {{-- <x-textbox :information="$field" /> --}}
            <x-textbox :information="$field" :d="@$information" />

        </div>
    </div>
    <div class="col-md-6">
        <div class="md-form">
            @php
                $price_negotiable = [
                    '0' => 'No',
                    '1' => 'Yes',
                ];
            @endphp

            <label for="price_negotiable">Price Negotiable </label>


            <select name="price_negotiable" class="form-control" id="price_negotiable">
                @foreach ($price_negotiable as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="md-form">
            <label for="name" class="">Property Measurement</label>
        </div>
    </div>
    <div class="col-md-6">
        <div class="md-form">

            @php
                $field = [
                    'type' => 'number',
                    'placeholder' => '200 sq',
                    'class' => 'form-control',
                    'name' => 'area_covered',
                    'id' => 'area_covered',
                    'required' => true,
                ];
            @endphp
            <x-textbox :information="$field" :d="@$information" />


        </div>
    </div>







    <div class="col-md-6">
        <div class="md-form">
            @php
                $field = [
                    'type' => 'number',
                    'placeholder' => '200 sq',
                    'class' => 'form-control',
                    'name' => 'buld_up_area',
                    'id' => 'buld_up_area',
                    'required' => true,
                ];
            @endphp
            <x-textbox :information="$field" :d="@$information" />

        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="md-form">
            <label for="featured_photo">Featured Photo</label>



            <input type="file" class="form-control" name="featured_photo">



            @if (@$information->featured_photo)
                <img width="300px" src="{{ asset('uploads/' . $information->featured_photo) }}" alt="">
            @endif


        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="md-form">
            <label for="contact_number" class="">Mobile</label>
            @php
                $field = [
                    'type' => 'text',
                    'placeholder' => '98********',
                    'class' => 'form-control',
                    'name' => 'contact_number',
                    'id' => 'contact_number',
                    'required' => true,
                ];
            @endphp
            <x-textbox :information="$field" :d="@$information" />

        </div>
    </div>
</div>

<!--Grid row-->

<!--Grid row-->
<div class="row">
    <div class="col-md-12">

        <div class="md-form">
            <label for="message">Overview</label>
            <textarea id="overview" name="overview" rows="2" class="form-control md-textarea">{{ old('overview', @$information->overview) }}</textarea>
        </div>
    </div>
    <div class="col-12 col-sm-12 center-on-small-only">

        <button class="btn btn-primary" type="submit"> send</button>

    </div>
</div>
