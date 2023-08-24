@extends('front-new.layouts.main')

@section('content')
<div class="agency-section">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12">
          <h1>Agencies</h1>
        </div>
        <div class="col-12 col-sm-12 agency-search">
          <form action="{{ Request::url() }}">
            <div class="row">
              {{-- <div class="col-md-4">
                <div class="md-form">
                  <label>Country</label>
                  <select name="country">
                    <option> -- Choose Country -- </option>
                    <option>Nepal</option>
                    <option>Nepal</option>
                    <option>Nepal</option>
                    <option>Nepal</option>
                  </select>
                </div>
              </div> --}}
              <div class="col-md-6">
                <div class="md-form">
                  <label>Agency</label>
                  <input type="text" name="keyword" value="{{ request()->keyword }}" class="form-control" placeholder="Enter Agency Name">
                </div>
              </div>
              <div class="col-md-2">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
              </div>
            </div>
          </form>
        </div>

        @foreach ($informations as $value)

        <div class="col-12 col-sm-12 col-md-6 col-lg-4">
          <a href="{{ route('front.agency-detail',$value->email) }}">
            @if ($value->profile->photo)
                            @php
                                $photo_path = asset('uploads/' . $value->profile->photo);
                            @endphp
                        @else
                            @php
                                $photo_path = asset('front/assets/imgs/user.webp');
                            @endphp
                        @endif
            <img class="agency-img" src="{{ $photo_path }}" alt="">
          </a>
          <div class="agency-box">
            {{-- <img src="./images/haus-estate.jpg" alt=""> --}}
            <h2><a href="{{ route('front.agency-detail',$value->email) }}">{{ $value->name }}</a></h2>
            {{-- <h6>Kathmandu, Nepal</h6> --}}
            <hr>
            <p><a href="#"><i class="fa fa-phone-volume"></i> {{ $value->phone }}</a></p>
            <p><a href="#"><i class="fa fa-envelope"></i> {{ $value->email }}</a></p>
          </div>
        </div>

        @endforeach


        <x-pagination :informations="$informations" />

      </div>
    </div>
  </div>
@endsection
