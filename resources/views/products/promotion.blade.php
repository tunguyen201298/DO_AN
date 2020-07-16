@extends('layouts.app')
@section('title', $title)
@section('content')
<div class="container">
    <div class="row ">
        @include('layouts._leftmenu')
        <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
            <!-- ========================================== SECTION – HERO ========================================= -->
@include('layouts._slider')
@foreach($promotions as $value)
<section class="section featured-product wow fadeInUp">
                <h3 class="section-title">{{$value->promotion_name}}</h3>
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                    @foreach($value->products as $value)
                    <div class="value value-carousel">
                        <div class="products">
                            <div class="product">		
                                <div class="product-image">
                                    <div class="image">
                                        <a href="{{route('product-details',['id'=>$value->id]) }}"><img src="{{asset('storage/app/products/'.$value->img_link)}}" alt="Hình ảnh sản phẩm"></a>
                                    </div><!-- /.image -->			

                                    <div class="tag hot"><span>sale</span></div>		   
                                </div><!-- /.product-image -->


                                <div class="product-info text-left">
                                    <h3 class="name"><a href="detail.html">{{$value->name}}</a></h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="description"></div>

                                    <div class="product-price">	
                                        <span class="price">{{ number_format($value->discount)."₫" }}</span>
                                        <span class="price-before-discount">{{ number_format($value->price)."₫" }}</span>
                                    </div><!-- /.product-price -->

                                </div><!-- /.product-info -->
                                <div class="cart clearfix animate-effect">
                                    <div class="action">
                                        <ul class="list-unstyled">
                                            <li class="add-cart-button btn-group">
                                                <a href="#" class="btn btn-primary icon" title="Add Cart" id="addCart{{$value->id}}" onclick="addTocart({{$value->id}})"> 
                                                    <i class="fa fa-shopping-cart"></i> 
                                                </a>

                                            </li>

                                            <li class="lnk wishlist">
                                                <a class="add-to-cart" href="detail.html" title="Wishlist">
                                                    <i class="icon fa fa-heart"></i>
                                                </a>
                                            </li>

                                            <li class="lnk">
                                                <a class="add-to-cart" href="detail.html" title="Compare">
                                                    <i class="fa fa-signal" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!-- /.action -->
                                </div><!-- /.cart -->
                            </div><!-- /.product -->

                        </div><!-- /.products -->
                    </div><!-- /.value -->
                    @endforeach
                </div><!-- /.home-owl-carousel -->
            </section><!-- /.section -->
		
@endforeach
</div>
    </div>
</div>
@stop