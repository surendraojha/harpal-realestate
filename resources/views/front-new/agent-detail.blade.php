@extends('front-new.layouts.main')

@section('content')
    <div class="agent-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <h1>{{ $information->name }}</h1>
                    <p><strong>{{ $information->experience }} Years Experience</strong></p>
                    <p>{{ $information->profile->about_me }}</p>

                    <p><i class="fa fa-phone"></i> {{ $information->phone }}</p>
                    <p><i class="fa fa-envelope"></i> {{ $information->email }}</p>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    @if ($information->profile->photo)
                        @php
                            $photo_path = asset('uploads/' . $information->profile->photo);
                        @endphp
                    @else
                        @php
                            $photo_path = asset('front/assets/imgs/user.webp');
                        @endphp
                    @endif
                    <img src="{{ $photo_path }}" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="propertylist-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <h4>More Listings</h4>
                </div>

                @foreach ($properties as $value)
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4">

                        <x-property-grid :information="$value" />
                    </div>
                    {{-- <div class="col-12 col-sm-12 col-md-4 col-lg-4">
            <div class="property-grid">
              <a href="#">
                <img src="./images/house6.jpg" alt="">
              </a>
              <div class="pro-box">
                <p class="for-sale">For Sale</p>
                <h5><a href="#">Property Title Here</a></h5>
                <p><i class="fa fa-map-marker-alt"></i> Anamnagar, Kathmandu</p>
                <ul class="listing">
                  <li>Listing Id: 1234</li>
                  <li>Area: 15 Katha</li>
                </ul>
                <h6>Rs. 5,00.000 <span> (Five Lakh)</span></h6>
                <ul class="comments">
                  <li><a href="#">10 <i class="fa-solid fa-thumbs-up"></i></a></li>
                  <li><a href="#">11 <i class="fa fa-comments"></i></a></li>
                  <li><a href="#">11 <i class="fa fa-eye"></i></a></li>
                  <li><a href="#">11 <i class="fa-sharp fa-solid fa-share-nodes"></i></a></li>
                </ul>
              </div>
            </div>
          </div> --}}
                @endforeach

                <x-pagination :informations="$properties" />

            </div>
        </div>
    </div>
@endsection
