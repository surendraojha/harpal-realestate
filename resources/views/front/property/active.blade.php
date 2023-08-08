    <div class="row">

        @php
            $count = 0;
        @endphp
        @foreach ($active_properties as $value)
            <div class="col-md-6 mb-4">
                <div class="singleenterBox border">
                    <div class="row  mb-2">
                        <div class="col-3">
                            <a href="{{ route('property.detail', $value->slug) }}" title="{{$value->title}}">
                                <img src="{{ asset('uploads/' . $value->featured_photo) }}" alt="{{$value->title}}">
                            </a>
                        </div>
                        <div class="col-8">
                            <div class="singleenterContent">
                                <div class="singleTitleBox">
                                    <a href="{{ route('property.detail', $value->slug) }}">
                                        <h4>
                                            {{ $value->title }}
                                        </h4>
                                        <span>
                                            #{{ $value->ad_id }}
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-1">
                            <form action="{{ route('my-property.destroy', $value->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="trashBtn" type="submit"
                                    onclick="return confirm('Are You Sure You Want To Delete This Property?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                            <a class="trashBtn mt-3" href="{{ route('my-property.edit', $value->slug) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                        </div>
                    </div>
                    <div class="location">
                        {{ $value->location->location }}
                    </div>
                    <div class="pricong">
                        @php
                            $formatted_price = \App\Helpers\NumberHelper::formatnumber($value->price);
                        @endphp
                        Rs. {{ $formatted_price }}
                    </div>
                    <div class="removeBox mt-2">
                        <div class="row align-items-center">
                            <div class="col-md-6 mb-3">
                                Ad Listed on : {{ date('d M, Y', strtotime($value->created_at)) }}

                            </div>
                            <div class="col-md-6 mb-3">
                                Ad Expires on : {{ date('d M, Y', strtotime($value->expiration_date)) }}
                            </div>
                            <div class="col-md-6 border-top pt-3">



                                @if (!@$value->boostPost)
                                <div class="promoteWrap" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Promote your rental property to reach more people across additional placements">
                                    <a class="colorBtn d-inline-block py-2"
                                        href="#"   data-bs-toggle="modal"        data-bs-target="#boostrModal{{ $count }}">
                                        Promote Your Property
                                    </a>
                                </div>
                                @else
                                    @if ($value->boostPost->status == 0)
                                        <button class="colorBtn d-inline-block py-2 disabled" disabled>
                                            Promotion Request Sent To Admin
                                        </button>
                                    @else
                                        <button class="colorBtn d-inline-block py-2 disabled" disabled>
                                            Promotion Running
                                        </button>
                                    @endif
                                @endif


                                <form action="{{ route('front.boost.post') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <!-- Boost Modal -->
                                    <div class="modal fade" id="boostrModal{{ $count }}" tabindex="-1"
                                        aria-labelledby="boostrModal{{ $count }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-xl">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="boostrModal1Label">Boost Your
                                                        Property</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">

                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="labelTitle border-end mb-1 pt-3">
                                                                    <h6 class="mx-3">
                                                                        Please Select a Package
                                                                    </h6>
                                                                    <div class="packageList">
                                                                        <div class="row">

                                                                            @foreach ($subscriptions as $index=>$v)
                                                                                <div class="col-md-4">
                                                                                    <div class="singlePackage mx-3">
                                                                                        <input type="radio"
                                                                                            value="{{ $v->id }}"
                                                                                            id="basicPackage{{ $value->ad_id . '-' . $v->id }}"
                                                                                            name="subscription_id" @if($index==1) checked @endif>
                                                                                        <label
                                                                                            for="basicPackage{{ $value->ad_id . '-' . $v->id }}">
                                                                                            <div class="packageTitle"data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-html="true" data-bs-original-title='                                                                                            <x-boost-feature-list
                                                                                                    :label="$v->feature_label_1"
                                                                                                    :value="$v->feature_value_1" />


                                                                                                <x-boost-feature-list
                                                                                                    :label="$v->feature_label_2"
                                                                                                    :value="$v->feature_value_2" />

                                                                                                <x-boost-feature-list
                                                                                                    :label="$v->feature_label_3"
                                                                                                    :value="$v->feature_value_3" />

                                                                                                <x-boost-feature-list
                                                                                                    :label="$v->feature_label_4"
                                                                                                    :value="$v->feature_value_4" />


                                                                                                <x-boost-feature-list
                                                                                                :label="$v->feature_label_5"
                                                                                                :value="$v->feature_value_5" />

                                                                                                <x-boost-feature-list
                                                                                                :label="$v->feature_label_6"
                                                                                                :value="$v->feature_value_6" />


                                                                                                <x-boost-feature-list
                                                                                                :label="$v->feature_label_7"
                                                                                                :value="$v->feature_value_7" />
                                                                                            '
                                                                                                style="background-color: {{ $v->color }};">
                                                                                                {{ $v->title }}
                                                                                            </div>
                                                                                            <div class="singleFeature">

                                                                                                <div class="Selected">
                                                                                                    Selected
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="colorBtn d-inline-block py-2 mb-2">
                                                                                                NPR {{ $v->price }}
                                                                                            </div>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach


                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12 mt-4 text-center">
                                                                                <img src="{{ asset('uploads/'.$setting->qr_code) }}" alt="QR Code" style="width:320px; height:auto;object-fit:contain;">
                                                                                <br>
                                                                                <Span>Scan QR Code For Suscription Payment</Span>

                                                                                </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="row mx-3">
                                                                    <div class="col-12 mt-4">
                                                                        <h6>
                                                                            Now fill all the necessary fields and
                                                                            submit.
                                                                        </h6>
                                                                    </div>
                                                                    <div class="col-md-6 mt-4">
                                                                        <div class="customForm">
                                                                            <label for="">
                                                                                Your Full Name
                                                                            </label>
                                                                            <input type="text" name="name"
                                                                                value="{{ old('name', $user->name) }}"
                                                                                placeholder="eg. Ram Adhikari">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6  mt-4">
                                                                        <div class="customForm">
                                                                            <label for="">
                                                                                Email
                                                                            </label>
                                                                            <input type="text" name="email"
                                                                                value="{{ old('email', $user->email) }}"
                                                                                placeholder="yourname@mail.com">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 mt-4">
                                                                        <div class="customForm">
                                                                            <label for="">
                                                                                Your Phone Number
                                                                            </label>
                                                                            <input type="text" name="phone"
                                                                                value="{{ old('phone', $user->phone) }}"
                                                                                placeholder="98XXXXXXXX">
                                                                        </div>
                                                                    </div>




                                                                    <div class="col-md-12  mt-4">
                                                                        <div class="customForm">
                                                                            <div class="d-flex justify-content-between">
                                                                                <label for="">
                                                                                    Deposit Slip Or Screenshot Of Online
                                                                                    Payment (optional)
                                                                                </label>

                                                                            </div>
                                                                            <input type="file" name="deposit_slip">
                                                                        </div>
                                                                    </div>



                                                                    <div class="col-md-12 mt-4">
                                                                        <div class="customForm">
                                                                            <label for="">
                                                                                If any
                                                                            </label>
                                                                            <textarea name="message" id="" cols="30" rows="10" placeholder="Write a Message"
                                                                                class="mb-0">{{ old('message') }}</textarea>
                                                                        </div>
                                                                    </div>

                                                                    <input type="hidden" name="property_id"
                                                                        value="{{ @$value->id }}" id="">
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
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="customForm text-end m-0">
                                                        <button class="colorBtn px-3 m-0" type="submit">
                                                            Send <i class="flaticon-right-arrow ps-2"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-end border-top pt-3">
                    <a class="" href="{{ route('my-property.fulfilled', $value->id) }}">
                        Marked as filled
                    </a>
                </div>
            </div>


    </div>


    </div>
    </div>
    @php
        $count++;
    @endphp
    @endforeach
    <x-pagination :informations="$active_properties" />

    </div>
