@extends('front.layouts.main')

@if(@$meta)

    @section('title',$meta->meta_title)

    @section('meta')


        <x-meta-head :meta="$meta" />
    @endsection

@else

@section('title','Find Me Room')


@endif

@section('content')
<section class="siteSec">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 signupleft">
                <div class="siteTitle mb-4">
                    <h1>
                       Find Your Dream Place
                    </h1>
                    <p>
                        Your Ultimate renting partner
                    </p>
                </div>
                {{-- <img src="{{ asset('uploads/'.$setting->banner) }}" alt=""> --}}

<x-wide-ad :ads="$side_bar_ad"/>

            </div>
            <div class="col-md-7">
                <div class="contactFrom">
                    <form action="{{route('front.contact-us.post')}}" method="post"
                     enctype="multipart/form-data">

                        @csrf
                        <div class="ContactForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="customForm">
                                        <label for="">
                                            Your Full Name
                                        </label>
                                        <input type="text" name="name" required value="{{old('name')}}" placeholder="eg. Ram Adhikari">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="customForm">
                                        <label for="">
                                            Your Phone Number
                                        </label>
                                        <input type="text" required name="phone" value="{{old('phone')}}" placeholder="98XXXXXXX">
                                    </div>
                                </div>

                                {{-- email --}}
                                  <div class="col-md-6">
                                    <div class="customForm">
                                        <label for="">
                                            Email
                                        </label>
                                        <input type="email" required name="email" value="{{old('email')}}"
                                         placeholder="Enter Your Email">
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="customForm">
                                        <label for="locationType">Location</label>
                                        <select id="locationType" required name="location[]" class="formCustom locationSelect select2" multiple>

                                            @foreach ($locations as $value)
                                            <option value="{{$value->location}}">{{$value->location}}</option>

                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="customForm">
                                        <div class="fieldBox">
                                            <label for="rentalType">Property type</label>
                                            <!-- Optgroups -->
                                            <select id="rentalType" required name="rental_type[]" class="formCustom rentalSelect select2" multiple>

                                                @foreach ($categories as $value)

                                                <optgroup label="{{$value->title}}">
                                                    @foreach ($value->subcategory->sortBy('order') as $v)
                                                        <option value="{{$v->title}}">{{$v->title}}</option>
                                                    @endforeach
                                                </optgroup>


                                                @endforeach


                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="customForm">
                                        <label for="">Tole/Area</label>
                                        <input type="text" name="total_area" required
                                        value="{{old('total_area')}}"
                                        placeholder="eg. Samakhushi">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="customForm">
                                        <label for="">
                                            If any
                                        </label>
                                        <textarea name="message"

                                        id="" cols="30" rows="10" placeholder="Write a Message">{{old('message')}}</textarea>
                                    </div>
                                </div>



                                <x-deposit-slip />

                                <div class="col-12 mt-3">
                                    <div class="alert alert-primary mb-0" role="alert">
                                        <div class="d-flex">
                                            <i class="fas fa-info pe-2"></i>
                                            <div class="waringBox">
                                                यदि तपाइँ कुनै एजेन्ट (dalay dai) सँग व्यवहार गर्नुहुन्छ र यस प्लेटफर्म बाहिर पैसा पठाउने  गर्नुहुन्छ भने kothabhada.com जिम्मेवार हुनेछैन।
                                                <br />
                                                Kothabhada.com will not be responsible if you deal with an agent  and transfer money outside of this platform.
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <div class="customForm text-end">
                                        <button class="colorBtn" type="submit">
                                           Send <i class="flaticon-right-arrow ps-2"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

