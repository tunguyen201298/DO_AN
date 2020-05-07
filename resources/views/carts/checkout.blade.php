@extends('layouts.app')
@section('title', $title)
@section('content')
<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">
				<div class="col-md-8">
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->
<div class="panel panel-default checkout-step-01">

	<!-- panel-heading -->
		<div class="panel-heading">
    	<h4 class="unicase-checkout-title">
	        <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
	          <span>1</span>Địa chỉ nhận hàng
	        </a>
	     </h4>
    </div>
    <!-- panel-heading -->

	<div id="collapseOne" class="panel-collapse collapse in" style="">

		<!-- panel-body  -->
	    <div class="panel-body">
			<div class="row">		

				<!-- guest-login -->			
				<div class="col-md-6 col-sm-6 guest-login">
					<tbody >
						<tr style="border-bottom: 2px solid #ddd;">{{ $user->name }}</tr>
						<tr>{{ $user->phone }}</tr>
						<tr>{{ $user->street }}</tr>
					</tbody>

					<!-- fsdfgujhnbmngbnvbnvbnvbnvbnvbncbnvbnvbdfhgfdsgfd -->
					<h4 class="checkout-subtitle">Bạn chưa có tài khoản?</h4>

					<!-- radio-form  -->
					<form class="register-form" role="form">
					    <div class="radio radio-checkout-unicase">  
					        <input id="guest" type="radio" name="text" value="guest" checked="">  
					        <label class="radio-button guest-check" for="guest">Thanh toán với tư cách là khách</label>  
					          <br>
					        <input id="register" type="radio" name="text" value="register">  
					        <label class="radio-button" for="register">Đăng ký</label>  
					    </div>  
					</form>
					<!-- radio-form  -->

					<h4 class="checkout-subtitle outer-top-vs">Register and save time</h4>
					<p class="text title-tag-line ">Đăng ký với chúng tôi để thuận tiện trong tương lai:</p>
					
					<ul class="text instruction inner-bottom-30">
						<li>- Dễ dàng truy cập vào lịch sử đặt hàng và trạng thái của bạn:</li>
					</ul>

					<button type="submit" class="btn-upper btn btn-primary checkout-page-button checkout-continue ">Tiếp Tục</button>
				</div>
				<!-- guest-login -->

				<!-- already-registered-login -->
				<div class="col-md-6 col-sm-6 already-registered-login">
					<h4 class="checkout-subtitle">Bạn đã đăng ký</h4>
					<p class="text title-tag-line">Vui lòng đăng nhập bên dưới:</p>
					<form class="register-form" role="form">
						<div class="form-group">
					    <label class="info-title" for="exampleInputEmail1">Địa chỉ Email <span>*</span></label>
					    <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="">
					  </div>
					  <div class="form-group">
					    <label class="info-title" for="exampleInputPassword1">Mật khẩu <span>*</span></label>
					    <input type="password" class="form-control unicase-form-control text-input" id="exampleInputPassword1" placeholder="">
					    <a href="#" class="forgot-password">Quên mật khẩu?</a>
					  </div>
					  <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Đăng nhập</button>
					</form>
				</div>	
				<!-- already-registered-login -->		

			</div>			
		</div>
		<!-- panel-body  -->

	</div><!-- row -->
</div>
<!-- checkout-step-01  -->
					  	
					</div><!-- /.checkout-steps -->
				</div>
				<div class="col-md-4">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">Đơn hàng của bạn</h4>
		    </div>
		     <div class="">
				<ul class="nav nav-checkout-progress list-unstyled">
					<li class="checkout-item1"><h5 class="unicase-checkout-title">SẢN PHẨM</h5></li>
					<li class="checkout-item2"><h5 class="unicase-checkout-title">THÀNH TIỀN</h5></li>
				</ul>	
			</div>
			<hr>
		    <div class="">
				<ul class="nav nav-checkout-progress list-unstyled">
					@foreach($cart as $item)
					<li ><p class="checkout-item3">{{ $item->name }}</p><p class="checkout-item3">{{ "x ".$item->qty}}</p><p class="checkout-item3">{{ "x ".$item->qty*$item->price}}</p></li>
					@endforeach
				</ul>		
			</div>
		</div>
	</div>
</div> 
<!-- checkout-progress-sidebar -->				</div>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
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
		    <div class="owl-controls clickable"><div class="owl-buttons"><div class="owl-prev"></div><div class="owl-next"></div></div></div></div><!-- /.owl-carousel #logo-slider -->
		</div><!-- /.logo-slider-inner -->
	
</div><!-- /.logo-slider -->
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div>
@stop