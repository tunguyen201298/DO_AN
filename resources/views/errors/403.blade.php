<!DOCTYPE html>
<html>
    <head>
        <title>Từ chối quyền truy cập</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
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

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato', sans-serif;
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 72px;
                margin-bottom: 40px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Bạn không có quyền truy cập khu vực này.</div>
                <a href="{{url('admin/')}}" class="btn btn-upper btn-primary pull-right outer-right-xs">Trở về trang chủ</a>
            </div>
        </div>
    </body>
</html>
