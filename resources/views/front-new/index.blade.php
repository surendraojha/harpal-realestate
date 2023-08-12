@extends('front-new.layouts.main')

@section('content')
    <div class="banner-section">
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 dream-box">
                        <h1>Find it. Tour it. Own it.</h1>
                        <form>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="md-form">
                                        <input type="text" class="form-control" placeholder="Property Type">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="md-form">
                                        <input type="text" class="form-control" placeholder="Listing Type">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="md-form">
                                        <input type="text" class="form-control" placeholder="District">
                                    </div>
                                    <div class="md-form">
                                        <input type="text" class="form-control" placeholder="Gau/Nagarpalika">
                                    </div>
                                    <div class="md-form">
                                        <input type="text" class="form-control" placeholder="Ward No.">
                                    </div>
                                    <div class="md-form">
                                        <input type="text" class="form-control" placeholder="Tole">
                                    </div>
                                    <div class="md-form">
                                        <input type="text" class="form-control" placeholder="Street">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="md-form">
                                        <input type="number" class="form-control" placeholder="Min Price">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="md-form">
                                        <input type="number" class="form-control" placeholder="Max Price">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="md-form">
                                        <a class="btn btn-sends">Send</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flat-link-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <ul>
                        <li><a href="#">Find Rooms and Flats</a></li>
                        <li><a href="#">Auctioned Properties</a></li>
                        <li><a href="#">List Properties</a></li>
                        <li><a href="#">Find Home Loans</a></li>
                        <li><a href="#">Unit Converter</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>



    <div class="key-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-2  col-lg-2 megamenus">
                    <ul class="menu">
                        <h5><i class="fas fa-list"></i> Categories</h5>

                        @foreach ($categories as $main)
                            <li><a href="#"><img src="./images/offer.png" alt=""> {{ $main->title }} <i
                                        class="fa fa-angle-right"></i></a>

                                <div class="row megadrop">

                                    <div class="col-md-3 mega-links">
                                        @foreach ($main->subcategory as $sub)
                                            <h6>{{ $sub->title }}</h6>
                                            <ul>
                                                @foreach ($sub->subcategory as $child)
                                                    <li><a href="#"><i class="fa fa-angle-right"></i>
                                                            {{ $child->title }}</a></li>
                                                @endforeach


                                            </ul>
                                        @endforeach

                                    </div>

                                </div>

                            </li>
                        @endforeach

                        <li> <a href="#">See All Categories <i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </div>
                <div class="col-12 col-sm-12 col-md-10 col-lg-10 effect-lily-right">
                    <div class="row">
                        <div class="col-12 col-sm-12 category-item owl-carousel">
                            <div class="category-box">
                                <div class="row">
                                    @foreach ($main_categories as $value)
                                        <div class="col-12 col-sm-12 col-md-3 col-lg-3">


                                            <a href="#">
                                                <div class="grid">
                                                    <figure class="effect-lily">
                                                        <img src="{{ asset('category/'.$value->photo) }}" alt="">
                                                        <figcaption>
                                                            <div>
                                                                <h3>{{ $value->title }}</h3>
                                                            </div>
                                                        </figcaption>
                                                    </figure>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach



                                </div>
                            </div>
                            {{-- <div class="category-box">
                                <a href="#">
                                    <img class="cato-image" src="./images/house3.jpg" alt="">
                                </a>
                            </div>
                            <div class="category-box">
                                <a href="#">
                                    <img class="cato-image" src="./images/house1.jpg" alt="">
                                </a>
                            </div>
                            <div class="category-box">
                                <a href="#">
                                    <img class="cato-image" src="./images/house2.jpg" alt="">
                                </a>
                            </div>
                            <div class="category-box">
                                <a href="#">
                                    <img class="cato-image" src="./images/house4.jpg" alt="">
                                </a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="property-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <h4>Announcement <a href="{{ route('front.featured') }}">View All</a></h4>
                </div>
                <div class="col-12 col-sm-12 property-item owl-carousel">

                    @foreach ($featured_properties as $value)
                        <x-property-grid :information="$value->property" />
                    @endforeach


                </div>
                <!-- <div class="col-12 col-sm-12 product-item owl-carousel">
              <div class="prod-box">
                <a href="#">
                  <img src="./images/house1.jpg" alt="">
                </a>
                <h5><a href="#">Product Title</a></h5>
              </div>
              <div class="prod-box">
                <a href="#">
                  <img src="./images/house2.jpg" alt="">
                </a>
                <h5><a href="#">Product Title</a></h5>
              </div>
              <div class="prod-box">
                <a href="#">
                  <img src="./images/house3.jpg" alt="">
                </a>
                <h5><a href="#">Product Title</a></h5>
              </div>
              <div class="prod-box">
                <a href="#">
                  <img src="./images/house4.jpg" alt="">
                </a>
                <h5><a href="#">Product Title</a></h5>
              </div>
              <div class="prod-box">
                <a href="#">
                  <img src="./images/house5.jpg" alt="">
                </a>
                <h5><a href="#">Product Title</a></h5>
              </div>
              <div class="prod-box">
                <a href="#">
                  <img src="./images/house6.jpg" alt="">
                </a>
                <h5><a href="#">Product Title</a></h5>
              </div>
              <div class="prod-box">
                <a href="#">
                  <img src="./images/house7.jpg" alt="">
                </a>
                <h5><a href="#">Product Title</a></h5>
              </div>
              <div class="prod-box">
                <a href="#">
                  <img src="./images/house8.jpg" alt="">
                </a>
                <h5><a href="#">Product Title</a></h5>
              </div>
            </div> -->
            </div>
        </div>
    </div>

    <div class="sell-rent">
        <div class="container">
            <div class="row">

                <div class="col-12 col-sm-12">
                    <ul class="tabs">
                        @php
                            $count = 0;
                        @endphp
                        @foreach ($purposes as $value)
                            <li @if ($count == 0) class="active" @endif rel="tab{{ $count++ }}">
                                {{ $value->title }}</li>
                        @endforeach

                    </ul>
                    <div class="tab_container">
                        @php
                            $count = 0;
                        @endphp
                        @foreach ($purposes as $value)
                            <h3 class="d_active tab_drawer_heading" rel="tab{{ $count }}">{{ $value->title }}</h3>
                            <div id="tab{{ $count }}" class="tab_content">
                                <div class="col-12 col-sm-12 property-item owl-carousel">

                                    @foreach ($value->property as $item)
                                        <x-property-grid :information="$item" />
                                    @endforeach


                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="property-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <h4>New Property <a href="{{ route('front.newdeals') }}">View All</a></h4>
                </div>
                <div class="col-12 col-sm-12 property-item owl-carousel">

                    @foreach ($recent_properties as $value)
                        <x-property-grid :information="$value" />
                    @endforeach

                </div>
            </div>
        </div>
    </div>

    <div class="property-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <h4>Top Property Listing<a href="{{ route('front.recommended') }}">View All</a></h4>
                </div>


                <div class="col-12 col-sm-12 property-item owl-carousel">

                    @foreach ($recommended_properties as $value)
                        <x-property-grid :information="$value->property" />
                    @endforeach


                </div>
            </div>
        </div>
    </div>

    @foreach ($main_categories as $value)
        <div class="property-section">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <h4>{{ $value->title }}<a href="#">View All</a></h4>
                    </div>
                    <div class="col-12 col-sm-12 property-item owl-carousel">

                        @php
                            $properties = propertyByMainCategory($value->id, 8, 'limit');
                        @endphp

                        @foreach ($properties as $value)
                            <x-property-grid :information="$value" />
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
