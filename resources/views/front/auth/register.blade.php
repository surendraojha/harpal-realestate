@extends('front.layouts.main')
@if (@$meta)
    @section('title', $meta->meta_title)

    @section('meta')
        <x-meta-head :meta="$meta" />
    @endsection

@else

@section('title','Register')

@endif
@section('css')
    <style>
        @media(min-width:767.9px) {
            .mobileNavi {
                display: none;
            }

            .desktop-visible {
                display: block;
            }

            .mobile-visible {
                display: none;
            }
        }

        @media(max-width:991.9px) {

            .desktopNav,
            .bannerImg::after {
                display: none;
            }

            .mobileNavi {
                display: flex;
            }

            .desktop-visible {
                display: none;
            }

            .mobile-visible {
                display: block;
            }
        }

    </style>
@endsection



@section('content')
    <section class="siteSec">
        <div class="container">
            <div class="row">
                <div class="col-md-6 signupleft">
                    <div class="siteTitle mb-4">
                        <h3>
                            Welcome to Kotha Bhada
                        </h3>
                        <p>
                            Your Ultimate renting partner
                        </p>
                    </div>
                <x-sidebar-ad :advertisement="$side_bar_ad" />

                    <ul class="signupMenu">
                        <li>
                            <a href="{{ route('front.page', 'terms-and-conditions') }}">
                                Terms and condition
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('front.page', 'privacy-policy') }}">
                                Privacy Policy
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('front.faq') }}">
                                FAQ'S
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 signupRight">
                    <div class="ContactForm">
                        <form action="{{ route('front.register') }}" method="post">

                            @csrf
                            <div class="">
                                <h5 class="mb-2 text-center">
                                    Signup
                                </h5>
                                <span class="d-block mb-4 text-center">
                                    Already a member <a href="{{ route('front.login') }}">
                                        Login
                                    </a>
                                </span>
                                <div class="row">

                                    {{-- Your FUll name --}}
                                    <div class="col-md-6">
                                        <div class="form-floating customForm">
                                            <input type="text" class="form-control" id="fname" name="name"
                                                value="{{ old('name') }}" placeholder="eg.deo">
                                            <label for="fname">
                                                Your Full Name
                                            </label>
                                        </div>
                                    </div>

                                    {{-- email --}}
                                    <div class="col-md-6">
                                        <div class="form-floating customForm">
                                            <input name="email" type="email" class="form-control" id="email"
                                                placeholder="admin@admin.com" value="{{ old('email') }}">
                                            <label for="email">
                                                Your Email Address
                                            </label>
                                        </div>
                                    </div>



                                    {{-- phone number --}}
                                    <div class="col-md-6">
                                        <div class="form-floating customForm">
                                            <input type="tel" class="form-control" id="tel" name="phone"
                                                value="{{ old('phone') }}" placeholder="+9779860560446">
                                            <label for="tel">
                                                Your Phone Number
                                            </label>
                                        </div>
                                    </div>

                                    {{-- gender --}}
                                    {{-- <div class="col-md-6">
                                        <div class="customForm">
                                            <span class="radioTitle">
                                                Gender
                                            </span>
                                            <div class="d-flex">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="gender" type="radio" value="male"
                                                        id="male">
                                                    <label class="form-check-label" for="male">
                                                        Male
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" name="gender" type="radio"
                                                        value="female" id="female">
                                                    <label class="form-check-label" for="female">
                                                        Female
                                                    </label>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" name="gender" type="radio"
                                                        value="others" id="others">
                                                    <label class="form-check-label" for="others">
                                                        Others
                                                    </label>
                                                </div>


                                            </div>
                                        </div>
                                    </div> --}}

                                    {{-- password --}}
                                    <div class="col-md-6">
                                        <div class="customForm form-floating">
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="*****">
                                            <label for="password">
                                                Password
                                            </label>
                                        </div>
                                    </div>

                                    {{-- confirm password --}}
                                    <div class="col-md-6">
                                        <div class="customForm form-floating">
                                            <input type="password" class="form-control" name="password_confirmation"
                                                id="confirmpassword" placeholder="*****">
                                            <label for="confirmpassword">
                                                Confirm Password
                                            </label>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="customForm">
                                            <span class="termsandConditionText">
                                                We’ll text you to confirm your email. Standard message and data rates apply.
                                                <a href="{{route('front.page','privacy-policy')}}">Privacy Policy</a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="customForm text-end">
                                            <button class="colorBtn" type="submit">
                                                Continue <i class="flaticon-right-arrow ps-2"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="OrText">
                            <span>
                                OR
                            </span>
                        </div>
                        <div class="elseContinue">
                            <h6 class="">
                                Continue With
                            </h6>
                            <ul>
                                <li>
                                    <a href="{{ route('login.facebook') }}" class="fbLogin">
                                        <x-facebook-login-icon />
                                        Facebook
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('login.google') }}" class="googleLogin">
                                        <x-google-login-icon />
                                        Google
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
