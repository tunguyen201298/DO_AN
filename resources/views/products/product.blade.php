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
									<a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>khối</a>
								</li>
								<li class="active"><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>Hàng</a></li>
							</ul>
						</div><!-- /.filter-tabs -->
					</div><!-- /.col -->
					<div class="col col-sm-12 col-md-6">
					</div><!-- /.col -->
					
				</div><!-- /.row -->
			</div>





<div id="myTabContent" class="tab-content category-list">
						<div class="tab-pane" id="grid-container">
							<div class="category-product">
								<div class="row">									
										
									 @if(!$products->isEmpty())
					                    @php
					                    $no = (($products->currentPage() - 1) * $products->perPage() + 1) 
					                    @endphp
										@foreach($products as $item)	
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
													<div class="rating rateit-small" data-rateit-value="{{$sum_start->startReview($item->id)}}"></div>

													<div class="product-price">	
														@if(!empty($item->discount))
										                    <span class="price">{{ number_format($item->discount)."₫" }}</span>
										                    <span class="price-before-discount">{{ number_format($item->price)."₫" }}</span>
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
										                   
											                <li class="lnk">
                                                        <a data-toggle="tooltip" class="add-to-cart" href="{{route('product-details',['id'=>$item->id]) }}" title="Xem chi tiết">
                                                            <i class="fa fa-signal" aria-hidden="true"></i>
                                                        </a>
                                                    </li>
														</ul>
													</div><!-- /.action -->
												</div><!-- /.cart -->
												</div><!-- /.product -->
									      
												</div><!-- /.products -->
											</div><!-- /.item -->
									@endforeach
									@else 
				                    <tr>
				                        <td colspan="6">{{trans('Không có dữ liệu')}}</td>
				                    </tr>
				                    @endif	
										</div><!-- /.row -->
							</div><!-- /.category-product -->
						
						</div><!-- /.tab-pane -->
							
						<div class="tab-pane active" id="list-container">
							<div class="category-product">
@foreach($products as $item)							
									
		<div class="category-product-inner wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
			<div class="products">				
	            <div class="product-list product">
	<div class="row product-list-row">
		<div class="col col-sm-4 col-lg-4">
			<div class="product-image">
				<div class="image">
					<a data-toggle="tooltip" class="add-to-cart" href="{{route('product-details',['id'=>$item->id]) }}" title="Xem chi tiết">
					<img src="{{ asset('storage/app/products/'.$item->img_link) }}" alt="Ảnh sản phẩm">
				</a>
				</div>
			</div><!-- /.product-image -->
		</div><!-- /.col -->
		<div class="col col-sm-8 col-lg-8">
			<div class="product-info">
				<h3 class="name"><a href="{{url('product-details/'.$item->id) }}">{{$item->name}}</a></h3>
				<div class="rating rateit-small" data-rateit-value="{{$sum_start->startReview($item->id)}}"></div>
				<div class="product-price">	
					@if(!empty($item->discount))
                    <span class="price">{{ number_format($item->discount)."₫" }}</span>
                    <span class="price-before-discount">{{ number_format($item->price)."₫" }}</span>
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
		                   
			                <li class="lnk">
                                                        <a data-toggle="tooltip" class="add-to-cart" href="{{route('product-details',['id'=>$item->id]) }}" title="Xem chi tiết">
                                                            <i class="fa fa-signal" aria-hidden="true"></i>
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
								{{$products->appends(Input::all())->render()}}
						         						    
							</div><!-- /.text-right -->
						
					</div>
        
    </div>
    </div>
</div>

@stop
@section('scripts')
<script type="text/javascript">
	function addTocart(id){
        var user = '{{ Auth::check()}}';
                if (!user){
                    Swal.fire('Xin mời đăng nhập')
                }else{
                    $.ajax({
                        url:"{{url('add-cart-ajax')}}",
                        data:{id: id},
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success:function(response){
                            
                            (async () => {
                                const Toast = Swal.mixin({
                                  toast: true,
                                  position: 'top-end',
                                  showConfirmButton: false,
                                  timer: 3000,
                                  timerProgressBar: true,
                                  onOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                  }
                                })

                                Toast.fire({
                                  icon: 'success',
                                  title: 'Thêm vào giỏ hàng thành công'
                                })
                            })()
                        } 
                    });
                }
    }
</script>
@stop