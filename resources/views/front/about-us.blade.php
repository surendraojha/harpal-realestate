@extends('front.layouts.main')




@if (@$meta)
    @section('title', $meta->meta_title)

    @section('meta')
        <x-meta-head :meta="$meta" />
    @endsection

@else

@section('title',$information->title)

@endif

@section('content')
<section class="bannerSec">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bannerImg">
                    <img src="{{asset('uploads/'.$information->featured_photo)}}" alt="About Us">
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
        <div class="row text-center">
            <div class="col-12 mb-5">
                {{-- <div class="siteTitle">
                    <h3>
                       Who are we?
                    </h3>
                </div> --}}
                {!!$information->description!!}
            </div>
            <div class="col-md-3 col-6">
                <h4>
                   {{$information->value_1}}
                </h4>
                <p>
                    {{$information->title_1}}
                </p>
            </div>
            <div class="col-md-3 col-6">
                <h4>
                    {{$information->value_2}}

                </h4>
                <p>
                    {{$information->title_2}}
                </p>
            </div>
            <div class="col-md-3 col-6">
                <h4>
                    {{$information->value_3}}
                </h4>
                <p>
                    {{$information->title_3}}
                </p>
            </div>
            <div class="col-md-3 col-6">
                <h4>
                    {{$information->value_4}}

                </h4>
                <p>
                    {{$information->title_4}}
                </p>
            </div>
        </div>
    </div>
</section>

@endsection
