@extends('front-new.layouts.main')

@section('content')

<div class="financial-section">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12">
          <h1>Financial Supports</h1>
          <h2>Contact Nearest Bank</h2>
        </div>

        @foreach ($financial_support as $value)

        <div class="col-12 col-sm-12">
          <div class="nearest-box">
            <img src="{{ asset('financial-support/'.$value->photo) }}" alt="">
            <h3>{{ $value->title }}</h3>
            <hr>
            <h5>{{ $value->subtitle }}</span></h5>
            <ul>
              {{-- <li>Down Payment: <span>100,000.00</span></li> --}}
              <li>Interest Rate: <span>{{ $value->interest_rate }}%</span></li>
              <li>Loan Year: <span>{{ $value->loan_year }} Years</span></li>
              <li>Insurance: <span>{{ $value->insurance?'Yes':'No' }}</span></li>
            </ul>
            <a href="#" class="btn btn-contact">Contact Us</a>
            <a href="#" class="btn btn-apply">Apply Now</a>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </div>


@endsection
