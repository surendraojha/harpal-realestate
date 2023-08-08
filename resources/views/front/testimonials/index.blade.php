@extends('front.layouts.profile')
@section('title','My Review')

@section('css')
    <style>
        @media(min-width:767.9px) {
            .mobileNavi {
                display: none;
            }

            .desktop-visible {
                display: block;
            }

            .mobile-visible {
                display: none;
            }
        }

        @media(max-width:991.9px) {

            .desktopNav,
            .bannerImg::after {
                display: none;
            }

            .mobileNavi {
                display: flex;
            }

            .desktop-visible {
                display: none;
            }

            .mobile-visible {
                display: block;
            }
        }

    </style>
@endsection
@section('content')
    <div class="listingBoxes mt-2 mt-md-5">
        <div class="d-flex justify-content-between">
        <div>

        </div>
            <div>

                    <div class="text-end order-2 order-md-3 mb-5">
                        <a href="{{route('front-testimonial.create')}}" class="colorBtn py-2 px-4" >
                           <i class="fas fa-plus"></i> Write Review
                        </a>
                    </div>
            </div>
        </div>
        <div class="tab-content" id="myTabContent">




            <div class="tab-pane fade active show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="row">

                    @foreach ($informations as $value)

                    <div class="col-md-6 mb-4">
                        <div class="singleenterBox border">
                            <div class="row  mb-2">
                                <div class="col-3">
                                    <img src="{{asset('uploads/'.$value->photo)}}" alt="">
                                </div>
                                <div class="col-8">
                                    <div class="singleenterContent">
                                        <div class="singleTitleBox">
                                            <h4>
                                                {{$value->name}}
                                            </h4>
                                            <span>
                                                <strong>Activity: </strong> {{$value->activity}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-1">
                                    <form action="{{route('front-testimonial.destroy',$value->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="trashBtn" type="submit"
                                        onclick="return confirm('Are You Sure You Want To Delete This Review?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    <a class="trashBtn mt-3" href="{{route('front-testimonial.edit',$value->id)}}"
                                        >
                                             <i class="fas fa-edit"></i>
                                 </a>
                                </div>
                            </div>
                            <div class="location">
                                {{$value->message}}
                            </div>
                            <div class="pricong">
                                <strong>Ratings: </strong> {{$value->rating}} /5
                            </div>
                            <div class="removeBox mt-2">
                                <div class="row align-items-center">
                                    <div class="col-md-6 mb-3">
                                        <strong>Status:</strong> @if($value->status==1) Active @else Pending  @endif


                                    </div>
                                    <div class="col-md-6 mb-3">
                                        Created Date : {{date('d M, Y',strtotime($value->created_at))}}
                                   </div>

                                   <div class="col-md-6 mb-3">
                                    Last Updated Date : {{date('d M, Y',strtotime($value->updated_at))}}
                               </div>

                                </div>


                            </div>


                        </div>
                    </div>

                    @endforeach
                </div>
            </div>



        </div>
    @endsection
