@extends('front-new.layouts.main')

@section('content')
<div class="faqs-section">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-2 col-lg-2">

        </div>
        <div class="col-12 col-sm-12 col-md-8 col-lg-8">
          <h2>Frequently Asked Questions</h2>
          <div class="accordion-container">


            @php
                $count=0;
            @endphp
            @foreach($informations as $key => $value)

            <div class="set">
              <a href="javascript:void(0)" class="active">
                {{ $value->question }}
                <i class="fa fa-minus"></i>
              </a>
              <div class="content" style="@if($count++ == 0) display: block; @else display:none; @endif">
                <p>{{ $value->answer }}</p>
              </div>
            </div>

            @endforeach

          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-2 col-lg-2">

        </div>
      </div>
    </div>
  </div>

@endsection
