@extends('front.layouts.main')

@if (@$meta)
    @section('title', $meta->meta_title)

    @section('meta')
        <x-meta-head :meta="$meta" />
    @endsection

@else

@section('title','Forget Password')

@endif
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
                @foreach ($advertisement as $value)
                <a href="{{ $value->advertisement->link }}" target="_blank">
                    <img src="{{ asset('uploads/' . $value->advertisement->photo) }}" alt="">
                </a>
            @endforeach


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
                    {{-- @if (\Session::has('status'))
<div class="mb-4 font-medium text-sm text-green-600">
    {{ session('status') }}


</div>


@endif --}}

                    <form action="{{route('password.email')}}" method="post">
                        @csrf
                        <div class="">
                            <h5 class="mb-2 text-center">
                                Forget Password
                            </h5>
                            <span class="d-block mb-4 text-center">
                               New to the site <a href="{{route('front.register')}}">
                                    Register Now
                                </a>
                            </span>
                            <div class="form-floating customForm">
                                <input type="email" class="form-control" id="email"
                                name="email"
                                placeholder="admin@admin.com">
                                <label for="email">
                                    Email Address Or Username
                                </label>
                            </div>

                            <div class="customForm text-end">
   <button class="colorBtn" type="submit">
                                    Email Password Reset Link <i class="flaticon-right-arrow ps-2"></i>
                                </button>
                            </div>

                            {{-- <x-jet-button>
                                {{ __('Email Password Reset Link') }}
                            </x-jet-button> --}}
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>


@endsection

