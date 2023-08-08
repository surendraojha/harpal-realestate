<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" type="image/jpg" href="{{asset('uploads/'.$setting->favicon)}}"/>

<title> @yield('title') | {{$setting->tagline}}</title>


@yield('meta')

<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Rubik:300,400,500,700,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{asset('front/assets/icons/fontawesome/all.min.css')}}">
<link rel="stylesheet" href="{{asset('front/assets/plugins/slider/swiper.min.css')}}">
<link rel="stylesheet" href="{{asset('front/assets/icons/flaticon/flaticon.css')}}">
<link rel="stylesheet" href="{{asset('front/assets/plugins/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('front/assets/css/jquery-ui.min.css')}}">
<link rel="stylesheet" href="{{asset('front/assets/css/select.min.css')}}">
<link rel="stylesheet" href="{{asset('front/assets/js/datepicker/theme/css/t-datepicker.min.css')}}">
<link rel="stylesheet" href="{{asset('front/assets/js/datepicker/theme/css/themes/t-datepicker-blue.css')}}">
<link rel="stylesheet" href="{{asset('front/assets/css/style.css')}}">

<link rel="stylesheet" href="{{asset('toaster.min.css')}}">

{{-- select 2 --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@yield('css')



</head>
