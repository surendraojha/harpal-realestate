@extends('front.layouts.main')


@section('title', 'Search Results ..')

@section('content')
    <section class="bannerSec">

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bannerImg">
                        <img src="{{asset('front/assets/imgs/aboutus.webp')}}" alt="">
                        <div class="bannerCaption">
                            <div class="siteTitle mt-4">
                                <h5 class="bannerTitle">
                                    {{$count_property}} Rooms on found
                                </h5>
                                <i class="bannersubTitle">
                                    @if($count_property<$per_page)
                                        <b>{{$count_property}} </b> Per page
                                    @else
                                        <b>{{$per_page}} </b> Per page
                                    @endif
                                </i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Single page banner ends -->
    <!-- Category page start -->
    <!-- Category page ends -->
    <!-- List Of Boxes -->
    <!-- Newest resendential FDeals -->
    <section class="siteSec pt-2 mt-4">
        <form action="{{route('filter.property')}}">

        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="categorySidebar">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <h4>
                                    Properties Filter
                                </h4>
                            </div>
                        </div>
                        <div class="accordion" id="accordionPanelsStayOpenExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="location-headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#location-collapseTwo" aria-expanded="false"
                                        aria-controls="location-collapseTwo">
                                        Choose Locations
                                    </button>
                                </h2>
                                <div id="location-collapseTwo" class="accordion-collapse collapse show"
                                    aria-labelledby="location-headingTwo">
                                    <div class="accordion-body">
                                        <div class="fieldBox">
                                            <select name="location[]" class="formCustom select2" multiple>

                                                @foreach ($locations as $value)
                                                    <option value="{{ $value->id }}"
                                                        @if(in_array($value->id,$location_id))
                                                            selected
                                                        @endif
                                                        >{{ $value->location }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="price-headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#price-collapseTwo" aria-expanded="false"
                                        aria-controls="price-collapseTwo">
                                        Price Range ( Rs. )
                                    </button>
                                </h2>
                                <div id="price-collapseTwo" class="accordion-collapse collapse show"
                                    aria-labelledby="price-headingTwo">
                                    <div class="accordion-body">
                                        <div class="price-input">
                                            <div class="field">
                                                <span>Min</span>
                                                <input type="number" name="min" class="input-min" value="{{$price_min}}">
                                            </div>
                                            <div class="separator">-</div>
                                            <div class="field">
                                                <span>Max</span>
                                                <input type="number" name="max" class="input-max" value="{{$price_max}}">
                                            </div>
                                        </div>
                                        {{-- <div class="slider">

                                            <div class="progress" style="left: 23%; right: 25%;"></div>
                                        </div>
                                        <div class="range-input">
                                            <input type="range" class="range-min" min="{{$min}}" max="{{$max}}" value="{{$price_min}}"
                                                step="100">
                                            <input type="range" class="range-max" min="{{$min}}" max="{{$max}}" value="{{$price_max}}"
                                                step="100">
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="propertyType-headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#propertyType-collapseOne" aria-expanded="true"
                                        aria-controls="propertyType-collapseOne">
                                        Property Type
                                    </button>
                                </h2>
                                <div id="propertyType-collapseOne" class="accordion-collapse show"
                                    aria-labelledby="propertyType-headingOne">
                                    <div class="accordion-body">

                                        @foreach ($categories as $value)
                                            <div>
                                                <b>{{ $value->title }}</b>
                                            </div>
                                            @foreach ($value->subcategory as $v)

                                            @if($v->status==1)
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic checkbox toggle button group">

                                                        <input type="checkbox" name="category_id[]" value="{{$v->id}}" class="btn-check" id="{{ $v->id }}"
                                                            autocomplete="off"   @if(in_array($v->id,$category_id))
                                                            checked
                                                        @endif>
                                                        <label class="btn btn-outline-primary"
                                                            for="{{ $v->id }}">{{ $v->title }}</label>


                                                </div>
                                            @endif
                                            @endforeach

                                        @endforeach




                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="rodeType-headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#rodeType-collapseOne" aria-expanded="true"
                                        aria-controls="rodeType-collapseOne">
                                        Road size
                                    </button>
                                </h2>
                                <div id="rodeType-collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="rodeType-headingOne">
                                    <div class="accordion-body">

                                        @foreach ($roadSizes as $value)
                                        <div class="form-check">
                                            <input class="form-check-input" name="road_size[]" type="checkbox" value="{{$value->id}}"
                                            id="roadSize{{$value->id}}"  @if(in_array($value->id,$road_size))
                                            checked
                                        @endif>
                                            <label class="form-check-label" for="roadSize{{$value->id}}">
                                                {{$value->title}}
                                            </label>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseTwo">
                                        Floor
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show"
                                    aria-labelledby="panelsStayOpen-headingTwo">
                                    <div class="accordion-body">

                                        @foreach ($floors as $value)
                                        <div class="form-check">
                                            <input class="form-check-input" name="floor[]" type="checkbox"
                                            @if(in_array($value->id,$floor))
                                            checked
                                        @endif

                                            value="{{$value->id}}" id="floor{{$value->id}}">
                                            <label class="form-check-label" for="floor{{$value->id}}">
                                                {{$value->title}}
                                            </label>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseThree">
                                        More Filters
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show"
                                    aria-labelledby="panelsStayOpen-headingThree">
                                    <div class="accordion-body">

                                        @foreach ($additional_features as $value)

                                        <div class="form-check">
                                            <input class="form-check-input" name="feature[]" type="checkbox"
                                            @if(in_array($value->id,$featured_id))
                                            checked
                                        @endif

                                            value="{{$value->id}}" id="additional-feature{{$value->id}}">
                                            <label class="form-check-label" for="additional-feature{{$value->id}}">
                                               {{$value->title}}
                                            </label>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="colorBtn px-3 py-2 d-block w-100 border-radius mt-3">
                            Apply Filter
                        </button>
                    </div>

                    </form>
                </div>
                @include('front.filter-result')
            </div>
        </div>
    </section>
@endsection


@section('script')
<script>
    $('#per_page').on('change',function(){

    });
</script>

@endsection
