<style>
    .slimScrollBar {
        background-color: #fff !important;
    }
</style>
<nav id="left-sidebar-nav" class="sidebar-nav">
    <ul id="main-menu" class="metismenu">



        @php
            $current_route = \Request::route()->getName();
        @endphp
        <li class="@if ($current_route == 'dashboard') active @endif">
            <a href="{{ route('dashboard') }}">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>Dashboard</span></a>
        </li>








        {{-- <li class="header">Job</li> --}}

        @php
            $route = ['admin-residental-property.index', 'admin-residental-property.edit', 'admin-commercial-property.index', 'admin-commercial-property.edit', 'featured-property.index', 'featured-property.edit', 'recommended-property.index', 'recommended-property.edit', 'home-page-property.index', 'home-page-property.edit'];
        @endphp

        <li class="@if (in_array($current_route, $route)) active open @endif">
            <a href="#property" class="has-arrow">

                {{-- <i class="icon-home"></i> --}}
                <span>Property </span>

            </a>
            <ul>

                @php
                    $route = ['admin-residental-property.index', 'admin-residental-property.edit'];
                @endphp

                <li class="@if (in_array($current_route, $route)) active @endif">
                    <a href="{{ route('admin-residental-property.index') }}">
                        &nbsp;&nbsp;&nbsp;&nbsp;

                        <span>Residental Properties
                            @if ($residental_pending_property_count > 0)
                                ({{ $residental_pending_property_count }})
                            @endif
                        </span></a>

                </li>


                @php
                    $route = ['admin-commercial-property.index', 'admin-commercial-property.edit'];
                @endphp

                <li class="@if (in_array($current_route, $route)) active @endif">
                    <a href="{{ route('admin-commercial-property.index') }}">
                        &nbsp;&nbsp;&nbsp;&nbsp;

                        <span>Commercial Properties
                            @if ($commerical_pending_property_count > 0)
                                ({{ $commerical_pending_property_count }})
                            @endif
                        </span></a>

                </li>



                @php
                    $route = ['featured-property.index', 'featured-property.edit'];
                @endphp
                <li class="@if (in_array($current_route, $route)) active @endif">
                    <a href="{{ route('featured-property.index') }}">
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <span>Featured Properties
                        </span></a>
                </li>
                @php
                    $route = ['recommended-property.index', 'recommended-property.edit'];
                @endphp
                <li class="@if (in_array($current_route, $route)) active @endif">
                    <a href="{{ route('recommended-property.index') }}">
                        &nbsp;&nbsp;&nbsp;&nbsp;

                        <span>Recommended
                        </span></a>
                </li>

            </ul>

        </li>





        @php
            $route = ['category.index', 'category.edit', 'sub-category.index', 'sub-category.edit', 'child-category.index', 'child-category.edit', 'location.index', 'location.edit', 'feature.index', 'feature.edit', 'floor.index', 'floor.edit', 'road-size.index', 'road-size.edit'];
        @endphp






        <li class="@if (in_array($current_route, $route)) active open @endif">
            <a href="#myPage" class="has-arrow">

                {{-- <i class="icon-home"></i> --}}
                <span>Property Settings </span>

            </a>
            <ul>


                @php
                    $route = ['category.index', 'category.edit'];
                @endphp
                <li class="@if (in_array($current_route, $route)) active @endif">
                    <a href="{{ route('category.index') }}">
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <span>Main Category</span></a>
                </li>

                @php
                    $route = ['sub-category.index', 'sub-category.edit'];
                @endphp
                {{-- subcategories --}}
                <li class="@if (in_array($current_route, $route)) active @endif">
                    <a href="{{ route('sub-category.index') }}">
                        &nbsp;&nbsp;&nbsp;&nbsp;

                        <span>Sub Category</span></a>
                </li>


                @php
                    $route = ['child-category.index', 'child-category.edit'];
                @endphp
                <li class="@if (in_array($current_route, $route)) active @endif">
                    <a href="{{ route('child-category.index') }}">
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <span>Child Category</span></a>
                </li>


                @php
                    $route = ['location.index', 'location.edit'];
                @endphp
                {{-- Location --}}

                <li class="@if (in_array($current_route, $route)) active @endif">
                    <a href="{{ route('location.index') }}">
                        &nbsp;&nbsp;&nbsp;&nbsp;

                        <span>Location</span></a>
                </li>


                @php
                    $route = ['feature.index', 'feature.edit'];
                @endphp


                {{-- Property Feature --}}

                <li class="@if (in_array($current_route, $route)) active @endif">
                    <a href="{{ route('feature.index') }}">
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <span>Local Area Facilities
                        </span></a>
                </li>
                @php
                    $route = ['floor.index', 'floor.edit'];
                @endphp
                {{-- Floor --}}

                <li class="@if (in_array($current_route, $route)) active @endif">
                    <a href="{{ route('floor.index') }}">
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <span>Floor</span></a>
                </li>

                @php
                    $route = ['road-size.index', 'road-size.edit'];
                @endphp
                {{-- Road Size --}}

                <li class="@if (in_array($current_route, $route)) active @endif">
                    <a href="{{ route('road-size.index') }}">
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <span>Road Type</span></a>
                </li>

                @php
                    $route = ['home-stay-video.index'];
                @endphp





            </ul>
        </li>








        {{-- ---------------------------------------------------------------------------------------------------------------------------
                                Others
----------------------------------------------------------------------------------------------------------------------------- --}}

        <li class="header">Others</li>
        @php
            $current_route = \Request::route()->getName();
        @endphp
        <li class="@if ($current_route == 'boost-request.index') active @endif">
            <a href="{{ route('boost-request.index') }}">
                &nbsp;&nbsp;&nbsp;&nbsp;
                @php
                    $boost_count = \App\Models\BoostPost::where('status', 0)->count();
                @endphp
                <span>Boost Request

                    @if ($boost_count > 0)
                        ( {{ $boost_count }} )
                    @endif
                </span>
            </a>
        </li>


        <li class="@if ($current_route == 'boost-content.index') active @endif">
            <a href="{{ route('boost-content.index') }}">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>Boost Content</span>
            </a>
        </li>




        <li class="@if ($current_route == 'boost-step.index') active @endif">
            <a href="{{ route('boost-step.index') }}">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>Boost Step</span>
            </a>
        </li>

        {{-- ourservices --}}
        @php
            $route = ['shift-home.index', 'shift-home.edit'];
        @endphp

        <li class="@if (in_array($current_route, $route)) active @endif">
            <a href="{{ route('shift-home.index') }}">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>Shift Home</span></a>
        </li>

        {{-- ourservices --}}
        @php
            $route = ['shift-home-item.index', 'shift-home-item.edit'];
        @endphp

        <li class="@if (in_array($current_route, $route)) active @endif">
            <a href="{{ route('shift-home-item.index') }}">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>Shift Home Items</span></a>
        </li>


        @php
            $route = ['shift-home-content.index'];
        @endphp

        <li class="@if (in_array($current_route, $route)) active @endif">
            <a href="{{ route('shift-home-content.index') }}">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>Shift Home Content</span></a>
        </li>



        @php
            $route = ['blog.index', 'blog.edit'];
        @endphp
        {{-- pages --}}
        <li class="@if (in_array($current_route, $route)) active @endif">
            <a href="{{ route('blog.index') }}">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>Blogs
                </span></a>
        </li>


        @php
            $route = ['blog-category.index', 'blog-category.edit'];
        @endphp
        {{-- pages --}}
        <li class="@if (in_array($current_route, $route)) active @endif">
            <a href="{{ route('blog-category.index') }}">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>Blog Category
                </span></a>
        </li>



        @php
            $route = ['faq.index', 'faq.edit'];
        @endphp

        {{-- FAQ --}}
        <li class="@if (in_array($current_route, $route)) active @endif">
            <a href="{{ route('faq.index') }}">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>FAQ</span></a>
        </li>












        @php
            $route = ['testimonial.index', 'testimonial.edit'];
        @endphp

        {{-- testimonials --}}
        <li class="@if (in_array($current_route, $route)) active @endif">
            <a href="{{ route('testimonial.index') }}">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>Testimonial</span></a>
        </li>



        @php
            $route = ['newsletter.index', 'newsletter.edit'];
        @endphp
        {{-- newsletter subscriber --}}

        <li class="@if (in_array($current_route, $route)) active @endif">
            <a href="{{ route('newsletter.index') }}">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>Newsletter Subscriber
                </span></a>
        </li>


        @php
            $route = ['page.index', 'page.edit'];
        @endphp
        {{-- pages --}}
        <li class="@if (in_array($current_route, $route)) active @endif">
            <a href="{{ route('page.index') }}">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>Page
                </span></a>
        </li>

        @php
            $route = ['partner.index', 'partner.edit'];
        @endphp

        {{-- Partners --}}
        <li class="@if (in_array($current_route, $route)) active @endif">
            <a href="{{ route('partner.index') }}">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>Partner
                </span></a>
        </li>






        @php
            $route = ['quick-link.index', 'quick-link.edit'];
        @endphp


        {{-- Quick Link --}}
        <li class="@if (in_array($current_route, $route)) active @endif">
            <a href="{{ route('quick-link.index') }}">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <span>Quick Link</span>
            </a>
        </li>







        @php
            $route = ['message.index', 'message.edit'];
        @endphp
        {{-- Contact Us --}}
        <li class="@if (in_array($current_route, $route)) active @endif">
            <a href="{{ route('message.index') }}">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>Contact Us</span></a>
        </li>

        @php
            $route = ['contact-us.index', 'contact-us.edit'];
        @endphp


        <li class="@if (in_array($current_route, $route)) active @endif">
            <a href="{{ route('contact-us.index') }}">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>Find Me Room</span></a>
        </li>


        @php
            $route = ['support-forum.index', 'support-forum.edit'];
        @endphp
        {{-- About us --}}

        <li class="@if (in_array($current_route, $route)) active @endif">
            <a href="{{ route('support-forum.index') }}">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>Support Forum
                </span></a>
        </li>



        {{-- About us --}}
        @php
            $route = ['about-us.index', 'about-us.edit'];
        @endphp
        <li class="@if (in_array($current_route, $route)) active @endif">
            <a href="{{ route('about-us.index') }}">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>About us
                </span></a>
        </li>






        {{-- About us --}}
        @php
            $route = ['watermark.index', 'watermark.edit'];
        @endphp
        <li class="@if (in_array($current_route, $route)) active @endif">
            <a href="{{ route('watermark.index') }}">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>Watermark
                </span></a>
        </li>
        {{-- About us --}}
        @php
            $route = ['advertisement.index', 'advertisement.edit'];
        @endphp
        <li class="@if (in_array($current_route, $route)) active @endif">
            <a href="{{ route('advertisement.index') }}">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>Advertisement
                </span></a>
        </li>

        @php
            $route = ['boost-subscription.index', 'boost-subscription.edit'];
        @endphp
        <li class="@if ($current_route == 'boost-subscription.index') active @endif">
            <a href="{{ route('boost-subscription.index') }}">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>Subscription Settings</span>
            </a>
        </li>


        {{-- company Profile --}}
        @php
            $route = ['settings.index'];
        @endphp

        <li class="@if (in_array($current_route, $route)) active @endif">
            <a href="{{ route('settings.index') }}">
                &nbsp;&nbsp;&nbsp;&nbsp;
                Settings
            </a>
        </li>



        @if ($user->role != 'editor')
            @php
                $route = ['user.index', 'user.edit'];
            @endphp

            <li class="@if (in_array($current_route, $route)) active @endif">

                <a href="{{ route('user.index') }}">
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    Users
                </a>
            </li>
        @endif


        @php
            $route = ['meta-tag.index', 'meta-tag.edit'];
        @endphp

        <li class="@if (in_array($current_route, $route)) active @endif">

            <a href="{{ route('meta-tag.index') }}">
                &nbsp;&nbsp;&nbsp;&nbsp;
                Meta Tag
            </a>
        </li>



        @php
            $route = ['change.password'];
        @endphp
        {{-- <li class="@if (in_array($current_route, $route)) active @endif">
            <a href="{{ route('change.password') }}">
                &nbsp;&nbsp;&nbsp;&nbsp;
                Change Password
            </a>
        </li> --}}


    </ul>
</nav>
