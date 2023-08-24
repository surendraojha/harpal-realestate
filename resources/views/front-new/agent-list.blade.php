@extends('front-new.layouts.main')

@section('content')
    <div class="agent-section">
        <div class="container">

            @foreach ($informations as $value)
                <div class="row agent-rows">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <h1> {{ $value->name }}</h1>
                        <p><strong>{{ $value->profile->experience }} Years Experience</strong></p>
                        <p>{!! $value->profile->about_me !!}</p>
                        <p><i class="fa fa-phone"></i> {{ $value->phone }}</p>
                        <p><i class="fa fa-envelope"></i> {{ $value->email }}</p>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        @if ($value->profile->photo)
                            @php
                                $photo_path = asset('uploads/' . $value->profile->photo);
                            @endphp
                        @else
                            @php
                                $photo_path = asset('front/assets/imgs/user.webp');
                            @endphp
                        @endif
                        <a href="{{ route('front.agent-detail',$value->email) }}">
                        <img src="{{ $photo_path }}" alt="">

                    </a>
                    </div>
                </div>
            @endforeach



            <x-pagination :informations="$informations" />



        </div>
    </div>
@endsection
