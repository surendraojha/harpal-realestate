@extends('front.layouts.main')

@if (@$meta)
    @section('title', $meta->meta_title)

    @section('meta')
        <x-meta-head :meta="$meta" />
    @endsection

@else

    @section('title', 'Most Viewed')

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

    <section class="siteSec">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="siteTitle">
                        <h3>
                           Most Viewed
                        </h3>
                    </div>
                </div>
            </div>

            <x-wide-ad :ads="$top_wide_advertisements" />

            <div class="row-cols-5 row">

                @foreach ($informations as $value)
                    @php
                        $className = 'col-md-25';
                    @endphp

                    <x-featured-recommended :value="$value" :className="$className" />
                @endforeach
                <x-pagination :informations="$informations" />
            </div>
        </div>
    </section>


@endsection


@section('script')
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
