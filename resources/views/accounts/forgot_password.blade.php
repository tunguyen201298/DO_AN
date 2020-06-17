@extends('layouts.app')
@section('content')
<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active">QUÊN MẬT KHẨU</li>
    </ul>
	<div class="well well-small">
	<h3> QUÊN MẬT KHẨU</h3>	
	<hr class="soft"/>
	
	Vui lòng nhập địa chỉ e-mail được sử dụng để đăng ký. Chúng tôi sẽ gửi e-mail cho bạn mật khẩu mới của bạn.<br/><br/><br/>
	<div class="row">
		<div class="col-md-6 col-sm-6 sign-in">
			<div class="form-group">
				<form action="{{url('submit-forgot-password')}}" method="post">
					{{ csrf_field() }}
					@if(Session::has('check'))
					    <div class="alert alert-info">
					        {{ Session::get('check') }}
					    </div>
					@endif
					<label class="info-title" for="exampleInputEmail1">Nhập Email <span>*</span></label>
				    <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" name="email" >
				    <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Đăng nhập</button>
				</form>
			    
			</div>
		</div>
		</div>
	</div>
	
	
</div>
</div>
@stop