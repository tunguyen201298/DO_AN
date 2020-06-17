@extends('layouts.app')
@section('title', $title)
@section('content')
@include('layouts._breadcrumd')
<div class="track-order-page">
			<div class="row">
				<div class="col-md-12">
	<h2 class="heading-title">Tình trạng đơn hàng</h2>
	<span class="title-tag inner-top-ss">Vui lòng nhập mã đơn hàng của bạn vào ô bên dưới và nhấn Enter. Mã đươn hàng đã được gửi cho bạn trên email xác nhận. </span>
	<form class="register-form outer-top-xs" role="form" action="{{url('submit-track-order')}}" method="post">
		{{ csrf_field() }}
		<div class="form-group">
		    <label class="info-title" for="exampleOrderId1">Mã đơn hàng</label>
		    <input type="text" class="form-control unicase-form-control text-input" id="exampleOrderId1" name="bill_id">
		</div>
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Xem</button>

	</form>	
</div>			</div><!-- /.row -->
		</div>
@stop