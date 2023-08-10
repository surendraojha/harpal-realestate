@extends('front-new.layouts.main')

@section('content')


<div class="propertylist-section">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 page-title">
          <h1>{{ $title }}</h1>
        </div>
        @foreach ($informations as $value)

        <div class="col-12 col-sm-12 col-md-4 col-lg-4">

                <x-property-grid :information="$value" />
          {{-- <div class="property-grid">
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
          </div> --}}
        </div>

        @endforeach


        <div class="col-12 col-sm-12">
            <x-pagination :informations="$informations" />
        </div>
      </div>
    </div>
  </div>


@endsection
