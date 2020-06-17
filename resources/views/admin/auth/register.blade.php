<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Register</title>

    <!-- Icons font CSS-->
    <link href="{{ asset('public/register/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('public/register/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{ asset('public/register/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('public/register/vendor/datepicker/daterangepicker.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('public/register/css/main.css') }}" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo" style="background-image: url('{{ asset('public/login/images/bg-01.jpg') }}');">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Đăng ký tài khoản</h2>
                    <form action="{{ url('admin/check-register') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <input class="input--style-1" type="email" placeholder="Email" name="email">
                        </div>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                {{ $errors->first('email') }}
                            </span>
                        @endif
                        @if (session('status'))
                            <span class="help-block">
                                {{session('status')}}
                            </span>
                        @endif
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Tên đăng nhập" name="username">
                        </div>
                        @if ($errors->has('username'))
                            <span class="help-block">
                                {{ $errors->first('username') }}
                            </span>
                        @endif
                        <div class="input-group">
                            <input class="input--style-1" type="password" placeholder="Mật khẩu" name="password">
                        </div>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                {{ $errors->first('password') }}
                            </span>
                        @endif
                        <div class="input-group">
                            <input class="input--style-1" type="password" placeholder="Nhập lại mật khẩu" name="cfpassword">
                        </div>
                        @if ($errors->has('cfpassword'))
                            <span class="help-block">
                               {{ $errors->first('cfpassword') }}
                            </span>
                        @endif
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Tên" name="name">
                        </div>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                {{ $errors->first('name') }}
                            </span>
                        @endif
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Địa chỉ" name="street">
                        </div>
                        @if ($errors->has('street'))
                                <span class="help-block">
                                    {{ $errors->first('street') }}
                                </span>
                            @endif
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1 js-datepicker" type="text" placeholder="Ngày sinh" name="birthdate">
                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                </div>
                            </div>
                            <!-- <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="gender">
                                            <option disabled="disabled" selected="selected">GENDER</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                            <option>Other</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="role">
                                    <option disabled="disabled" selected="selected">-- Chọn quyền truy cập --</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Nhân viên kho</option>
                                    <option value="3">Nhân viên kiểm duyệt</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="Số điện thoại" name="phone">
                                </div>
                            </div>
                        </div>
                        <div class="p-t-20">
                            
                            <a href="{{url('admin/login')}}" class="btn btn--radius btn--green" type="submit">Quay lại</a>
                            <button class="btn btn--radius btn--green" type="submit">Đăng ký</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="{{ asset('public/register/vendor/jquery/jquery.min.js') }}"></script>
    <!-- Vendor JS-->
    <script src="{{ asset('public/register/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('public/register/vendor/datepicker/moment.min.js') }}"></script>
    <script src="{{ asset('public/register/vendor/datepicker/daterangepicker.js') }}"></script>

    <!-- Main JS-->
    <script src="{{ asset('public/register/js/global.js') }}"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
