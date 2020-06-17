@extends('layouts.app')
@section('title', $title)
@section('content')

<div class="container">
    <div class="row single-product">
        @include('layouts._leftmenu')
        <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
        @include('layouts._slider')
            <div class="clearfix filters-container m-t-10">
				<div class="row">
					<div class="col col-sm-6 col-md-2">
						<div class="filter-tabs">
							<ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
								<li class="">
									<a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a>
								</li>
								<li class="active"><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a></li>
							</ul>
						</div><!-- /.filter-tabs -->
					</div><!-- /.col -->
					<div class="col col-sm-12 col-md-6">
					</div><!-- /.col -->
					<div class="col col-sm-6 col-md-4 text-right">
						<div class="pagination-container">
				<ul class="list-inline list-unstyled">
					<li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
					<li><a href="#">1</a></li>	
					<li class="active"><a href="#">2</a></li>	
					<li><a href="#">3</a></li>	
					<li><a href="#">4</a></li>	
					<li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
				</ul><!-- /.list-inline -->
			</div><!-- /.pagination-container -->		</div><!-- /.col -->
				</div><!-- /.row -->
			</div>





<div id="myTabContent" class="tab-content category-list">
						<div class="tab-pane" id="grid-container">
							<div class="category-product">
								<div class="row">									
										
		
@foreach($product_category as $item)	
		<div class="col-sm-6 col-md-4 wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
			<div class="products">
				
	<div class="product">		
		<div class="product-image">
			<div class="image">
				<a href="{{url('product-details/'.$item->id) }}"><img src="{{ asset('storage/app/products/'.$item->img_link) }}" alt=""></a>
			</div><!-- /.image -->			

			                    		   
		</div><!-- /.product-image -->
			
		
		<div class="product-info text-left">
			<h3 class="name"><a href="detail.html">{{$item->name}}</a></h3>
			<div class="rating rateit-small rateit"><button id="rateit-reset-3" data-role="none" class="rateit-reset" aria-label="reset rating" aria-controls="rateit-range-3" style="display: none;"></button><div id="rateit-range-3" class="rateit-range" tabindex="0" role="slider" aria-label="rating" aria-owns="rateit-reset-3" aria-valuemin="0" aria-valuemax="5" aria-valuenow="4" aria-readonly="true" style="width: 70px; height: 14px;"><div class="rateit-selected" style="height: 14px; width: 56px;"></div><div class="rateit-hover" style="height:14px"></div></div></div>
			<div class="description"></div>

			<div class="product-price">	
				@if(!empty($value->discount))
                    <span class="price">{{ number_format($item->discount)."₫" }}</span>
                    <span class="price-before-discount">{{ number_format($value->price)."₫" }}</span>
                @else
                    <span class="price">{{ number_format($item->price)."₫" }}</span>
                @endif
			</div><!-- /.product-price -->
			
		</div><!-- /.product-info -->
					<div class="cart clearfix animate-effect">
				<div class="action">
					<ul class="list-unstyled">
						<li class="add-cart-button btn-group">
							<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
								<i class="fa fa-shopping-cart"></i>													
							</button>
							<button class="btn btn-primary cart-btn" type="button">Add to cart</button>
													
						</li>
	                   
		                <li class="lnk wishlist">
							<a class="add-to-cart" href="detail.html" title="Wishlist">
								 <i class="icon fa fa-heart"></i>
							</a>
						</li>

						<li class="lnk">
							<a class="add-to-cart" href="detail.html" title="Compare">
							    <i class="fa fa-signal"></i>
							</a>
						</li>
					</ul>
				</div><!-- /.action -->
			</div><!-- /.cart -->
			</div><!-- /.product -->
      
			</div><!-- /.products -->
		</div><!-- /.item -->
@endforeach
	
										</div><!-- /.row -->
							</div><!-- /.category-product -->
						
						</div><!-- /.tab-pane -->
							
						<div class="tab-pane active" id="list-container">
							<div class="category-product">
@foreach($product_category as $item)							
									
		<div class="category-product-inner wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
			<div class="products">				
	            <div class="product-list product">
	<div class="row product-list-row">
		<div class="col col-sm-4 col-lg-4">
			<div class="product-image">
				<div class="image">
					<img src="{{ asset('storage/app/products/'.$item->img_link) }}" alt="Ảnh sản phẩm">
				</div>
			</div><!-- /.product-image -->
		</div><!-- /.col -->
		<div class="col col-sm-8 col-lg-8">
			<div class="product-info">
				<h3 class="name"><a href="{{url('product-details/'.$item->id) }}">{{$item->name}}</a></h3>
				<div class="rating rateit-small rateit"><button id="rateit-reset-14" data-role="none" class="rateit-reset" aria-label="reset rating" aria-controls="rateit-range-14" style="display: none;"></button><div id="rateit-range-14" class="rateit-range" tabindex="0" role="slider" aria-label="rating" aria-owns="rateit-reset-14" aria-valuemin="0" aria-valuemax="5" aria-valuenow="4" aria-readonly="true" style="width: 70px; height: 14px;"><div class="rateit-selected" style="height: 14px; width: 56px;"></div><div class="rateit-hover" style="height:14px"></div></div></div>
				<div class="product-price">	
					@if(!empty($value->discount))
                    <span class="price">{{ number_format($item->discount)."₫" }}</span>
                    <span class="price-before-discount">{{ number_format($value->price)."₫" }}</span>
                @else
                    <span class="price">{{ number_format($item->price)."₫" }}</span>
                @endif				
				</div><!-- /.product-price -->
				<div class="description m-t-10">{!! $item->detail!!}</div>
                				<div class="cart clearfix animate-effect">
					<div class="action">
						<ul class="list-unstyled">
							<li class="add-cart-button btn-group">
								<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
									<i class="fa fa-shopping-cart"></i>													
								</button>
								<button class="btn btn-primary cart-btn" type="button">Add to cart</button>
														
							</li>
		                   
			                <li class="lnk wishlist">
								<a class="add-to-cart" href="detail.html" title="Wishlist">
									 <i class="icon fa fa-heart"></i>
								</a>
							</li>

							<li class="lnk">
								<a class="add-to-cart" href="detail.html" title="Compare">
								    <i class="fa fa-signal"></i>
								</a>
							</li>
						</ul>
					</div><!-- /.action -->
				</div><!-- /.cart -->
								
			</div><!-- /.product-info -->	
		</div><!-- /.col -->
	</div><!-- /.product-list-row -->
	      </div><!-- /.product-list -->
			</div><!-- /.products -->
		</div><!-- /.category-product-inner -->
@endforeach
	
							</div><!-- /.category-product -->
						</div><!-- /.tab-pane #list-container -->
					</div>




					<div class="clearfix filters-container">
						
							<div class="text-right">
						         <div class="pagination-container">
	<ul class="list-inline list-unstyled">
		<li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
		<li><a href="#">1</a></li>	
		<li class="active"><a href="#">2</a></li>	
		<li><a href="#">3</a></li>	
		<li><a href="#">4</a></li>	
		<li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
	</ul><!-- /.list-inline -->
</div><!-- /.pagination-container -->						    </div><!-- /.text-right -->
						
					</div>
        
    </div>
    </div>
</div>

@stop