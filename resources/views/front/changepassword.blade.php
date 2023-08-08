@extends('front.layouts.profile')


@section('title','Change Password')

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
<!-- Newly added css -->
<style>
    .registrationFormAlert {
position: absolute;
bottom: 1.625rem;
right: 10px;
}
.registrationFormAlert .fa-check{
color: green;
}
.registrationFormAlert .fa-times{
color: red;
}
</style>
@endsection



@section('content')
<div class="col-10 signupRight">

    <div class="row align-items-center mt-5 justify-content-center">
        <div class="col-md-5 shadow border-radius">
            <div class="ContactForm moreDetailSignup">
                <form action="{{route('front.change')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <h6 class="mt-3 mb-4 text-center">
                                Change Password
                            </h6>
                        </div>
                        <div class="col-md-12 position-relative">
                            <div class="form-floating customForm">
                                <input type="password" class="form-control" id="oldPassword"
                                name="current_password"
                                placeholder="Current Password" >
                                <label for="oldPassword">
                                    Old Password
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12 position-relative">
                            <div class="form-floating customForm">
                                <input type="password" class="form-control" id="NewPassword"
                                 placeholder="New Password" name="password">
                                <label for="NewPassword">
                                    New Password
                                </label>
                            </div>
                            <div class="registrationFormAlert">
                            </div>
                        </div>
                        <div class="col-md-12 position-relative">
                            <div class="form-floating customForm">
                                <input type="password" class="form-control" id="ConfirmPassword"
                                placeholder="eg.John" name="password_confirmation">
                                <label for="ConfirmPassword">
                                    Confirm Password
                                </label>
                            </div>
                            <div class="registrationFormAlert">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="customForm">
                                <button type="submit" class="colorBtn ms-0">
                                    Update <i class="fas fa-arrow-right ps-2"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
