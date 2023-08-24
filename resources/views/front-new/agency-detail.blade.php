@extends('front-new.layouts.main')

@section('content')
    <div class="agency-detail-page">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <h1>Agency Details</h1>
                </div>
                <div class="col-12 col-sm-12 col-d-8 col-lg-9 agency-detail-left">
                    @if ($information->profile->photo)
                    @php
                        $photo_path = asset('uploads/' . $information->profile->photo);
                    @endphp
                @else
                    @php
                        $photo_path = asset('front/assets/imgs/user.webp');
                    @endphp
                @endif

                    <img src="{{ $photo_path }}" alt="">
                    <h2>{{ $information->name }}</h2>
                    {{-- <h6>Kathmandu Nepal</h6> --}}
                    <p><a href="#"><i class="fa fa-envelope"></i> {{ $information->email }}</a></p>
                    <p><a href="#"><i class="fa fa-phone-volume"></i> {{ $information->phone }}</a></p>
                    {{-- <p><a href="#"><i class="fa fa-phone-volume"></i> 1234567890</a></p> --}}

                    @if ($information->profile->website)
                        <p><a href="{{ $information->profile->website }}"><i class="fa fa-globe"></i>
                                {{ $information->profile->website }}</a></p>
                    @endif
                    <ul>
                        @if ($information->profile->facebook)
                            <li><a target="_blank" href="{{ $information->profile->facebook }}"><i
                                        class="fab fa-facebook-f"></i></a></li>
                        @endif
                        @if ($information->profile->twitter)
                            <li><a target="_blank" href="{{ $information->profile->twitter }}"><i
                                        class="fab fa-twitter"></i></a></li>
                        @endif

                        @if ($information->profile->linkedin)
                            <li><a target="_blank" href="{{ $information->profile->linkedin }}"><i
                                        class="fab fa-linkedin-in"></i></a></li>
                        @endif

                        @if ($information->profile->instagram)
                            <li><a target="_blank" href="{{ $information->profile->instagram }}"><i
                                        class="fab fa-instagram"></i></a></li>
                        @endif

                    </ul>
                    <h3>Description</h3>
                    {!! $information->profile->about_me !!}
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-3 agency-detail-right">
                    <h4>Contact Us</h4>
                    <form action="{{route('front.contact-us')}}" method="post">
                        @csrf
                        {{-- contact for --}}

                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form">
                                    <input type="text" id="contact_for" name="contact_for"
                                    value="{{ old('contact_for') }}"
                                    class="form-control"
                                        placeholder="Contact For" required>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="user_id" value="{{ $information->id }}">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form">
                                    <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control"
                                        placeholder="Your Name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form">
                                    <input type="text" id="email" name="email" value="{{ old('email') }}" class="form-control"
                                        placeholder="Email Address">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form">
                                    <input type="number" name="phone" value="{{ old('phone') }}" id="number" class="form-control"

                                    placeholder="Mobile Number">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form">
                                    <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"
                                        placeholder="Description">{{ old('message') }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-send" type="submit">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
