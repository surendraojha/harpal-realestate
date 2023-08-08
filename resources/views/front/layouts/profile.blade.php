<!DOCTYPE html>
<html lang="en">
<head>

    @include('front.layouts.head')
<body>

    {{-- frontnend property validation  --}}


    <style>

       .text-danger{
            color: #dc3545 !important;

        }
        .invalid-custom{
            width: 100%;
            margin-top: 0.25rem;
            font-size: 12px;
            color: #dc3545;
            font-weight: 500;
            text-transform: uppercase;
            margin-bottom: 20px;
            flex: 0 0 100%;
            max-width: 100%
        }
    </style>

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
        .signupRight .select2-container{
                margin-bottom: 0 !important;
            }
    </style>
    <!-- Site Footer start -->
    <!-- Lopgin signup Box -->
    <section class="dashboardSec">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 col-2">
                    <div class="offcanvas dashNav offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="dashMenu" aria-controls="offcanvasScrolling" style="position: relative;">
                        <nav class="siteNav">
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            <button class="closeBtnDash" type="button" data-bs-toggle="offcanvas" data-bs-target="#dashMenu" aria-controls="dashMenu">
                                <i class="fas fa-angle-right"></i>
                              </button>
                            <a href="{{route('profile')}}" class="profileBox">
                                <div>
                                    @if (@$profile->photo)
                                    @php
                                        $path = asset('uploads/' . @$profile->photo);
                                    @endphp
                                @else
                                    @php
                                        $path = asset('front/assets/imgs/user.png');
                                    @endphp
                                @endif
                                    <img src="{{$path}}" alt="{{@$user->name}}" height="50px" width="50px">
                                    Hello  {{$user->name}}
                                </div>
                            </a>
                            <ul class="dashboardMenu">


                                @php
                                    $current_route = \Request::route()->getName();

                                @endphp
                                <li>
                                    <a href="{{route('front.dashboard')}}" class="@if($current_route=='front.dashboard') active @endif">
                                        <i class="fas fa-cookie"></i>
                                        <span>
                                            Dashboard
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('my-property.index')}}"
                                    class="@if($current_route=='my-property.index'  || $current_route=='my-property.create') active @endif"
                                    >
                                        <i class="fas fa-home"></i>
                                        <span>
                                            My Rental
                                        </span>
                                    </a>
                                </li>


                                <li>
                                    <a href="{{route('my-wishlist.index')}}"
                                    class="@if($current_route=='my-wishlist.index') active @endif"

                                    >
                                        <i class="fas fa-heart"></i>
                                        <span>
                                            Wishlist
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('profile')}}"
                                    class="@if($current_route=='profile') active @endif"

                                    >
                                        <i class="fas fa-user"></i>
                                        <span>
                                            Profile
                                        </span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{route('front-testimonial.index')}}"
                                    class="@if($current_route=='front-testimonial.index') active @endif"

                                    >
                                        <i class="fas fa-user"></i>
                                        <span>
                                            Write Review
                                        </span>
                                    </a>
                                </li>

                                {{-- change password --}}
                                <li>
                                    <a href="{{route('front.change')}}"
                                    class="@if($current_route=='front.change') active @endif"

                                    >
                                    <i class="fa-solid fa-key"></i>
                                        <span>
                                            Change Password
                                        </span>
                                    </a>
                                </li>


                                <li>
                                    <a href="{{route('my.comments')}}"
                                    class="@if($current_route=='my.comments') active @endif">
                                        <i class="fa-solid fa-reply"></i>
                                        <span>
                                           Forum Replies
                                        </span>
                                    </a>
                                </li>
                                {{-- <li>
                                    <a href="#">
                                        <i class="fas fa-chart-bar"></i>
                                        <span>
                                            Stastcis
                                        </span>
                                    </a>
                                </li> --}}
                                {{-- <li>
                                    <a href="#">
                                        <i class="fas fa-cog"></i>
                                        <span>
                                            Setting
                                        </span>
                                    </a>
                                </li> --}}



                                <li>

                                    <form id="frm-logout" action="{{ route('custom.logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>


                                    <a href="#" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                                        <i class="fas fa-sign-out-alt"></i>
                                        <span>
                                            Logout
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-10 signupRight">
                    <div class="row py-2 align-items-center">
                        <div class="col-md-2 col-12 order-1 mb-2">
                            <a href="{{route('front.home')}}">
                                <img src="{{asset('uploads/'.$setting->company_logo)}}" alt="{{$setting->company_name}}">
                            </a>
                        </div>

                        <div class="col-md-10 col-12 order-3 order-md-2">
                            @php
                            $search_locations = \App\Models\Location::where('status',1)->orderBy('order')->get();
                        @endphp
                            <form action="{{route('filter.property')}}">
                                <div class="customForm d-flex dashSearch ps-lg-5 ms-lg-5">
                                    @php
                                        $search_locations = \App\Models\Location::where('status',1)->orderBy('order')->get();
                                    @endphp
                                    <select name="location[]" class="select2 dashLocation" multiple id="">
                                        <option value="" disabled >Type Here To Search</option>
                                        @foreach ($search_locations as $value)
                                            <option value="{{$value->id}}">{{$value->location}}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="px-4 py-3 customBtn" style="padding: unset;">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>


                        @php
                        $current_route = \Request::route()->getName();
                    @endphp
                    {{--
                    @if($current_route !='my-homestay.index')
                        <div class="col-md-3 col-6 text-end order-2 order-md-3">
                            <a href="{{route('my-property.create')}}" class="colorBtn py-2 px-4" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="🎈Home Flat Office Shifting Packers and Movers Transport Services in Kathmandu                            ">
                               <i class="fas fa-plus"></i> Add Listing
                            </a>
                        </div>

                    @else
                    <div class="col-md-3 col-6 text-end order-2 order-md-3">
                        <a href="{{route('home-stay.create')}}" class="colorBtn py-2 px-4" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="🎈Home Flat Office Shifting Packers and Movers Transport Services in Kathmandu                            ">
                           <i class="fas fa-plus"></i> Add Home Stay Property
                        </a>
                    </div>
                    @endif
                    --}}
                </div>

                    @yield('content')
                </div>
            </div>
        </div>
    </section>
    <!-- Portion of menu in footer -->
    {{-- <div class="offcanvas offcanvas-start" tabindex="-1" id="mobileMenuBox" aria-labelledby="mobileMenuBoxLabel">
        <nav class="siteNav">
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            <a href="#" class="logo">
                <div>
                    <img src="{{asset('uploads/'.$setting->company_logo)}}" alt=""  width="151" height="28">
                </div>
            </a>
            <ul>
                <li>
                    <a href="#">
                                            Dashboard
                    </a>
                </li>
                <li>
                    <a href="#">
                                            Change Password
                    </a>
                </li>
                <li>
                    <a href="#">
                        Wastu
                    </a>
                </li>
            </ul>
        </nav>
    </div> --}}
    <!-- Serch Modal -->
    {{-- <div class="modal fade" id="searchBox" tabindex="-1" aria-labelledby="searchBoxLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="searchForm">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <form action="">
                        <div class="container">
                            <div class="row">
                                <div class="col-9">
                                    <div class="fieldBox">
                                        <i class="flaticon-hourglass"></i>
                                        <label for="keyword">Keyword</label>
                                        <input type="text" class="formCustom" placeholder="Search..." id="keywords" name="keywords">
                                    </div>
                                </div>
                                <div class="col-3 text-end">
                                    <button type="submit" class="siteBtn">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Search Modal -->
    {{-- <div class="modal fade" id="searchOptions" tabindex="-1" role="dialog" aria-labelledby="searchOptionsLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button>
                </div>
            </div>
        </div>
    </div> --}}
     {{-- qr code  --}}


  <div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdroptitle">Scan QR Code</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <div class="customForm">

                        <img height="300px" src="{{asset('uploads/'.$setting->qr_code)}}" alt="">
                </div>

        </div>
      </div>
    </div>
  </div>
</body>

@include('front.layouts.scripts')
</html>
