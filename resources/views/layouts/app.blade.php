<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">
    
    <title>@yield('title')</title>
    <link rel="icon" href="{{asset('storage/app/logo/logodongphucandy.png')}}" type="image/png">
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{asset('public/assets/css/bootstrap.min.css')}}">
    
    <!-- Customizable CSS -->
    <link rel="stylesheet" href="{{asset('public/assets/css/main.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css">
    <link rel="stylesheet" href="{{asset('public/rating/rating.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/css/blue.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/css/owl.transitions.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/css/rateit.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/css/bootstrap-select.min.css')}}">
    <link href="{{asset('public/assets/css/lightbox.css')}}" rel="stylesheet">
    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="{{asset('public/assets/css/font-awesome.css')}}">
    <!-- Fonts --> 
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    
</head>
<body class="cnt-home">
    @include('layouts._header')
    <div class="body-content outer-top-xs" id="top-banner-and-menu">
        <div class="container">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </div>

    @include('layouts._footer')
    <script src="{{asset('public/assets/js/jquery-1.11.1.min.js')}}"></script>
    <script src="{{asset('public/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/assets/js/bootstrap-hover-dropdown.min.js')}}"></script>
    <script src="{{asset('public/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('public/assets/js/echo.min.js')}}"></script>
    <script src="{{asset('public/assets/js/jquery.easing-1.3.min.js')}}"></script>
    <script src="{{asset('public/assets/js/bootstrap-slider.min.js')}}"></script>
    <!-- <script src="{{asset('public/assets/js/jquery.rateit.min.js')}}"></script> -->
    <script src="{{asset('public/assets/js/lightbox.min.js')}}"></script>
    <script src="{{asset('public/assets/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('public/assets/js/wow.min.js')}}"></script>
    <script src="{{asset('public/assets/js/scripts.js')}}"></script>
    <script src="{{asset('public/admin/js/admin.js')}}"></script>
    <script src="{{asset('public/admin/js/app.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    
</body>
</html>