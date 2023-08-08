@extends('front.layouts.main')

@section('title', 'FAQs')

@section('css')
<link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css"
    />
@endsection

@section('content')
    <section class="singleProduct">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="row">

                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-12">
                                    <div class="productContent">
                                        <h5>
                                            FAQ'S
                                        </h5>

                                        <x-wide-ad :ads="$top_wide_advertisements"/>

                                        <div class="accordion" id="accordionPanelsStayOpenExample">
                                            @php
                                                $count=0;
                                            @endphp
                                            @foreach ($faqs as $value)
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                                    <button class="accordion-button" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#faq{{$value->id}}" aria-expanded="true"
                                                        aria-controls="faq{{$value->id}}">
                                                        {{$value->question}}
                                                    </button>
                                                </h2>
                                                <div id="faq{{$value->id}}"
                                                    class="accordion-collapse collapse @if($count==0) show @endif"
                                                    aria-labelledby="panelsStayOpen-headingOne">
                                                    <div class="accordion-body">
                                                        {{$value->answer}}
                                                    </div>
                                                </div>
                                            </div>
                                            @php
                                                $count++;
                                            @endphp
                                            @endforeach


                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection


