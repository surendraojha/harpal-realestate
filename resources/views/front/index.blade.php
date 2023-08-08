@extends('front.layouts.main')

@if (@$meta)
    @section('title', $meta->meta_title)

    @section('meta')
        <x-meta-head :meta="$meta" />
    @endsection

@else

@section('title', $setting->company_name)

@endif


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

    <x-main-search :locations="$locations" :categories="$categories" />





    <x-wide-ad :ads="$above_featured" />

    <!-- Newest resendential FDeals -->
    @include('front.includes.featured')
    <!-- Newest deals ends -->
    <!-- Newest resendential FDeals -->
    <x-wide-ad :ads="$below_featured" />

    @php
    $count = 0;
    @endphp
    @foreach ($category as $value)
        @if ($value->property->isEmpty() == false)
            <section class="siteSec">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="siteTitle">
                                <h3>
                                    {{ $value->title }}
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="row-cols-5 row">

                        @foreach ($value->property->sortByDesc('id')->take(5) as $v)
                            @php
                                $className = 'col-md-25';
                            @endphp

                            <x-featured-recommended :value="$v" :className="$className" />
                        @endforeach


                        <div class="col-12 text-end">
                            <a href="{{ route('front.category', $value->slug) }}"
                                class="siteBtn d-inline-block mt-3 text-end py-2">
                                Show All <i class="flaticon-right-arrow ps-2"></i>
                            </a>
                        </div>


                    </div>
                    @if ($count == 0)
                        <x-wide-ad :ads="$between_home_page_product" />
                    @endif

                    @php
                        $count++;
                    @endphp
                </div>
            </section>
        @endif
    @endforeach
    <x-wide-ad :ads="$below_home_page_product" />
    <!-- Newest deals ends -->
    <!-- Newest commertail  FDeals -->

    <!-- Newest deals ends -->
    <!-- Featured Products start -->
    @include('front.includes.new-deals')


    <x-wide-ad :ads="$below_new_deals" />
    <!-- Featured products ends -->
    <!-- Section for recommended products ends -->
    <!-- Section post your thoughts section start -->
    @include('front.includes.forum-home')
    <x-wide-ad :ads="$below_forum" />
    <!-- Post your thoughts section ends -->
    <!-- Section for recommended products -->
    @include('front.includes.recommended')
    <x-wide-ad :ads="$below_recommended" />
    <!-- Why choose us -->
    @include('front.includes.about-us')

    <x-wide-ad :ads="$below_about_us" />
    <!-- Why choose us ends -->
    <!-- Customer reviews -->

    @include('front.includes.testimonial')
    <!-- Customer Reviews Ends -->



    @if ($partners->isEmpty() == false)
        <!-- Blogs section -->
        <section class="siteSec partnerSec">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12">
                        <div class="siteTitle">
                            <h3>
                            <h3>Our Associates</h3>

                            </h3>
                        </div>
                    </div>
                    @foreach ($partners as $value)
                        <div class="col-md-2 col-6">
                            <a href="{{ $value->link }}" target="_blank">

                                <img src="{{ asset('uploads/' . $value->photo) }}" alt="partner" title="Our Associates">
                            </a>
                        </div>
                    @endforeach
                    <div class="col-12 mt-4">
                        <a href="{{ route('front.partner') }}"
                            class="siteBtn d-inline-block ml-auto float-end py-2 ">View All
                            <i class="flaticon-right-arrow ps-2"></i></i></a>
                    </div>
                </div>
            </div>
        </section>

    @endif
    <!-- Blogs Section ends -->
    <!-- Site Footer start -->
@endsection


@section('script')
    <x-search-price />
    <script>
        //scripts only for rental home page
        new SlimSelect({
            select: '.multiple-category'
        });
        new SlimSelect({
            select: '.multiple-location'
        });
        new SlimSelect({
            select: '.customLocation'
        });
        new SlimSelect({
            select: '.customCategory'
        });


        function like(id) {
            // alert(id);

            var url = "{{ url('like-support-forum') }}/" + id;

            $.ajax({
                type: 'GET',
                url: url,

                success: function(data) {
                    // console.log(data);
                    // alert(data);
                    $('#like-' + id).html(data.like);

                }
            });
        }

        // for wishlist
        function addToWishList(id) {
            var url = "{{ url('add-to-wishlist') }}/" + id;

            $.ajax({
                type: 'GET',
                url: url,

                success: function(data) {
                    // console.log(data);
                    // alert(data);
                    $('#wish-list').html(data.wishlist_count);

                    toastr.success("Property Is Added To WishList Successfully!!");

                }
            });
        }
    </script>
@endsection
