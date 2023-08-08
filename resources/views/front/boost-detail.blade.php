@extends('front.layouts.main')


@if(@$meta)

    @section('title',$meta->meta_title)

    @section('meta')


        <x-meta-head :meta="$meta" />
    @endsection

@else

@section('title',' Promote Details')


@endif

@section('css')
<style>
    @media(min-width:767.9px){
        .mobileNavi{
            display: none;
        }
        .desktop-visible{
            display: block;
        }
        .mobile-visible{
            display: none;
        }
    }
    @media(max-width:991.9px){
        .desktopNav,.bannerImg::after{
            display: none;
        }
        .mobileNavi{
            display: flex;
        }
        .desktop-visible{
            display: none;
        }
        .mobile-visible{
            display: block;
        }
    }
    .stepdesignSingle{
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }
    .stepdesignSingle .leftStep{
        height: 80px;
        max-width: 80px;
        background-color: rgb(221 242 240);
        color: #000;
        flex: 0 0 80px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        font-size: 18px;
    }
</style>
@endsection

@section('content')
   <!-- Site Footer start -->
    <!-- Lopgin signup Box -->
    <section class="siteSec">
        <div class="container">

        <x-wide-ad :ads="$top_wide_advertisements"/>

            <div class="row">
                <div class="col-md-6 signupleft text-start">

                        <div class="card card-corner-md pricing-card">
                            <div class="px-4 pt-3 pb-2">
                                <h3 class="fw-normal opacity-7 mt-1 mb-4">
                                    Property Promote
                                </h3>


                                <div>
                                    <div class="pricing-table-price" data-total-price="29">

                                        {!!$setting->boost_description!!}

                                    </div>
                                </div>


                            </div>
                    </div>
                </div>
                <div class="col-md-6 signupRight">
                    <div class="ContactForm">
                            <div class="">
                                <h5 class="mb-2 text-center">
                                    How to Promote
                                </h5>
                                <div class="stepDesign">
                                    @php
                                        $count=1
                                    @endphp
                                    @foreach ($boost_steps as $value)
                                    <div class="stepdesignSingle">
                                        <div class="leftStep">
                                            Step {{$count++}}.
                                        </div>
                                        <div class="rightStep">
                                            {{$value->title}}
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="mt-4">

                                        <a href="{{route('my-property.index')}}" class="btn btn-success text-white">Promote Now</a>
                                    </div>

                                </div>
                            </div>
                    </div>
                </div>



            </div>


        </div>
    </section>

@endsection
