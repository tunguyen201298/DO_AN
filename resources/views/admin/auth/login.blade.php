<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="{{asset('storage/app/logo/logodongphucandy.png')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/login/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ asset('public/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ asset('public/login/fonts/iconic/css/material-design-iconic-font.min.css') }}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ asset('public/login/vendor/animate/animate.css') }}">
<!--===============================================================================================-->  <link rel="stylesheet" type="text/css" href="{{ asset('public/login/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ asset('public/login/vendor/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ asset('public/login/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->  <link rel="stylesheet" type="text/css" href="{{ asset('public/login/vendor/daterangepicker/daterangepicker.css') }}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ asset('public/login/css/util.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/login/css/main.css') }}">
<!--===============================================================================================-->
</head>
<body>
    
    <div class="limiter">
        <div class="container-login100" style="background-image: url('{{ asset('public/login/images/bg-01.jpg') }}');">
            <div class="wrap-login100">
                <form action="{{ url('admin/check-login') }}" method="post" role="form" class="login100-form validate-form">
                    {{ csrf_field() }}
                    <span class="login100-form-logo">
                        <i class="zmdi zmdi-landscape"></i>
                    </span>

                    <span class="login100-form-title p-b-34 p-t-27">
                        Log in
                    </span>

                    <div class="wrap-input100 validate-input" data-validate = "Enter username">
                        <input class="input100" type="text" name="email" placeholder="Email" required>
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100" type="password" name="password" placeholder="Password" required>
                        <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    </div>

                    <div class="contact100-form-checkbox">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember">
                        <label class="label-checkbox100" for="ckb1">
                            Remember me
                        </label>
                    </div>
                    @if(session('messenger'))
                        {{ session('messenger') }}
                    @endif
                    <div class="container-login100-form-btn">
                         <button class="login100-form-btn">
                            Login
                        </button>
                    </div>

                    <div class="text-center p-t-30">
                        <a class="txt1" href="#">
                            Forgot Password?
                        </a>
                    </div>
                    <hr>
                    <div class="text-center p-t-40">
                        <a class="login100-form-btn" href="{{ url('admin/register')}}">Register</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    

    <div id="dropDownSelect1"></div>
    
<!--===============================================================================================-->
    <script src="{{ asset('public/login/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
    <script src="{{ asset('public/login/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
    <script src="{{ asset('public/login/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('public/login/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
    <script src="{{ asset('public/login/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
    <script src="{{ asset('public/login/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('public/login/vendor/daterangepicker/daterangepicker.jss') }}"></script>
<!--===============================================================================================-->
    <script src="{{ asset('public/login/vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
    <script src="{{ asset('public/login/js/main.js') }}"></script>

</body>
</html>