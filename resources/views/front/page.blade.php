@extends('front.layouts.main')
@section('title',$information->title)
@section('content')
<section class="bannerSec">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bannerImg">
                    <img src="{{asset('uploads/'.$information->photo)}}" alt="{{$information->title}}">
                    <div class="bannerCaption">
                        <div class="siteTitle mt-4">
                            <h5 class="bannerTitle">
                                {{$information->title}}
                            </h5>

                            @if(@$information->subtitle)
                                <i class="bannersubTitle">
                                {{@$information->subtitle}}
                                </i>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<x-wide-ad :ads="$top_wide_advertisements"/>

    <!-- Section post your thoughts section start -->
<section class="siteSec">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-5 stiteContent">
                {{-- <div class="siteTitle">
                    <h3>
                       Who are we?
                    </h3>
                </div> --}}
                {!!$information->description!!}
            </div>


        </div>
    </div>
</section>

@endsection
