
@if($value->status !=0)
<div class="{{$className}}">
    <div class="singleProductBox">
        <div class="singleProductImg"  >
            <img src="{{asset('uploads/'.$value->featured_photo)}}" alt="{{$value->title}}" >
            <div class="boxTag">

                @if($value->status==2)
                    Sold Out
                @else
                    {{$value->purpose->title}}
                @endif
            </div>

            @auth
            <x-add-wish-list  :value="$value" />

            @endauth

            <div class="hoverBtn" title="{{$value->title}}">
                <a href="{{route('property.detail',$value->slug)}}" title="{{$value->title}}">
                    View
                </a>
            </div>
        </div>
        <div class="singleBoxContent">
            <a href="{{route('property.detail',$value->slug)}}"  data-bs-toggle="tooltip" data-bs-placement="top"
             title="{{$value->title}}">
                <h4>
                    {{$value->title}}
                </h4>
            </a>
            <div class="row">
                <div class="col-12">
                    <div class="priceRange">
                        <p class="locationPin" data-bs-toggle="tooltip" data-bs-placement="top" title="Location: {{$value->location->location}}">
                            <span class="fas fa-map-pin"></span>
                            {{$value->location->location}}
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="amenities pe-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Category:{{@$value->subcategory->title}}
                        ">
                        <img src="{{asset('front/assets/imgs/apartment.svg')}}" alt="category" title="Category" height="13px" width="13px">


                      {{@$value->subcategory->title}}
                    </div>
                </div>
                <div class="col">

                    @php
                        $formatted_price = \App\Helpers\NumberHelper::formatnumber($value->price)
                    @endphp
                    <div class="amenities"  data-bs-toggle="tooltip" data-bs-placement="top" title="Price: NPR. {{$formatted_price}} @if($value->price_negotiable) Negotiable  @endif">
                        <img src="{{asset('front/assets/imgs/money.svg')}}" alt="price" title="Price" height="13px" width="13px">
                        NPR. {{$formatted_price}}
                    </div>
                </div>
{{--
                <div class="col-4">
                    <div class="amenities"  data-bs-toggle="tooltip" data-bs-placement="top" title="Parking : {{$value->parking}}">
                        <img src="{{asset('front/assets/imgs/park.svg')}}" alt="" height="13px" width="13px">
                        {{$value->parking}}
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endif

