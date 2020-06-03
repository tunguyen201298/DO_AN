@extends('layouts.app')
@section('title', $title)
@section('content')
<div class="container">
    <div class="row ">
        @include('layouts._leftmenu')
        <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
            <!-- ========================================== SECTION – HERO ========================================= -->

            <!-- ============================================== SCROLL TABS ============================================== -->
            <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                <div class="more-info-tab clearfix ">
                    <h3 class="new-product-title pull-left">Kết quả tìm kiếm</h3>
                    
                </div>





<div class="tab-content outer-top-xs">
<div class="tab-pane in active" id="all">			
    <div class="product-slider">
        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
            
                @foreach($search as $value)
                <div class="item item-carousel">
                    <div class="search">
                        <div class="product">		
                            <div class="product-image">
                                <div class="image">
                                    <a href="{{route('product-details',['id'=>$value->id]) }}">
                                        <img src="{{ asset('storage/app/products/'.$value->img_link) }}" alt="Ảnh sản phẩm" style="width: 189px;height: 189px">
                                    </a>
                                </div><!-- /.image -->			

                                             

                                   		   
                            </div><!-- /.product-image -->


                            <div class="product-info text-left">
                                <h3 class="name"><a href="detail.html">{{ $value->name }}</a></h3>
                                <div class="rating rateit-small"></div>
                                <div class="description"></div>

                                <div class="product-price">	
                                    @if(!empty($value->discount))
                                        <span class="price">{{ number_format($value->discount)."₫" }}</span>
                                        <span class="price-before-discount">{{ number_format($value->price)."₫" }}</span>
                                    @else
                                        <span class="price">{{ number_format($value->price)."₫" }}</span>
                                    @endif

                                </div><!-- /.product-price -->
                            </div><!-- /.product-info -->
                            <div class="cart clearfix animate-effect">
                                <div class="action">
                                    <ul class="list-unstyled">
                                        <input type="hidden" name="id" value="{{ $value->id }}" id="productId{{ $value->id }}">
                                        <li class="add-cart-button btn-group">
                                                
                                                <a href="#" class="btn btn-primary icon" title="Add Cart" id="addCart{{$value->id}}" onclick="addTocart({{$value->id}})"> 
                                                    <i class="fa fa-shopping-cart"></i>	
                                                </a>
                                        </li>

                                        <li class="lnk wishlist">
                                            <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Wishlist">
                                                <i class="icon fa fa-heart"></i>
                                            </a>
                                        </li>

                                        <li class="lnk">
                                            <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare">
                                                <i class="fa fa-signal" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div><!-- /.action -->
                            </div><!-- /.cart -->
                        </div><!-- /.product -->

                    </div><!-- /.search -->
                </div><!-- /.item -->
                @endforeach
           
        </div><!-- /.home-owl-carousel -->
    </div><!-- /.product-slider -->
</div><!-- /.tab-pane -->
</div>
</div>
</div>
</div>
</div>
@endsection