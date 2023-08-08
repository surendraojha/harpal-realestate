<nav id="left-sidebar-nav" class="sidebar-nav">
    <ul id="main-menu" class="metismenu">

        <li class="">
            <a href="{{ url('dashboard') }}">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>Dashboard</span></a>
        </li>



        {{-- Visitor section --}}


        <li class="active open">
            <a href="#myPage" class="has-arrow">
                {{-- <i class="icon-home"></i> --}}
                <span>Visitor Registration </span></a>
            <ul>


                {{-- Visitor bookigs --}}


                {{-- Visitor Participant --}}

                <li class="">
                    <a href="#">
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        Participant Users
                    </a>
                </li>

                {{-- Pdf --}}






            </ul>
        </li>



        {{-- ---------------------------------------------------------------------------------------------------------------------------
                                Others
----------------------------------------------------------------------------------------------------------------------------- --}}

        <li class="header">Others</li>




























        {{-- pages --}}



        <li class="">
            <a href="#">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>Page
                </span></a>
        </li>












        {{-- Album --}}
        <li class="">
            <a href="#">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <span>Album
                </span></a>
        </li>













        {{-- Contact Us --}}

        <li class="">
            <a href="#">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>Contact Us</span></a>
        </li>





        {{-- why us --}}

        <li class="">
            <a href="#">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>About us
                </span></a>
        </li>






        {{-- About us --}}
        <li class="">
            <a href="#">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <span>Company Information</span></a>
        </li>


        {{-- Banner --}}
        <li class="">
            <a href="#">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <span>Slider</span></a>
        </li>


        <li class="">
            <a href="{{route('change.password')}}">
                &nbsp;&nbsp;&nbsp;&nbsp;
                Change Password
            </a>
        </li>


    </ul>
</nav>
