@extends('front.layouts.main')

@if (@$meta)
    @section('title', $meta->meta_title)

    @section('meta')
        <x-meta-head :meta="$meta" />
    @endsection

@else

@section('title','Shift Home')

@endif

@section('content')
    <!-- Singhle page banner start -->
    <section class="bannerSec">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bannerImg">
                        <img src="{{ asset('uploads/'.$setting->banner) }}" alt="Banner">
                        <div class="bannerCaption">
                            <div class="siteTitle mt-4">
                                <h1 class="bannerTitle">
                                    Shift home
                                </h1>
                                <i class="bannersubTitle">
                                    Ask For Quote
                                </i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-wide-ad :ads="$top_wide_advertisements"/>

    <!-- Single page banner ends -->
    <!-- Lopgin signup Box -->
    <section class="dashboardSec shiftHomeSec">
        <div class="container">
            <div class="row">
                <div class="col-md-12 signupRight">
                    <div class="ContactForm moreDetailSignup">
                        <form action="{{ route('front.shifthome') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row">

                                <div class="col-md-4">

                                    {!!$setting->shift_home_content!!}

                                    <x-wide-ad :ads="$side_bar_ad"/>

                                </div>

                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-12">
                                            <h6 class="text-center mb-3">
                                                Please fill all the details
                                            </h6>
                                        </div>




                                        <div class="col-md-12">
                                            <div class="form-floating customForm">
                                                <select class="form-select form-control" id="title" name="type"
                                                    aria-label="Floating label select example" required>
                                                    <option value="">Please select</option>
                                                    <option value="office" {{ old('type') == 'office' ? 'selected' : '' }}>Office</option>
                                                    <option value="house" {{ old('type') == 'house' ? 'selected' : '' }}>House</option>
                                                    <option value="studio" {{ old('type') == 'studio' ? 'selected' : '' }}>Studio</option>

                                                    <option value="apartment" {{ old('type') == 'apartment' ? 'selected' : '' }}>Apartment
                                                    </option>
                                                    <option value="flat" {{ old('type') == 'flat' ? 'selected' : '' }}>Flat</option>
                                                    <option value="other" {{ old('type') == 'other' ? 'selected' : '' }}>Other</option>
                                                </select>
                                                <label for="title">Type/Size</label>
                                            </div>
                                        </div>

                                        {{-- Pick up location --}}
                                        <div class="col-md-6">
                                            <div class="form-floating customForm">
                                                <input type="text" class="form-control" id="pickup_address" placeholder="eg.John"
                                                    name="pick_up_location" value="{{ old('pick_up_location') }}" required>
                                                <label for="fName">
                                                    Pick Up Location
                                                </label>
                                            </div>
                                        </div>




                                        {{-- drop off location --}}
                                        <div class="col-md-6">
                                            <div class="form-floating customForm">
                                                <input type="text" class="form-control" id="drop_address" placeholder="eg.John"
                                                    name="drop_off_location" value="{{ old('drop_off_location') }}" required>
                                                <label for="drop_address">
                                                    Drop Off Location
                                                </label>
                                            </div>
                                        </div>

                                        {{-- phone --}}
                                        <div class="col-md-6">
                                            <div class="form-floating customForm">
                                                <input type="tel" name="phone" class="form-control" value="{{ old('phone') }}"
                                                    id="pNumber" placeholder="eg. 98XXXXXXXX" required>
                                                <label for="pNumber">
                                                    Phone Number
                                                </label>
                                            </div>
                                        </div>


                                       <div class="col-md-6">
                                            <div class="form-floating customForm">
                                                <input type="email" name="email" class="form-control" value="{{ old('phone') }}"
                                                    id="email" placeholder="Enter Email" required>
                                                <label for="email">
                                                    email
                                                </label>
                                            </div>
                                        </div>

                                        @foreach ($shift_home_items as $value)
                                        <div class="col-md-6">
                                            <div class="form-floating customForm">
                                                    <div class="form-floating customForm sp-quantity">
                                                        <input type="hidden" name="item_id[]" value="{{$value->title}}">
                                                        <div class="sp-minus ddd">-</div>
                                                            <input type="number" class="form-control quntity-input" name="item_quantity[]"  id="pNumber" placeholder="eg.4" step="1" min="0" max="" value="0" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="">
                                                        <div class="sp-plus ddd">+</div>
                                                        <label for="pNumber">
                                                            No Of {{$value->title}}
                                                        </label>
                                                    </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        {{-- when --}}
                                        <div class="col-md-6">
                                            <div class="customForm">
                                                <span class="radioTitle">
                                                    When
                                                </span>
                                                <div class="d-flex">
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="when" type="radio"
                                                            value="Instant Booking" id="House">
                                                        <label class="form-check-label" for="House">
                                                            Instant Booking
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="when" type="radio"
                                                            value="Shedule For Later" id="Apartment" checked>
                                                        <label class="form-check-label" for="Apartment">
                                                            Shedule For Later
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="date-div">
                                            <div class="form-floating customForm">
                                                <input type="date" name="schedule_date" value="{{ old('schedule_date') }}"
                                                    class="form-control" id="sDate">
                                                <label for="sDate">
                                                    Shedule Date
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="time-div">
                                            <div class="form-floating customForm">
                                                <input type="time" name="schedule_time" value="{{ old('schedule_time') }}"
                                                    class="form-control" id="sDate">
                                                <label for="sDate">
                                                    Select Time
                                                </label>
                                            </div>
                                        </div>
                                        <x-deposit-slip />
                                        <div class="col-12 mt-4">
                                            <div class="form-floating">
                                                <textarea class="form-control"
                                                name="message"
                                                 placeholder="Leave a comment here" id="shiftMessage" style="height: 80px"></textarea>
                                                <label for="shiftMessage">Message</label>
                                            </div>
                                        </div>
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
                                        <div class="customForm">
                                            <button class="colorBtn ms-0">
                                                Ask For Quote
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


@section('script')
    <script>
        //script for plus minus


        $('input[type=radio][name=when]').change(function() {
            var checked = $('input[name="when"]:checked').val();


            if(checked=='Instant Booking'){
                $('#date-div').hide();
                $('#time-div').hide();
            }else{
                $('#date-div').show();
                $('#time-div').show();
            }
        });
        $(".ddd").on("click", function () {

        var $button = $(this);
        var oldValue = $button.closest('.sp-quantity').find("input.quntity-input").val();

        if ($button.text() == "+") {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }

        $button.closest('.sp-quantity').find("input.quntity-input").val(newVal);

        });
    </script>
@endsection
