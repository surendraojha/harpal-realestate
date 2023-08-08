@extends('front.layouts.main')



@if (@$meta)
    @section('title', $meta->meta_title)

    @section('meta')
        <x-meta-head :meta="$meta" />
    @endsection

@else

@section('title','Contact Us')

@endif
@section('css')
    <style>
        @media(min-width:767.9px){
            .mobileNavi{
                display: none;
            }
            .desktop-visible{
                display: block;
            }
            .mobile-visible{
                display: none;
            }
        }
        @media(max-width:991.9px){
            .desktopNav,.bannerImg::after{
                display: none;
            }
            .mobileNavi{
                display: flex;
            }
            .desktop-visible{
                display: none;
            }
            .mobile-visible{
                display: block;
            }
        }
    </style>
@endsection

@section('content')
    <!-- Site Footer start -->
    <!-- Contact Us Page -->
        <!-- Section post your thoughts section start -->
    <section class="siteSec">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-5 text-center">
                    <h4 class="mb-2">
                        Contact Us
                    </h4>
                    <p>
                        We offer our clients a wealth of knowledge regarding all aspects of purchasing or selling a home. Whether it is helping you search for your dream home, discussing new Nepal real estate developments, or assisting with the sale of your property, we would love the opportunity to talk to you. Please feel free to contact us with any questions!
                    </p>
                </div>


                <x-wide-ad :ads="$top_wide_advertisements"/>

                <div class="col-md-6">
                    <div class="contactforming">
                        <h5 class="mb-3">
                            Drop Us A Line
                        </h5>
                        <form action="{{route('front.contact-us')}}" method="post">
                            @csrf

                            <div class="customForm">
                                <label for="">
                                    I am interested in solutions for:
                                </label>
                                <select name="contact_for" id="">
                                    <option value="My Self"
                                    {{old('contact_for')=='My Self'?'selected':''}}
                                    >
                                        My Self
                                    </option>
                                    <option value="My Team"
                                    {{old('contact_for')=='My Team'?'selected':''}}

                                    >
                                        My Team
                                    </option>
                                    <option value="My Office"
                                    {{old('contact_for')=='My Office'?'selected':''}}

                                    >
                                        My Office
                                    </option>
                                </select>
                            </div>
                            <div class="customForm">
                                <label for="">
                                    Full Name
                                </label>
                                <input name="name" value="{{old('name')}}" type="text" placeholder="eg. deo">
                            </div>
                            <div class="customForm">
                                <label for="">
                                    Email
                                </label>
                                <input name="email" value="{{old('email')}}"  type="email" placeholder="eg. deo@gmail.com">
                            </div>
                            <div class="customForm">
                                <label for="">
                                    Your Phone Number
                                </label>
                                <input name="phone" value="{{old('phone')}}" type="tel" placeholder="98*******">
                            </div>
                            <div class="customForm">
                                <label for="">
                                    Message
                                </label>
                                <textarea name="message" id="" cols="30" rows="10" placeholder="Write your message here...">{{old('message')}}</textarea>
                            </div>
                            <div class="customForm text-end">
                                <button class="colorBtn" type="submit">
                                  Send <i class="flaticon-right-arrow ps-2"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="singleContactBox">
                        <div>
                            <i class="fas fa-phone"></i>
                        </div>
                        <div>
                            <h5>
                                Phone
                            </h5>
                            <a href="tel:{{$setting->phone}}">
                                {{$setting->phone}}
                            </a>
                            {{-- <a href="#">
                                +977-0152512
                            </a> --}}
                        </div>
                    </div>
                    <div class="singleContactBox">
                        <div>
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <h5>
                                Mail Us
                            </h5>
                            <a href="mailto:{{$setting->email}}">
                                {{$setting->email}}
                            </a>
                            {{-- <a href="#">
                               kothabhadanep@gmail.com
                            </a> --}}
                        </div>
                    </div>
                    <div class="singleContactBox">
                        <div>
                            <i class="fas fa-map-marked"></i>
                        </div>
                        <div>
                            <h5>
                                Locate Us
                            </h5>
                            <a href="#">
                                {{$setting->address}}
                            </a>
                        </div>
                    </div>
                    <div class="singleContactBox">
                        <div>
                            <h5>
                                Follow Us
                            </h5>
                            <ul class="top-header-social-icons">
                                <li><a href="{{$setting->facebook}}" target="_blank" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="{{$setting->twitter}}" target="_blank" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="{{$setting->youtube}}" target="_blank" data-toggle="tooltip" data-placement="top" title="" data-original-title="Youtube"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="singleContactBox">
                        {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3531.711743693931!2d85.3210300147178!3d27.72618503127153!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1920c1804bab%3A0x50d50983f71412e9!2sIvazz%20Technology!5e0!3m2!1sen!2snp!4v1647326353052!5m2!1sen!2snp" ></iframe> --}}


                        <iframe width="100%" height="240" style="border:0;" allowfullscreen="" loading="lazy"
                        src="https://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=
                           {{ str_replace(',', '', str_replace(' ', '+', @$setting->address)) }}&z=14&output=embed">
                    </iframe>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

