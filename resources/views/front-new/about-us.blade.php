@extends('front-new.layouts.main')

@section('content')

<div class="about-body">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12">
          <h1>{{ $information->title }}</h1>
          <p>{!! $information->description !!}</p>
        </div>
      </div>
    </div>
  </div>

  @if($testimonials->isNotEmpty())
  <section class="testimonial-section2">
   <div class="row text-center">
         <div class="col-12">
            <div class="h2">Testimonial</div>
         </div>
      </div>
     <div id="testim" class="testim">

  <!--         <div class="testim-cover"> -->
          <div class="wrap">

              <span id="right-arrow" class="arrow right fa fa-chevron-right"></span>
              <span id="left-arrow" class="arrow left fa fa-chevron-left "></span>
              <ul id="testim-dots" class="dots">

                @foreach ($testimonials as $item)

                  <li class="dot @if($loop->last) active @endif"></li>
                  @endforeach

                  {{-- --><li class="dot"></li><!--
                  --><li class="dot"></li><!--
                  --><li class="dot"></li><!--
                  --><li class="dot active"></li> --}}
              </ul>
              <div id="testim-content" class="cont">

                @foreach ($testimonials as $value)

                  <div class="">
                      <div class="img"><img src="{{ asset('uploads/'.$value->photo) }}" alt=""></div>
                      <div class="h4">{{ $value->name }}</div>
                      <p>{{ $value->message }}</p>
                  </div>

                  @endforeach

              </div>
               </div>
          </div>
  <!--         </div> -->
  </section>

  @endif

@endsection
