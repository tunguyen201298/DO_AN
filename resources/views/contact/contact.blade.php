@extends('layouts.app')
@section('title', $title)
@section('content')
<div class="contact-page">
		<div class="row">
			@include('layouts._breadcrumd')
				<div class="col-md-12 contact-map outer-bottom-vs">
					<iframe style="width:100%; height:350px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3833.721954611158!2d108.21025491415897!3d16.079911943424282!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31421847121c7071%3A0x913252a9ea2855e5!2zMzAgVGhhbmggVGjhu6d5LCBUaGFuaCBCw6xuaCwgSOG6o2kgQ2jDonUsIMSQw6AgTuG6tW5nIDU1MDAwMCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1590683843181!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				</div>
				<div class="col-md-9 contact-form">
	<div class="col-md-12 contact-title">
		<h4>Liên hệ với chúng tôi</h4>
	</div>
	<div class="col-md-4 ">
		<form class="register-form" role="form">
			<div class="form-group">
		    <label class="info-title" for="exampleInputName">Tên <span>*</span></label>
		    <input type="text" class="form-control unicase-form-control text-input" id="exampleInputName" placeholder="Tên">
		  </div>
		</form>
	</div>
	<div class="col-md-4">
		<form class="register-form" role="form">
			<div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Email<span>*</span></label>
		    <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Email">
		  </div>
		</form>
	</div>
	<div class="col-md-4">
		<form class="register-form" role="form">
			<div class="form-group">
		    <label class="info-title" for="exampleInputTitle">Tiêu đề <span>*</span></label>
		    <input type="text" class="form-control unicase-form-control text-input" id="exampleInputTitle" placeholder="tiêu đề">
		  </div>
		</form>
	</div>
	<div class="col-md-12">
		<form class="register-form" role="form">
			<div class="form-group">
		    <label class="info-title" for="exampleInputComments">Nội dung <span>*</span></label>
		    <textarea class="form-control unicase-form-control" id="exampleInputComments"></textarea>
		  </div>
		</form>
	</div>
	<div class="col-md-12 outer-bottom-small m-t-20">
		<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Send Message</button>
	</div>
</div>
<div class="col-md-3 contact-info">
	<div class="contact-title">
		<h4>Information</h4>
	</div>
	<div class="clearfix address">
		<span class="contact-i"><i class="fa fa-map-marker"></i></span>
		<span class="contact-span">30 Thanh Thủy, Hải Châu, Đà Nẵng</span>
	</div>
	<div class="clearfix phone-no">
		<span class="contact-i"><i class="fa fa-mobile"></i></span>
		<span class="contact-span">+(888) 123-4567<br>+(888) 456-7890</span>
	</div>
	<div class="clearfix email">
		<span class="contact-i"><i class="fa fa-envelope"></i></span>
		<span class="contact-span"><a href="#">tudtdt1998@gmail.com</a></span>
	</div>
</div>			</div><!-- /.contact-page -->
		</div>




@stop