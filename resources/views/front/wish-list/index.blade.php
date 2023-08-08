@extends('front.layouts.profile')


@section('title','My Wish Lists')

@section('content')
<section class="dashboardSec">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="listingBoxes mt-5">
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="pending-tab">

                           <x-wide-ad :ads="$top_wide_advertisements"/>

                            <div class="row">

                                @foreach ($informations as $value)

                                <div class="col-md-6 mb-4">
                                    <div class="singleenterBox">
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <a href="{{route('property.detail',$value->property->slug)}}">
                                                        <img src="{{asset('uploads/'.$value->property->featured_photo)}}" alt="">
                                                    </a>
                                                </div>
                                                <div class="col-8">
                                                    <div class="singleenterContent">
                                                        <div class="singleTitleBox">
                                                            <a href="{{route('property.detail',$value->property->slug)}}">
                                                                <h4>
                                                                    {{$value->property->title}}
                                                                </h4>
                                                            </a>
                                                            <span>
                                                                #{{$value->property->ad_id}}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-1 text-end">
                                                    <a href="{{route('remove-from-wish-list',$value->property->id)}}" class="trashBtn py-2">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        <div class="location">
                                            {{$value->property->location->location}}
                                        </div>
                                        <div class="pricong">
                                            Rs {{$value->property->price}}
                                        </div>
                                        <div class="removeBox mt-2">
                                            <div class="row">
                                                <div class="col-8">
                                                    Waiting approval from admin. It will be listed  on the website after admin approves you ad.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @endforeach


                            </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
