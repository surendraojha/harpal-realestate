<!doctype html>
<html lang="en">
<head>

{{-- @php
    @$setting = \App\Models\Setting::find(1);
 @endphp --}}
<title> {{@$setting->company_name}} | @yield('title')</title>

{{-- include the links --}}

@include('common.links.css')

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



{{-- google analytics --}}
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-L58E7B5W8C"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-L58E7B5W8C');
</script>
</head>
{{-- <body class="theme-cyan font-montserrat dark_version"> --}}



<body class="theme-cyan font-montserrat light_version">

@include('admin.layouts.loader')

<!-- Theme Setting -->
<!--  -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<div id="wrapper">
    <nav class="navbar top-navbar">
        <div class="container-fluid">

            <div class="navbar-left">
                <div class="navbar-btn">
                    <a href="{{route('dashboard')}}">

                    <img src="{{asset('public/uploads/'.@$setting->favicon)}}"
                     alt="Logo" class="img-fluid logo"></a>
                    <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
                </div>
                <!--  -->
            </div>

            <div class="navbar-right">

                <div id="navbar-menu">

                    <ul class="nav navbar-nav">
                        @include('admin.layouts.user_info')


                        <li><a href="#" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="icon-menu"><i class="icon-power"></i></a></li>
                        <form id="frm-logout" action="{{ route('custom.logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </ul>
                </div>



            </div>
        </div>
    </nav>

    <div id="left-sidebar" class="sidebar">
        <div class="navbar-brand">
            <a href="{{route('dashboard')}}"><img src="{{asset('uploads/'.@$setting->company_logo)}}" alt="Logo" class="img-fluid logo">
            <span> {{@$setting->company_name}}</span></a>
            <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="lnr lnr-menu icon-close"></i></button>
        </div>
        <div class="sidebar-scroll">
            <!-- welcome , username section -->
             <!--if user is superadmin then provide him all navlinks  -->

                @include('admin.layouts.navbar')


        </div>
    </div>


     @yield('content')
</div>
<!-- Javascript -->

@include('common.links.js')

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script>
    $('.select2').select2({

        // tags: true,
        allowClear: true,
    });
</script>


{{-- unselect video --}}


<x-unselect-video-script />

</body>
</html>
