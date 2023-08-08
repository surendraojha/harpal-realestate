@extends('front.layouts.main')
@section('title','Find Me Room')
@section('content')
<style>
    button.btn-close {
    color: #fff !important;
    background-color: #fff;
}
</style>
<section class="siteSec">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 signupleft">
                <div class="siteTitle mb-4">
                    <h3>
                       More than 1000 Clients have found buyers
                    </h3>
                    <p>
                        Your Ultimate renting partner
                    </p>
                </div>

                <img src="{{ asset('uploads/'.$setting->banner) }}" alt="Boost">

                <ul class="signupMenu">
                    <li>
                        <a href="{{route('front.page','terms-and-conditions')}}">
                            How Boosting Works
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
            <div class="col-md-7">
                <div class="contactFrom">

                    {{--$information->title--}}
                    <form action="{{route('front.boost.post')}}" method="post" enctype="multipart/form-data">

                        @csrf
                        <div class="ContactForm">
                            <div class="row">

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
