<footer>
    <div class="container pb-4">
        <div class="row">
            <div class="col-md-3">
                <h4>
                    Most Searched Locations
                </h4>
                <ul>

                    @foreach ($most_searched_locations as $value)
                        <li>
                            <a href="{{route('front.location',$value->location)}}">
                               {{$value->location}}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-3">
                <h4>
                    Quick Links
                </h4>
                <ul class="impLinks">
                    @foreach ($quick_links as $value)
                    <li>
                        <a href="{{$value->link}}">
                            {{$value->title}}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-3">
                <h4>
                    Accounts
                </h4>
                <ul>
                    <li>
                        <a href="{{route('profile')}}">
                            My Account
                        </a>
                    </li>
                    <li>
                        <a href="{{route('my-property.index')}}">
                            Listed Property
                        </a>
                    </li>
                    <li>
                        <a href="{{route('my-wishlist.index')}}">
                            Wishlist
                        </a>
                    </li>
                    <li>
                        <a href="{{route('front.top-rated')}}">
                             Most Viewed
                        </a>
                    </li>
                    <li>
                        <a href="{{route('front.page','privacy-policy')}}">
                            Privacy policy
                        </a>
                    </li>
                    <li>
                        <a href="{{route('front.page','terms-and-conditions')}}">
                            Terms and Condition
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <img src="{{asset('uploads/'.$setting->company_logo)}}" alt="{{$setting->company_name}}">
                <ul>
                    <li>
                        <a href="tel:{{$setting->phone}}">
                            <!-- Generator: Adobe Illustrator 22.0.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                            <svg fill="#000000" width="17" height="17" version="1.1" id="lni_lni-phone" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                            	 y="0px" viewBox="0 0 64 64" style="enable-background:new 0 0 64 64;" xml:space="preserve">
                            <g>
                            	<path d="M49.1,61.3c-8.2,0-20-5.9-30.8-16.2C3.6,31.1-2.7,15.5,3.7,8.7C4,8.4,4.3,8.2,4.7,8l8.4-4.7c1.9-1,4.3-0.5,5.5,1.2l6.1,8.7
                            		c0.6,0.9,0.9,2,0.7,3c-0.2,1.1-0.8,2-1.7,2.6L20,21.2c-0.2,0.1-0.2,0.2-0.2,0.3c0,0.1,0,0.2,0.1,0.3c2.7,4,10.4,14.2,22.6,21.5
                            		c0.3,0.2,0.8,0.1,1-0.1l2.6-3.5c1.3-1.8,3.8-2.2,5.7-1l9.1,5.8c1.9,1.2,2.5,3.6,1.3,5.5l-5,8c0,0,0,0,0,0c-0.2,0.4-0.5,0.7-0.8,0.9
                            		C54.5,60.6,52,61.3,49.1,61.3z M15.2,6.2c-0.1,0-0.2,0-0.4,0.1L6.4,11c-0.1,0.1-0.1,0.1-0.2,0.1C2,15.6,6.8,29.3,20.8,42.6
                            		c14,13.3,28.5,17.9,33.3,13.8c0,0,0,0,0.1-0.1l5-8c0.1-0.2,0.1-0.5-0.2-0.7l-9.1-5.8c-0.3-0.2-0.8-0.1-1,0.1l-2.6,3.5
                            		c-1.3,1.7-3.7,2.2-5.6,1.1C27.8,38.8,19.8,28.1,17,23.8c-0.6-0.9-0.8-1.9-0.6-3c0.2-1,0.8-2,1.7-2.5l3.7-2.5
                            		c0.2-0.1,0.2-0.2,0.2-0.3c0-0.1,0-0.2-0.1-0.4l-6.1-8.7C15.7,6.3,15.4,6.2,15.2,6.2z M55.7,57.1L55.7,57.1L55.7,57.1z"/>
                            </g>
                            </svg>

                            {{$setting->phone}}</a>
                    </li>
                    <li>
                        <a href="tel:{{$setting->phone}}">
                                <!-- Generator: Adobe Illustrator 22.0.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                                <svg fill="#000000" width="17" height="17" version="1.1" id="lni_lni-whatsapp" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                	 y="0px" viewBox="0 0 64 64" style="enable-background:new 0 0 64 64;" xml:space="preserve">
                                <g id="WA_Logo">
                                	<g>
                                		<path d="M54,9.9c-5.8-5.8-13.7-9-21.8-9C15.2,0.9,1.3,14.7,1.3,31.7c0,5.5,1.4,10.7,4.1,15.5L1,63.1l16.5-4.2
                                			c4.5,2.4,9.6,3.8,14.8,3.8l0,0l0,0C49.2,62.6,63,48.8,63,31.7C63,23.5,59.8,15.8,54,9.9z M32.1,57.4L32.1,57.4
                                			c-4.5,0-9.2-1.3-13.1-3.7l-1-0.6l-9.7,2.5l2.7-9.4l-0.6-1c-2.5-4.1-3.9-8.9-3.9-13.7c0-14.1,11.4-25.5,25.6-25.5
                                			c6.8,0,13.2,2.7,18,7.5s7.5,11.3,7.5,18.2C57.8,46,46.2,57.4,32.1,57.4z M46.2,38.2c-0.8-0.4-4.5-2.3-5.4-2.4
                                			c-0.7-0.3-1.3-0.4-1.7,0.4c-0.4,0.8-2,2.4-2.4,3c-0.4,0.4-0.8,0.6-1.7,0.1c-0.8-0.4-3.2-1.1-6.2-3.9c-2.3-2-3.9-4.5-4.2-5.4
                                			c-0.4-0.8-0.1-1.1,0.4-1.6c0.4-0.4,0.8-0.8,1.1-1.4c0.4-0.4,0.4-0.8,0.8-1.3c0.4-0.4,0.1-1-0.1-1.4c-0.3-0.4-1.7-4.2-2.4-5.8
                                			c-0.6-1.6-1.3-1.3-1.7-1.3c-0.4,0-1,0-1.4,0s-1.4,0.1-2,1c-0.7,0.8-2.7,2.7-2.7,6.5s2.7,7.3,3.2,8c0.4,0.4,5.5,8.3,13.1,11.7
                                			c1.8,0.8,3.2,1.3,4.4,1.7c1.8,0.6,3.5,0.4,4.8,0.3c1.5-0.1,4.5-1.8,5.2-3.7c0.6-1.7,0.6-3.4,0.4-3.7
                                			C47.5,38.8,46.9,38.5,46.2,38.2z"/>
                                	</g>
                                </g>
                                </svg>

                            {{$setting->phone}}</a>
                    </li>
                    <li>
                        <a href="mail-to:{{$setting->email}}">
                            <!-- Generator: Adobe Illustrator 22.0.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                            <svg fill="#000000" width="17" height="17" version="1.1" id="lni_lni-envelope" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                            	 y="0px" viewBox="0 0 64 64" style="enable-background:new 0 0 64 64;" xml:space="preserve">
                            <path d="M57,10.9H7c-3.2,0-5.8,2.6-5.8,5.8v30.7c0,3.2,2.6,5.8,5.8,5.8h50c3.2,0,5.8-2.6,5.8-5.8V16.7C62.8,13.5,60.2,10.9,57,10.9z
                            	 M57,14.4c0.5,0,0.9,0.1,1.3,0.4L33.4,29.9c-0.9,0.5-1.9,0.5-2.8,0L5.7,14.8c0.4-0.2,0.8-0.4,1.3-0.4H57z M57,49.6H7
                            	c-1.2,0-2.3-1-2.3-2.3v-29l24,14.6c1,0.6,2.1,0.9,3.2,0.9c1.1,0,2.2-0.3,3.2-0.9l24-14.6v29C59.3,48.6,58.2,49.6,57,49.6z"/>
                            </svg>

                            {{$setting->email}}</a>
                    </li>
                </ul>
                <ul class="contactForAdvetisement">
                    <li>
                        <a href="{{route('front.contact-us')}}">
                            Contact Us
                        </a>
                    </li>
                </ul>
                <ul class="top-header-social-icons">
                    <li><a href="{{$setting->facebook}}" target="_blank" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="{{$setting->twitter}}" target="_blank" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="{{@$setting->youtube}}" target="_blank" data-toggle="tooltip" data-placement="top" title="" data-original-title="Youtube"><i class="fab fa-youtube"></i></a></li>
                    <li><a href="{{@$setting->linkedin}}" target="_blank" data-toggle="tooltip" data-placement="top" title="" data-original-title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                    <li><a href="{{@$setting->tiktok}}" target="_blank" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tiktok"><i class="fab fa-tiktok"></i></a></li>
                    <li><a href="{{@$setting->instagram}}" target="_blank" data-toggle="tooltip" data-placement="top" title="" data-original-title="Instagram"><i class="fab fa-instagram"></i></a></li>

                </ul>
            </div>
        </div>
    </div>
    <div class="belowBottom border-top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center mb-3 pt-4">
                    <p>
                       {!! $setting->choose_property_text !!}
                    </p>
                </div>
                <div class="col-md-6 text-center pt-4">
                    <div class="newsLetter">
                        <h4 class="pb-2">
                            WIN A TICKET ENTER NOW
                        </h4>
                        <p>
                            Subscribe to our newsletter and we’ll keep you up to date on our products and services
                        </p>
                        <form action="{{route('newsletter.post')}}" method="post">
                            @csrf
                            <div class="d-flex suscribeForm">
                                <input type="email" value="{{old('email')}}"
                                name="email"
                                placeholder="Enter Your Email Address" />
                                <button class="siteBtn" type="submit">
                                    <i class="flaticon-right-arrow"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyrightFooter pt-5 pb-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>
                        1992-{{date('Y')}}. All rights reserved to Kotha Bhada.com
                    </p>
                </div>
                <div class="col-md-6 text-end">
                    <p>
                        Powered By
                        <a href="#">
                            Ivazz Technology
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <button onclick="topFunction()" id="myBtn" title="Go to top">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" height="30" width="30" fill="#333"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M310.6 182.6c-12.51 12.51-32.76 12.49-45.25 0L192 109.3V480c0 17.69-14.31 32-32 32s-32-14.31-32-32V109.3L54.63 182.6c-12.5 12.5-32.75 12.5-45.25 0s-12.5-32.75 0-45.25l128-128c12.5-12.5 32.75-12.5 45.25 0l128 128C323.1 149.9 323.1 170.1 310.6 182.6z"/></svg>
    </button>

</footer>
<!-- Site footer ends -->
<!-- Portion of menu in footer -->
<div class="offcanvas offcanvas-start" tabindex="" id="mobileMenuBox" aria-labelledby="mobileMenuBoxLabel">
    <nav class="siteNav">
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        <a href="{{route('front.home')}}" class="logo">
            <div>
                <img src="{{asset('uploads/'.$setting->company_logo)}}" alt="{{$setting->company_name}}"  width="151" height="28">
            </div>
        </a>
        <ul>
            @auth
            <li>
                <a href="{{route('my-wishlist.index')}}">
                    <div class="listNum" id="wish-list">
                        @php
                            $wish_list_count = \App\Models\WishList::where('user_id',auth()->user()->id)->count();
                        @endphp
                        {{$wish_list_count}}
                    </div>
                    WishList
                </a>
            </li>
            @endauth
            @auth
            <li >
                <a href="{{route('profile')}}">
                    Profile
                </a>
            </li>



            @else

            <li >
                <a href="{{route('front.login')}}">
                    Login
                </a>
            </li>
            @endauth

            <li >
                <a href="{{route('my-property.create')}}">
                    Add Property
                </a>
            </li>


            @auth

            <form id="frm-logout" action="{{ route('custom.logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
                <li>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" >Logout</a>
                </li>
            @endauth
        </ul>
    </nav>
</div>
<!-- Serch Modal -->
<div class="modal fade" id="searchBox" tabindex="" aria-labelledby="searchBoxLabel" aria-hidden="true">
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
</div>
<!-- Search Modal -->
<div class="modal fade" id="searchOptions" tabindex="" role="dialog" aria-labelledby="searchOptionsLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button>
            </div>
        </div>
    </div>
</div>
