@extends('layouts.app')
@section('title', $title)
@section('content')
@include('layouts._breadcrumd')
<div class="container">
		<div class="my-wishlist-page">
			<div class="row">
				<div class="col-md-12 my-wishlist">
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th colspan="4" class="heading-title">My Wishlist</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="col-md-2"><img src="assets\images\products\p1.jpeg" alt="imga"></td>
					<td class="col-md-7">
						<div class="product-name"><a href="#">Floral Print Buttoned</a></div>
						<div class="rating rateit">
							<i class="fa fa-star rate"></i>
							<i class="fa fa-star rate"></i>
							<i class="fa fa-star rate"></i>
							<i class="fa fa-star rate"></i>
							<i class="fa fa-star non-rate"></i>
							<span class="review">( 06 Reviews )</span>
						<button id="rateit-reset-2" data-role="none" class="rateit-reset" aria-label="reset rating" aria-controls="rateit-range-2" style="display: none;"></button><div id="rateit-range-2" class="rateit-range" tabindex="0" role="slider" aria-label="rating" aria-owns="rateit-reset-2" aria-valuemin="0" aria-valuemax="5" aria-valuenow="4" aria-readonly="true" style="width: 70px; height: 14px;"><div class="rateit-selected" style="height: 14px; width: 56px;"></div><div class="rateit-hover" style="height:14px"></div></div></div>
						<div class="price">
							$400.00
							<span>$900.00</span>
						</div>
					</td>
					<td class="col-md-2">
						<a href="#" class="btn-upper btn btn-primary">Add to cart</a>
					</td>
					<td class="col-md-1 close-btn">
						<a href="#" class=""><i class="fa fa-times"></i></a>
					</td>
				</tr>
				<tr>
					<td class="col-md-2"><img src="assets\images\products\p2.jpeg" alt="phoro"></td>
					<td class="col-md-7">
						<div class="product-name"><a href="#">Floral Print Buttoned</a></div>
						<div class="rating rateit">
							<i class="fa fa-star rate"></i>
							<i class="fa fa-star rate"></i>
							<i class="fa fa-star rate"></i>
							<i class="fa fa-star rate"></i>
							<i class="fa fa-star non-rate"></i>
							<span class="review">( 06 Reviews )</span>
						<button id="rateit-reset-3" data-role="none" class="rateit-reset" aria-label="reset rating" aria-controls="rateit-range-3" style="display: none;"></button><div id="rateit-range-3" class="rateit-range" tabindex="0" role="slider" aria-label="rating" aria-owns="rateit-reset-3" aria-valuemin="0" aria-valuemax="5" aria-valuenow="4" aria-readonly="true" style="width: 70px; height: 14px;"><div class="rateit-selected" style="height: 14px; width: 56px;"></div><div class="rateit-hover" style="height:14px"></div></div></div>
						<div class="price">
							$450.00
							<span>$900.00</span>
						</div>
					</td>
					<td class="col-md-2">
						<a href="#" class="btn-upper btn btn-default">Add to cart</a>
					</td>
					<td class="col-md-1 close-btn">
						<a href="#" class=""><i class="fa fa-times"></i></a>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->

<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div>
@endsection