@extends('layouts.app')
@section('content')
<style type="text/css">
	h5{
		text-align: left !important;
	}
</style>
<div class="terms-conditions-page">
<div class="x-page inner-bottom-sm">
	<div class="row">
		<div class="col-md-12 x-text text-center">
			<h3>Cảm ơn bạn. Đơn đặt hàng của bản đã được nhận.</h3>
			<div class="row" style="background: cornsilk;">
				<div class="col-lg-6">
					<h2 class="heading-title">Thông tin đơn hàng</h2>
					<h5 class="name">Mã đơn hàng :</h5>
					<h5 class="name">Ngày đặt :</h5>
					<h5 class="name">Tổng tiền :</h5>
					<h5 class="name">Phương thức thanh toán :</h5>
				</div>
				<div class="col-lg-6">
					<h2 class="heading-title">Thông tin người nhận</h2>
					<h5 class="name">Tên người nhận :</h5>
					<h5 class="name">Địa chỉ :</h5>
					<h5 class="name">Số điện thoại :</h5>
					<h5 class="name">Tình trạng đơn hàng :</h5>
				</div>
			</div>
		</div>
	</div><!-- /.row -->
	<div class="row">
		<h2 class="heading-title">Chi tiết hóa đơn</h2>
		<table class="table">
						<thead>
							<tr>
								<th scope="col">Sản phẩm</th>
								<th scope="col">Giá tiền</th>
								<th scope="col">Số lượng</th>
								<th scope="col">Thành tiền</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								
								<td>
									<p>
										
									</p>
								</td>
								<td>
									
								</td>
								<td>
									
								</td>
								<td>
									
								</td>
							</tr>
							
							<tr>
                                <td>
                                    <h5></h5>
                                </td>
                                <td>
                                    <h5></h5>
                                </td>
                                <td>
                                    <h4>Tổng tiền :</h4>
                                </td>
                                <td>
                                   
                                </td>
                            </tr>
							<tr>
								<td>
									<h4></h4>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<a href="" class="btn-upper btn btn-primary checkout-page-button" style="margin-left: 240px">Thanh toán</a>
								</td>
							</tr>
						</tbody>
					</table>
	</div>
</div>
</div>
@endsection