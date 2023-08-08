@extends('front.layouts.main')

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

<section class="siteSec">
    <div class="container">
        <div class="row">
            <div class="col-md-12 signupleft">
                <div class="siteTitle">
                    <img src="{{asset('uploads/'.$setting->company_logo)}}" alt="{{$setting->company_name}}">
                    <h3>
                       Step 2
                    </h3>
                    <p>
                        Your Ultimate renting partner
                    </p>
                </div>
                <h4>
                    We have sent a link in your email for confirmation  please click and verify it's you
                </h4>


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
        </div>
    </div>
</section>
@endsection
