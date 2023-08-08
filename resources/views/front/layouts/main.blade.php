<!DOCTYPE html>
<html lang="en">
<head>
    @include('front.layouts.head')




<body  onload="loadExtJS();">



<style>
    .siteHeader {
    padding: 5px 0;
    position: sticky;
    top: 0;
    z-index: 99;
    background-color: #fff;
}
@media (max-width: 991.9px){
    .searchForm {
        left:unset;
        margin-top:0;
    }
}
@media (min-width: 991.9px){
    .optionalPages{
    position:sticky;
    top:6rem;
    z-index:11;
}

}
</style>
    <header class="siteHeader" id="myHeader">
        <div class="menuHeader">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-md-2 col-4 col-xs-2">
                        <a href="{{route('front.home')}}" class="logo">
                            <div>
                                <img src="{{asset('uploads/'.@$setting->company_logo)}}" alt="{{$setting->company_name}}" width="130" height="80" style="object-fit: contain;">
                            </div>
                        </a>
                    </div>
                    {{-- <div class="col-lg-3 col-md-2 col-3">
                        <nav class="siteNav desktopNav">
                            @php
                                $current_route = \Request::route()->getName()
                            @endphp
                            <ul>
                                <li >
                                    <a href="{{route('front.boost-detail')}}">
                                        Promote Your Property
                                    </a>
                                </li>

                            </ul>
                        </nav>
                        <div class="mobileNavi">
                            <a class="" data-bs-toggle="offcanvas" href="#mobileMenuBox" role="button" aria-controls="mobileMenuBox">
                                <i class="fas fa-bars"></i>
                            </a>
                            <a href="#searchTab">
                                <i class="fas fa-search"></i>
                            </a>
                        </div>
                    </div>
                    --}}
                    <div class="col-lg-6 col-md-6  col-5 d-md-block">
                        <div class="iconsMenu">
                            <ul>

                                <li>
                                    <a href="{{route('my-wishlist.index')}}" class="d-none d-md-block">
                                        <div class="listNum" id="wish-list">
                                        @auth
                                            @php
                                                $wish_list_count = \App\Models\WishList::where('user_id',auth()->user()->id)->count();
                                            @endphp
                                            {{$wish_list_count}}
                                            @else
                                            0
                                        @endauth
                                        </div>
                                        WishList <img src="{{asset('front/assets/imgs/wishlist.svg')}}" alt="wishlist">
                                    </a>
                                </li>
                                @auth
                                <li class="d-md-block d-none">
                                    <a href="{{route('my-property.index')}}" class="d-flex align-items-center">
                                        😊 <span id="greetings"></span>&nbsp;



                                        @php
                                            $user = auth()->user();
                                            $name = explode(' ',$user->name);
                                        @endphp
                                        @if($user->profile)
                                        @php
                                            $path = asset('uploads/'.$user->profile->photo);
                                        @endphp
                                        @else
                                        @php
                                            $path = asset('front/assets/imgs/user.svg');
                                        @endphp
                                        @endif
                                        <img src="{{$path}}" alt="User" class="@if($user->profile) headerProfileImg @else @endif">
                                        {{$name[0]}}
                                    </a>
                                </li>
                                @else

                                <li class="d-md-block d-none">
                                    <a href="{{route('front.login')}}">
                                        Login<img src="{{asset('front/assets/imgs/user.svg')}}" alt="login">
                                    </a>
                                </li>
                                @endauth

                                <li class="d-md-block">
                                    <a href="{{route('my-property.create')}}">
                                        Add Property  <img src="{{asset('front/assets/imgs/plus.svg')}}" alt="add property">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-5 col-3">
                        <div class="topRight text-end">
                            <a href="{{route('front.boost-detail')}}" class=" d-block d-md-block"  data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="Promote your rental property to reach more people across additional placements">
                                PROMOTE
                            </a>
                            <a href="{{route('findme.room')}}" class=" d-none d-md-block" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Need Assistance with property search ?">
                               Find Me Room
                            </a>
                            <a href="{{route('front.shifthome')}}" class="colorBtn  d-none d-md-block"  data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="Home Flat Office Shifting Packers and Movers Transport Services in Kathmandu">
                                 <i class="fas fa-truck-pickup"></i> Shift Home
                             </a>
                        </div>
                    </div>
                    <div class="mobileBottom d-block d-md-none">
                        <ul>
                            <li>
                                <a href="{{route('front.home')}}">
                                    <i class="fas fa-home"></i>
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="{{route('findme.room')}}">
                                    <i class="fas fa-search"></i>
                                    Find Me Room
                                </a>
                            </li>
                            <li>
                                <a href="{{route('login')}}">
                                    <i class="fas fa-user"></i>
                                    Login / Signup
                                </a>
                            </li>
                            <li>
                                <a href="{{route('front.shifthome')}}">
                                    <i class="fas fa-truck-moving"></i>
                                    Shift Home
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Site Footer start -->
    <!-- Lopgin signup Box -->
   @yield('content')


   <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Your Own Forum</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('submit.forum')}}" method="post">
                @csrf
                <div class="customForm">
                    <textarea placeholder="Your Message" name="comment" id="" cols="30" rows="10">{{old('comment')}}</textarea>
                </div>
                <div class="customForm text-end">
                    <button class="colorBtn" type="submit">
                      Post Your Question <i class="flaticon-right-arrow ps-2"></i>
                    </button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>



  <script>
    window.onscroll = function() {scrollOnTop()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function scrollOnTop() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
</script>



  {{-- qr code  --}}


  <div class="modal fade" id="staticBackdrop" tabindex="" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdroptitle">Scan QR Code</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <div class="customForm">

                        <img height="300px" src="{{asset('uploads/'.$setting->qr_code)}}" alt="QR Code">
                </div>

        </div>
      </div>
    </div>
  </div>


  @include('front.layouts.footer')
</body>
@include('front.layouts.scripts')
</html>
