@if($value->status !=0)

<div class="{{$className}}" title="{{$value->title}}">
    <div class="recomedPro">
        <a href="{{route('property.detail',$value->slug)}}"

        class="recLink">
            <img src="{{asset('uploads/'.$value->featured_photo)}}" alt="{{$value->title}}" title="{{$value->title}}">
            <div class="recomContent">
                <p class="locationPin" data-bs-toggle="tooltip" data-bs-placement="right" title="Location: {{$value->location->location}}">
                    <span class="fas fa-map-pin"></span>
                    {{$value->location->location}}
                </p>
                <h5   data-bs-toggle="tooltip" data-bs-placement="top" title="{!!$value->title!!}">
                    {{$value->title}}    @if($value->status==2)
                    (Sold Out)
                @else
                    {{$value->purpose->title}}
                @endif
                </h5>
            </div>
            <div class="priceTag">
                @php
                $formatted_price = \App\Helpers\NumberHelper::formatnumber($value->price)
            @endphp

                Rs. {{$formatted_price}}/-
            </div>
            {{-- <div class="tagName">
                Offer
            </div> --}}
        </a>
    </div>
</div>
@endif
