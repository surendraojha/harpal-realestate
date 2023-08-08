@extends('front.layouts.main')

@if (@$meta)
    @section('title', $meta->meta_title)

    @section('meta')
        <x-meta-head :meta="$meta" />
    @endsection

@else

@section('title','Login')

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
                        <a href="{{route('front.page','terms-and-conditions')}}">
                            Terms and condition
                        </a>
                    </li>
                    <li>
                        <a href="{{route('front.page','privacy-policy')}}">
                            Privacy Policy
                        </a>
                    </li>
                    <li>
                        <a href="{{route('front.faq')}}">
                            FAQ'S
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-6 signupRight">
                <div class="ContactForm">
                    <form action="{{route('front.login')}}" method="post">
                        @csrf
                        <div class="">
                            <h5 class="mb-2 text-center">
                                Login
                            </h5>
                            <span class="d-block mb-4 text-center">
                               New to the site <a href="{{route('front.register')}}">
                                    Register Now
                                </a>
                            </span>
                            <div class="form-floating customForm">
                                <input type="email" class="form-control" id="email"
                                name="email" value="{{old('email')}}"
                                placeholder="yourname@email.com">
                                <label for="email">
                                    Email Address Or Username
                                </label>
                            </div>
                            <a href="{{route('password.request')}}" class="d-block text-end">
                                Forgot Password
                            </a>
                            <div class="customForm form-floating">
                                <input type="password"  class="form-control" id="password"
                                name="password"
                                placeholder="*****">
                                <label for="password">
                                    Password
                                </label>
                            </div>
                            <div class="customForm">
                                <span class="termsandConditionText">
                                    We’ll text you to confirm your email. Standard message and data rates apply.
                                    <a href="{{route('front.page','privacy-policy')}}">Privacy Policy</a>
                                </span>
                            </div>
                            <div class="customForm text-end">
                                <button class="colorBtn" type="submit">
                                   Continue <i class="flaticon-right-arrow ps-2"></i>
                                </button>
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
                                <a href="{{route('login.facebook')}}" class="fbLogin">
                                   <x-facebook-login-icon/>
                                    Facebook
                                </a>
                            </li>
                            <li>
                                <a href="{{route('login.google')}}" class="googleLogin">
                                    <x-google-login-icon/>
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
