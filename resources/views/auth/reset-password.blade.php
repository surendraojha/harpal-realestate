@extends('front.layouts.main')
@section('title', 'Reset Password')

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

                    @php
                            $advertisement = \App\Models\AdvertisementPosition::where('position','login-page')->get();

                    @endphp
                    @foreach ($advertisement as $value)
                        <a href="{{ $value->advertisement->link }}" target="_blank">
                            <img src="{{ asset('uploads/' . $value->advertisement->photo) }}" alt="">
                        </a>
                    @endforeach
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
                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <div class="">

                                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                {{-- <div class="block">
                                <x-jet-label for="email" value="{{ __('Email') }}" />
                                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
                            </div> --}}

                                <input type="hidden" name="email" value="{{ old('email', $request->email) }}">

                                <div class="mt-4">
                                    <x-jet-label for="password" value="{{ __('Password') }}" />
                                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password"
                                        required autocomplete="new-password" />
                                </div>

                                <div class="mt-4">
                                    <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                                    <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                        name="password_confirmation" required autocomplete="new-password" />
                                </div>

                                <div class="flex items-center justify-end mt-4">

                                    <button class="colorBtn p-2" type="submit">
                                        Change Password <i class="flaticon-right-arrow ps-2"></i>
                                    </button>
                                </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Reset Password') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}
