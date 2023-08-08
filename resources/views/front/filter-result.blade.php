<div class="col-md-9">
    <div class="row mb-3">
        <div class="col-md-9">

            @if($count_property<$per_page)
            <span>
                {{$count_property}} Showing of {{$count_property}} results
            </span>
        </div>
        @else
        <span>
            {{$per_page}} Showing of {{$count_property}} results
        </span>
    </div>
        @endif

        <div class="col-md-3">
            <div class="fieldBox d-flex align-items-center">
                <span for="" style="white-space: nowrap; font-size: 14px;">
                    Sort By
                </span>

                <x-sort-search :order="$order" />

            </div>
        </div>
    </div>

    <x-wide-ad :ads="$top_wide_advertisements"/>

    <div class="row">

        @foreach ($informations as $value)

        @php
            $className = 'col-md-3';
        @endphp
        <x-featured-recommended :value="$value"  :className="$className"/>

        {{-- <div class="col-md-3">
            <div class="singleProductBox">
                <div class="singleProductImg">
                    <img src="{{asset('uploads/'.$value->featured_photo)}}" alt="">
                    <div class="boxTag">
                        {{$value->purpose->title}}
                    </div>

                    @auth
                    <x-add-wish-list  :value="$value" />
                        @endauth

                    <div class="hoverBtn">
                        <a href="{{ route('property.detail', $value->slug) }}">
                            View More
                        </a>
                    </div>
                </div>
                <div class="singleBoxContent">
                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                        title=" {{$value->title}}">
                        <h4>
                            {{$value->title}}
                        </h4>
                    </a>
                    <div class="row">
                        <div class="col-12">
                            <div class="priceRange">
                                <p class="locationPin" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Location: {{$value->location->location}}">
                                    <span class="fas fa-map-pin"></span>
                                    {{@$value->location->location}}
                                </p>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="amenities" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Features: {{@$value->floor->title}} / @if($value->purpose_id !=2){{@$value->subcategory->title}} @else Capacity:  {{$value->capacity}} @endif">
                                <img src="{{asset('front/assets/imgs/apartment.svg')}}" alt="" height="13px" width="13px">
                                {{@$value->floor->title}} / @if($value->purpose_id !=2) {{@$value->subcategory->title}} @else  {{$value->capacity}} @endif
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="amenities" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Price: NPR. {{$value->price}} @if($value->price_negotiable) Negotiable @endif">
                                <img src="{{asset('front/assets/imgs/money.svg')}}" alt="" height="13px" width="13px">
                                NPR. {{$value->price}}
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="amenities" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Parking : {{$value->parking}}">
                                <img src="{{asset('front/assets/imgs/park.svg')}}" alt="" height="13px" width="13px">
                                {{$value->parking}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        @endforeach

    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="fieldBox d-flex align-items-center">
                <select name="per_page" id="per_page" class="formCustom" onchange="this.form.submit()">
                    <option value="12" {{old('per_page',@$per_page)==12?'selected':''}} >12 per page</option>
                    <option value="20" {{old('per_page',@$per_page)==20?'selected':''}}>20 per page</option>
                    <option value="32" {{old('per_page',@$per_page)==32?'selected':''}}>32 per page</option>
                </select>
            </div>
        </div>
        <div class="col-md-9">
          {{$informations->render()}}
        </div>
    </div>

</form>
</div>
