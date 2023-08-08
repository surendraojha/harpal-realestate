<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description"
    content="Oculux Bootstrap 4x admin is super flexible, powerful, clean &amp; modern responsive admin dashboard with unlimited possibilities.">
<meta name="keywords"
    content="admin template, Oculux admin template, dashboard template, flat admin template, responsive admin template, web app, Light Dark version">
<meta name="author" content="GetBootstrap, design by: puffintheme.com">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/css/font-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/css/vivify.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/css/c3.min.css') }}" />
<!-- MAIN CSS -->
<link rel="stylesheet" href="{{ asset('admin/css/site.min.css') }}">

<!-- datepicker -->

<link rel="stylesheet" href="{{ asset('admin/bootstrap-datepicker/bootstrap-datepicker3.css') }}">

<!-- dropdown search -->

<link href="{{ asset('admin/css/select2.css') }}" rel="stylesheet" />
<link href="{{ asset('admin/css/change.css') }}" rel="stylesheet" />

{{-- <link href="{{asset('css/style.css')}}" rel="stylesheet" /> --}}
<link href="{{ asset('admin/css/toggle.css') }}" rel="stylesheet" />

<link href="{{ asset('admin/css/datepicker.css') }}" rel="stylesheet" />

<link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet" />


{{-- toaster --}}

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
{{-- tinymce --}}
<script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>

<link href="{{ asset('admin/css/style.css') }}" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


<style>
    .invalid-custom{
        font-weight: bold;
        color:red;
    }
</style>

@yield('head')
