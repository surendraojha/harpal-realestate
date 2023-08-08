@extends('front.layouts.profile')

@section('title','Edit Review')

@section('content')


    {{-- <div class="row py-2 align-items-center">
        <div class="col-md-2 col-4 order-1">
            <a href="#">
                <img src="./assets/imgs/kothabhada-logofinal.png" alt="">
            </a>
        </div>
        <div class="col-md-7 col-12 order-3 order-md-2">
            <form action="">
                <div class="customForm d-flex">
                    <input type="text" class="mb-0" placeholder="Type Here to Search">
                    <button class="px-4 py-3 customBtn" style="padding: unset;">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
        <div class="col-md-3 col-6 text-end order-2 order-md-3">
            <a href="#" class="colorBtn py-2 px-4" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="🎈Home Flat Office Shifting Packers and Movers Transport Services in Kathmandu                            ">
               <i class="fas fa-plus"></i> Add Listing
            </a>
        </div>
    </div> --}}
    <div class="ContactForm moreDetailSignup">
        <form action="{{ route('front-testimonial.update',$information->id) }}" method="post"
             enctype="multipart/form-data" id="property-form">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12">
                    <h6 class="text-center mb-3">
                        Edit Review
                    </h6>
                </div>
                @include('front.testimonials.form')

                {{-- property features --}}

                <div class="customForm">
                    <button class="colorBtn ms-0" type="submit">
                        SUBMIT FOR APPROVAL <i class="fas fa-arrow-right ps-2"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    </div>
@endsection





@section('script')
    @php
        $id = 'message';
        $outputId='output';
    @endphp

<x-character-count :id="$id" :outputId="$outputId"/>
@endsection
