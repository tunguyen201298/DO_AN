@extends('layouts.app')
@section('title', $title)
@section('content')
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class="active">Đăng nhập</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div>
<div class="body-content">
	<div class="container">
		<div class="sign-in-page">
			<div class="row">
				<!-- Sign-in -->			
<div class="col-md-6 col-sm-6 sign-in">
	<h4 class="">Đăng nhập</h4>
	<div class="social-sign-in outer-top-xs">
		<a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
		<a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
	</div>
	<form action="{{ url('check-login') }}" method="post" class="register-form outer-top-xs" role="form">
		{{ csrf_field() }}
		@if(Session::has('message'))
		    <div class="alert alert-info">
		        {{ Session::get('message') }}
		    </div>
		@endif
		@if(Session::has('status'))
		    <div class="alert alert-info">
		        {{ Session::get('status') }}
		    </div>
		@endif
		@if(Session::has('newpass'))
		    <div class="alert alert-info">
		        {{ Session::get('newpass') }}
		    </div>
		@endif
		<div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Nhập Email <span>*</span></label>
		    <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" name="email">
		</div>
	  	<div class="form-group">
		    <label class="info-title" for="exampleInputPassword1">Mật khẩu <span>*</span></label>
		    <input type="password" class="form-control unicase-form-control text-input" id="exampleInputPassword1" name="Mật khẩu">
		</div>
		<div class="radio outer-xs">
		  	<label>
		    	<input type="checkbox" name="optionsRadios" id="optionsRadios2" value="option2" name="remember">
		    	Ghi nhớ đăng nhập!
		  	</label>
		  	<a href="{{url('forgot-password')}}" class="forgot-password pull-right">Quên mật khẩu?</a>
		</div>
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Đăng nhập</button>

	</form>					
</div>
<!-- Sign-in -->

<!-- create a new account -->
<div class="col-md-6 col-sm-6 create-new-account">
	<h4 class="checkout-subtitle">Tạo tài khoản mới</h4>
	<form action="{{ url('check-register') }}" method="post" class="register-form outer-top-xs" role="form">
		{{ csrf_field() }}
		<div class="form-group">
	    	<label class="info-title" for="exampleInputEmail2">Email <span>*</span></label>
	    	<input type="email" class="form-control unicase-form-control text-input"  name="email">
	    	@if ($errors->has('email'))
                <span class="help-block">
                    {{ $errors->first('email') }}
                </span>
            @endif
	  	</div>
        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Họ tên <span>*</span></label>
		    <input type="text" class="form-control unicase-form-control text-input"  name="name">
		    @if ($errors->has('name'))
                <span class="help-block">
                    {{ $errors->first('name') }}
                </span>
            @endif
		</div>
		
		<div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Địa chỉ <span>*</span></label>
		    <input type="text" class="form-control unicase-form-control text-input" name="street">
		    @if ($errors->has('street'))
                <span class="help-block">
                    {{ $errors->first('street') }}
                </span>
            @endif
		</div>
        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Số điện thoại <span>*</span></label>
		    <input type="text" class="form-control unicase-form-control text-input" name="phone">
		    @if ($errors->has('phone'))
                <span class="help-block">
                    {{ $errors->first('phone') }}
                </span>
            @endif
		</div>
        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Mật khẩu <span>*</span></label>
		    <input type="password" class="form-control unicase-form-control text-input" name="password">
		    @if ($errors->has('password'))
                <span class="help-block">
                    {{ $errors->first('password') }}
                </span>
            @endif
		</div>
         <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Nhập lại mật khẩu <span>*</span></label>
		    <input type="password" class="form-control unicase-form-control text-input" name="cfpassword">
		    @if ($errors->has('cfpassword'))
                <span class="help-block">
                    {{ $errors->first('cfpassword') }}
                </span>
            @endif
		</div>
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Đăng ký</button>
	</form>
	
	
</div>	
<!-- create a new account -->			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
<div id="brands-carousel" class="logo-slider wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">

		<div class="logo-slider-inner">	
			<div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme" style="opacity: 1; display: block;">
				<div class="owl-wrapper-outer"><div class="owl-wrapper" style="width: 3800px; left: 0px; display: block;"><div class="owl-item" style="width: 190px;"><div class="item m-t-15">
					<a href="#" class="image">
						<img src="assets/images/brands/brand1.png" alt="">
					</a>	
				</div></div><div class="owl-item" style="width: 190px;"><div class="item m-t-10">
					<a href="#" class="image">
						<img src="assets/images/brands/brand2.png" alt="">
					</a>	
				</div></div><div class="owl-item" style="width: 190px;"><div class="item">
					<a href="#" class="image">
						<img src="assets/images/brands/brand3.png" alt="">
					</a>	
				</div></div><div class="owl-item" style="width: 190px;"><div class="item">
					<a href="#" class="image">
						<img src="assets/images/brands/brand4.png" alt="">
					</a>	
				</div></div><div class="owl-item" style="width: 190px;"><div class="item">
					<a href="#" class="image">
						<img src="assets/images/brands/brand5.png" alt="">
					</a>	
				</div></div><div class="owl-item" style="width: 190px;"><div class="item">
					<a href="#" class="image">
						<img src="assets/images/brands/brand6.png" alt="">
					</a>	
				</div></div><div class="owl-item" style="width: 190px;"><div class="item">
					<a href="#" class="image">
						<img src="assets/images/brands/brand2.png" alt="">
					</a>	
				</div></div><div class="owl-item" style="width: 190px;"><div class="item">
					<a href="#" class="image">
						<img src="assets/images/brands/brand4.png" alt="">
					</a>	
				</div></div><div class="owl-item" style="width: 190px;"><div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand1.png" src="assets\images\blank.gif" alt="">
					</a>	
				</div></div><div class="owl-item" style="width: 190px;"><div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand5.png" src="assets\images\blank.gif" alt="">
					</a>	
				</div></div></div></div><!--/.item-->

				<!--/.item-->

				<!--/.item-->

				<!--/.item-->

				<!--/.item-->

				<!--/.item-->

				<!--/.item-->

				<!--/.item-->

				<!--/.item-->

				<!--/.item-->
		    <div class="owl-controls clickable"><div class="owl-buttons"><div class="owl-prev"></div><div class="owl-next"></div></div></div></div><!-- /.owl-carousel #logo-slider -->
		</div><!-- /.logo-slider-inner -->
	
</div><!-- /.logo-slider -->
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div>
@stop