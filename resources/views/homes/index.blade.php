<!-- Stored in resources/views/child.blade.php -->
@extends('layouts.app')
@section('title', $title)
@section('content')
<div class="container">
    <div class="row ">
        @include('layouts._leftmenu')
        <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
            <!-- ========================================== SECTION – HERO ========================================= -->

            <div id="hero">
                <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                    @foreach($slide as $slides)
                    <div class="item" style="background-image: url({{ asset('storage/app/sliders/'.$slides->image) }});">
                        <div class="container-fluid">
                            <div class="caption bg-color vertical-center text-left">
                                <div class="slider-header fadeInDown-1">Top Brands</div>
                                <div class="big-text fadeInDown-1">
                                    {{ $slides->title }}
                                </div>
                                <div class="excerpt fadeInDown-2 hidden-xs">
                                    <span>{{ $slides->content }}</span>
                                </div>
                                <div class="button-holder fadeInDown-3">
                                    <a href="" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a>
                                </div>
                            </div><!-- /.caption -->
                        </div><!-- /.container-fluid -->
                    </div><!-- /.item -->
                    @endforeach
                    
                </div><!-- /.owl-carousel -->
            </div>
            <!-- ========================================= SECTION – HERO : END ========================================= -->	

            <!-- ============================================== INFO BOXES ============================================== -->
            <div class="info-boxes wow fadeInUp">
                <div class="info-boxes-inner">
                    <div class="row">
                        <div class="col-md-6 col-sm-4 col-lg-4">
                            <div class="info-box">
                                <div class="row">

                                    <div class="col-xs-12">
                                        <h4 class="info-box-heading green">money back</h4>
                                    </div>
                                </div>	
                                <h6 class="text">30 Days Money Back Guarantee</h6>
                            </div>
                        </div><!-- .col -->

                        <div class="hidden-md col-sm-4 col-lg-4">
                            <div class="info-box">
                                <div class="row">

                                    <div class="col-xs-12">
                                        <h4 class="info-box-heading green">free shipping</h4>
                                    </div>
                                </div>
                                <h6 class="text">Shipping on orders over $99</h6>	
                            </div>
                        </div><!-- .col -->

                        <div class="col-md-6 col-sm-4 col-lg-4">
                            <div class="info-box">
                                <div class="row">

                                    <div class="col-xs-12">
                                        <h4 class="info-box-heading green">Special Sale</h4>
                                    </div>
                                </div>
                                <h6 class="text">Extra $5 off on all items </h6>	
                            </div>
                        </div><!-- .col -->
                    </div><!-- /.row -->
                </div><!-- /.info-boxes-inner -->

            </div><!-- /.info-boxes -->
            <!-- ============================================== INFO BOXES : END ============================================== -->
            <!-- ============================================== SCROLL TABS ============================================== -->
            <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                <div class="more-info-tab clearfix ">
                    <h3 class="new-product-title pull-left">Sản phẩm mới</h3>
                    <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                        <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a></li>
                        <li><a data-transition-type="backSlide" href="#smartphone" data-toggle="tab">Clothing</a></li>
                        <li><a data-transition-type="backSlide" href="#laptop" data-toggle="tab">Electronics</a></li>
                        <li><a data-transition-type="backSlide" href="#apple" data-toggle="tab">Shoes</a></li>
                    </ul><!-- /.nav-tabs -->
                </div>
                
                <div class="tab-content outer-top-xs">
                    <div class="tab-pane in active" id="all">			
                        <div class="product-slider">
                            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                                
                                    @foreach($products as $value)
                                    <div class="item item-carousel">
                                        <div class="products">
                                            <div class="product">		
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="{{route('product-details',['id'=>$value->id]) }}">
                                                            <img src="{{ asset('storage/app/products/'.$value->img_link) }}" alt="Ảnh sản phẩm" style="width: 189px;height: 189px">
                                                        </a>
                                                    </div><!-- /.image -->			

                                                    <div class="tag new"><span>new</span></div>             

                                                       		   
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

                                        </div><!-- /.products -->
                                    </div><!-- /.item -->
                                    @endforeach
                               
                            </div><!-- /.home-owl-carousel -->
                        </div><!-- /.product-slider -->
                    </div><!-- /.tab-pane -->
                     
                    <div class="tab-pane" id="smartphone">
                        <div class="product-slider">
                            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">

                                <div class="item item-carousel">
                                    <div class="products">

                                        <div class="product">		
                                            <div class="product-image">
                                                <div class="image">
                                                    <a href="detail.html"><img src="public/assets\images\products\p5.jpeg" alt=""></a>
                                                </div><!-- /.image -->			

                                                <div class="tag sale"><span>sale</span></div>            		   
                                            </div><!-- /.product-image -->


                                            <div class="product-info text-left">
                                                <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="description"></div>

                                                <div class="product-price">	
                                                    <span class="price">
                                                        $450.99				</span>
                                                    <span class="price-before-discount">$ 800</span>

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
                                                                <i class="fa fa-signal" aria-hidden="true"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div><!-- /.action -->
                                            </div><!-- /.cart -->
                                        </div><!-- /.product -->

                                    </div><!-- /.products -->
                                </div><!-- /.item -->

                                <div class="item item-carousel">
                                    <div class="products">

                                        <div class="product">		
                                            <div class="product-image">
                                                <div class="image">
                                                    <a href="detail.html"><img src="public/assets\images\products\p6.jpeg" alt=""></a>
                                                </div><!-- /.image -->			

                                                <div class="tag new"><span>new</span></div>                        		   
                                            </div><!-- /.product-image -->


                                            <div class="product-info text-left">
                                                <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="description"></div>

                                                <div class="product-price">	
                                                    <span class="price">
                                                        $450.99				</span>
                                                    <span class="price-before-discount">$ 800</span>

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
                                                                <i class="fa fa-signal" aria-hidden="true"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div><!-- /.action -->
                                            </div><!-- /.cart -->
                                        </div><!-- /.product -->

                                    </div><!-- /.products -->
                                </div><!-- /.item -->

                                <div class="item item-carousel">
                                    <div class="products">

                                        <div class="product">		
                                            <div class="product-image">
                                                <div class="image">
                                                    <a href="detail.html"><img src="public/assets\images\products\p7.jpeg" alt=""></a>
                                                </div><!-- /.image -->			

                                                <div class="tag sale"><span>sale</span></div>            		   
                                            </div><!-- /.product-image -->


                                            <div class="product-info text-left">
                                                <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="description"></div>

                                                <div class="product-price">	
                                                    <span class="price">
                                                        $450.99				</span>
                                                    <span class="price-before-discount">$ 800</span>

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
                                                                <i class="fa fa-signal" aria-hidden="true"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div><!-- /.action -->
                                            </div><!-- /.cart -->
                                        </div><!-- /.product -->

                                    </div><!-- /.products -->
                                </div><!-- /.item -->

                                <div class="item item-carousel">
                                    <div class="products">

                                        <div class="product">		
                                            <div class="product-image">
                                                <div class="image">
                                                    <a href="detail.html"><img src="public/assets\images\products\p8.jpeg" alt=""></a>
                                                </div><!-- /.image -->			

                                                <div class="tag new"><span>new</span></div>                        		   
                                            </div><!-- /.product-image -->


                                            <div class="product-info text-left">
                                                <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="description"></div>

                                                <div class="product-price">	
                                                    <span class="price">
                                                        $450.99				</span>
                                                    <span class="price-before-discount">$ 800</span>

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
                                                                <i class="fa fa-signal" aria-hidden="true"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div><!-- /.action -->
                                            </div><!-- /.cart -->
                                        </div><!-- /.product -->

                                    </div><!-- /.products -->
                                </div><!-- /.item -->

                                <div class="item item-carousel">
                                    <div class="products">

                                        <div class="product">		
                                            <div class="product-image">
                                                <div class="image">
                                                    <a href="detail.html"><img src="public/assets\images\products\p9.jpeg" alt=""></a>
                                                </div><!-- /.image -->			

                                                <div class="tag hot"><span>hot</span></div>		   
                                            </div><!-- /.product-image -->


                                            <div class="product-info text-left">
                                                <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="description"></div>

                                                <div class="product-price">	
                                                    <span class="price">
                                                        $450.99				</span>
                                                    <span class="price-before-discount">$ 800</span>

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
                                                                <i class="fa fa-signal" aria-hidden="true"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div><!-- /.action -->
                                            </div><!-- /.cart -->
                                        </div><!-- /.product -->

                                    </div><!-- /.products -->
                                </div><!-- /.item -->

                                <div class="item item-carousel">
                                    <div class="products">

                                        <div class="product">		
                                            <div class="product-image">
                                                <div class="image">
                                                    <a href="detail.html"><img src="public/assets\images\products\p10.jpeg" alt=""></a>
                                                </div><!-- /.image -->			

                                                <div class="tag hot"><span>hot</span></div>		   
                                            </div><!-- /.product-image -->


                                            <div class="product-info text-left">
                                                <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="description"></div>

                                                <div class="product-price">	
                                                    <span class="price">
                                                        $450.99				</span>
                                                    <span class="price-before-discount">$ 800</span>

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
                                                                <i class="fa fa-signal" aria-hidden="true"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div><!-- /.action -->
                                            </div><!-- /.cart -->
                                        </div><!-- /.product -->

                                    </div><!-- /.products -->
                                </div><!-- /.item -->
                            </div><!-- /.home-owl-carousel -->
                        </div><!-- /.product-slider -->
                    </div><!-- /.tab-pane -->

                    <div class="tab-pane" id="laptop">
                        <div class="product-slider">
                            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">

                                <div class="item item-carousel">
                                    <div class="products">

                                        <div class="product">		
                                            <div class="product-image">
                                                <div class="image">
                                                    <a href="detail.html"><img src="public/assets\images\products\p11.jpeg" alt=""></a>
                                                </div><!-- /.image -->			

                                                <div class="tag new"><span>new</span></div>                        		   
                                            </div><!-- /.product-image -->


                                            <div class="product-info text-left">
                                                <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="description"></div>

                                                <div class="product-price">	
                                                    <span class="price">
                                                        $450.99				</span>
                                                    <span class="price-before-discount">$ 800</span>

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
                                                                <i class="fa fa-signal" aria-hidden="true"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div><!-- /.action -->
                                            </div><!-- /.cart -->
                                        </div><!-- /.product -->

                                    </div><!-- /.products -->
                                </div><!-- /.item -->

                                <div class="item item-carousel">
                                    <div class="products">

                                        <div class="product">		
                                            <div class="product-image">
                                                <div class="image">
                                                    <a href="detail.html"><img src="public/assets\images\products\p12.jpeg" alt=""></a>
                                                </div><!-- /.image -->			

                                                <div class="tag new"><span>new</span></div>                        		   
                                            </div><!-- /.product-image -->


                                            <div class="product-info text-left">
                                                <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="description"></div>

                                                <div class="product-price">	
                                                    <span class="price">
                                                        $450.99				</span>
                                                    <span class="price-before-discount">$ 800</span>

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
                                                                <i class="fa fa-signal" aria-hidden="true"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div><!-- /.action -->
                                            </div><!-- /.cart -->
                                        </div><!-- /.product -->

                                    </div><!-- /.products -->
                                </div><!-- /.item -->

                                <div class="item item-carousel">
                                    <div class="products">

                                        <div class="product">		
                                            <div class="product-image">
                                                <div class="image">
                                                    <a href="detail.html"><img src="public/assets\images\products\p13.jpeg" alt=""></a>
                                                </div><!-- /.image -->			

                                                <div class="tag sale"><span>sale</span></div>            		   
                                            </div><!-- /.product-image -->


                                            <div class="product-info text-left">
                                                <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="description"></div>

                                                <div class="product-price">	
                                                    <span class="price">
                                                        $450.99				</span>
                                                    <span class="price-before-discount">$ 800</span>

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
                                                                <i class="fa fa-signal" aria-hidden="true"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div><!-- /.action -->
                                            </div><!-- /.cart -->
                                        </div><!-- /.product -->

                                    </div><!-- /.products -->
                                </div><!-- /.item -->

                                <div class="item item-carousel">
                                    <div class="products">

                                        <div class="product">		
                                            <div class="product-image">
                                                <div class="image">
                                                    <a href="detail.html"><img src="public/assets\images\products\p14.jpeg" alt=""></a>
                                                </div><!-- /.image -->			

                                                <div class="tag hot"><span>hot</span></div>		   
                                            </div><!-- /.product-image -->


                                            <div class="product-info text-left">
                                                <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="description"></div>

                                                <div class="product-price">	
                                                    <span class="price">
                                                        $450.99				</span>
                                                    <span class="price-before-discount">$ 800</span>

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
                                                                <i class="fa fa-signal" aria-hidden="true"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div><!-- /.action -->
                                            </div><!-- /.cart -->
                                        </div><!-- /.product -->

                                    </div><!-- /.products -->
                                </div><!-- /.item -->

                                <div class="item item-carousel">
                                    <div class="products">

                                        <div class="product">		
                                            <div class="product-image">
                                                <div class="image">
                                                    <a href="detail.html"><img src="public/assets\images\products\p15.jpeg" alt=""></a>
                                                </div><!-- /.image -->			

                                                <div class="tag hot"><span>hot</span></div>		   
                                            </div><!-- /.product-image -->


                                            <div class="product-info text-left">
                                                <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="description"></div>

                                                <div class="product-price">	
                                                    <span class="price">
                                                        $450.99				</span>
                                                    <span class="price-before-discount">$ 800</span>

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
                                                                <i class="fa fa-signal" aria-hidden="true"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div><!-- /.action -->
                                            </div><!-- /.cart -->
                                        </div><!-- /.product -->

                                    </div><!-- /.products -->
                                </div><!-- /.item -->

                                <div class="item item-carousel">
                                    <div class="products">

                                        <div class="product">		
                                            <div class="product-image">
                                                <div class="image">
                                                    <a href="detail.html"><img src="public/assets\images\products\p16.jpeg" alt=""></a>
                                                </div><!-- /.image -->			

                                                <div class="tag sale"><span>sale</span></div>            		   
                                            </div><!-- /.product-image -->


                                            <div class="product-info text-left">
                                                <h3 class="name"><a href="detail.html">Apple Iphone 5s 32GB</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="description"></div>

                                                <div class="product-price">	
                                                    <span class="price">
                                                        $450.99				</span>
                                                    <span class="price-before-discount">$ 800</span>

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
                                                                <i class="fa fa-signal" aria-hidden="true"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div><!-- /.action -->
                                            </div><!-- /.cart -->
                                        </div><!-- /.product -->

                                    </div><!-- /.products -->
                                </div><!-- /.item -->
                            </div><!-- /.home-owl-carousel -->
                        </div><!-- /.product-slider -->
                    </div><!-- /.tab-pane -->

                    <div class="tab-pane" id="apple">
                        <div class="product-slider">
                            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">

                                <div class="item item-carousel">
                                    <div class="products">

                                        <div class="product">		
                                            <div class="product-image">
                                                <div class="image">
                                                    <a href="detail.html"><img src="public/assets\images\products\p18.jpeg" alt=""></a>
                                                </div><!-- /.image -->			

                                                <div class="tag sale"><span>sale</span></div>            		   
                                            </div><!-- /.product-image -->


                                            <div class="product-info text-left">
                                                <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="description"></div>

                                                <div class="product-price">	
                                                    <span class="price">
                                                        $450.99				</span>
                                                    <span class="price-before-discount">$ 800</span>

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
                                                                <i class="fa fa-signal" aria-hidden="true"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div><!-- /.action -->
                                            </div><!-- /.cart -->
                                        </div><!-- /.product -->

                                    </div><!-- /.products -->
                                </div><!-- /.item -->

                                <div class="item item-carousel">
                                    <div class="products">

                                        <div class="product">		
                                            <div class="product-image">
                                                <div class="image">
                                                    <a href="detail.html"><img src="public/assets\images\products\p18.jpeg" alt=""></a>
                                                </div><!-- /.image -->			

                                                <div class="tag hot"><span>hot</span></div>		   
                                            </div><!-- /.product-image -->


                                            <div class="product-info text-left">
                                                <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="description"></div>

                                                <div class="product-price">	
                                                    <span class="price">
                                                        $450.99				</span>
                                                    <span class="price-before-discount">$ 800</span>

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
                                                                <i class="fa fa-signal" aria-hidden="true"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div><!-- /.action -->
                                            </div><!-- /.cart -->
                                        </div><!-- /.product -->

                                    </div><!-- /.products -->
                                </div><!-- /.item -->

                                <div class="item item-carousel">
                                    <div class="products">

                                        <div class="product">		
                                            <div class="product-image">
                                                <div class="image">
                                                    <a href="detail.html"><img src="public/assets\images\products\p17.jpeg" alt=""></a>
                                                </div><!-- /.image -->			

                                                <div class="tag sale"><span>sale</span></div>            		   
                                            </div><!-- /.product-image -->


                                            <div class="product-info text-left">
                                                <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="description"></div>

                                                <div class="product-price">	
                                                    <span class="price">
                                                        $450.99				</span>
                                                    <span class="price-before-discount">$ 800</span>

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
                                                                <i class="fa fa-signal" aria-hidden="true"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div><!-- /.action -->
                                            </div><!-- /.cart -->
                                        </div><!-- /.product -->

                                    </div><!-- /.products -->
                                </div><!-- /.item -->

                                <div class="item item-carousel">
                                    <div class="products">

                                        <div class="product">		
                                            <div class="product-image">
                                                <div class="image">
                                                    <a href="detail.html"><img src="public/assets\images\products\p16.jpeg" alt=""></a>
                                                </div><!-- /.image -->			

                                                <div class="tag new"><span>new</span></div>                        		   
                                            </div><!-- /.product-image -->


                                            <div class="product-info text-left">
                                                <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="description"></div>

                                                <div class="product-price">	
                                                    <span class="price">
                                                        $450.99				</span>
                                                    <span class="price-before-discount">$ 800</span>

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
                                                                <i class="fa fa-signal" aria-hidden="true"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div><!-- /.action -->
                                            </div><!-- /.cart -->
                                        </div><!-- /.product -->

                                    </div><!-- /.products -->
                                </div><!-- /.item -->

                                <div class="item item-carousel">
                                    <div class="products">

                                        <div class="product">		
                                            <div class="product-image">
                                                <div class="image">
                                                    <a href="detail.html"><img src="public/assets\images\products\p13.jpeg" alt=""></a>
                                                </div><!-- /.image -->			

                                                <div class="tag new"><span>new</span></div>                        		   
                                            </div><!-- /.product-image -->


                                            <div class="product-info text-left">
                                                <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="description"></div>

                                                <div class="product-price">	
                                                    <span class="price">
                                                        $450.99				</span>
                                                    <span class="price-before-discount">$ 800</span>

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
                                                                <i class="fa fa-signal" aria-hidden="true"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div><!-- /.action -->
                                            </div><!-- /.cart -->
                                        </div><!-- /.product -->

                                    </div><!-- /.products -->
                                </div><!-- /.item -->

                                <div class="item item-carousel">
                                    <div class="products">

                                        <div class="product">		
                                            <div class="product-image">
                                                <div class="image">
                                                    <a href="detail.html"><img src="public/assets\images\products\p14.jpeg" alt=""></a>
                                                </div><!-- /.image -->			

                                                <div class="tag hot"><span>hot</span></div>		   
                                            </div><!-- /.product-image -->


                                            <div class="product-info text-left">
                                                <h3 class="name"><a href="detail.html">Samsung Galaxy S4</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="description"></div>

                                                <div class="product-price">	
                                                    <span class="price">
                                                        $450.99				</span>
                                                    <span class="price-before-discount">$ 800</span>

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
                                                                <i class="fa fa-signal" aria-hidden="true"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div><!-- /.action -->
                                            </div><!-- /.cart -->
                                        </div><!-- /.product -->

                                    </div><!-- /.products -->
                                </div><!-- /.item -->
                            </div><!-- /.home-owl-carousel -->
                        </div><!-- /.product-slider -->
                    </div><!-- /.tab-pane -->

                </div><!-- /.tab-content -->
            </div><!-- /.scroll-tabs -->
            <!-- ============================================== SCROLL TABS : END ============================================== -->
            <!-- ============================================== WIDE PRODUCTS ============================================== -->
            <div class="wide-banners wow fadeInUp outer-bottom-xs">
                <div class="row">
                    <div class="col-md-7 col-sm-7">
                        <div class="wide-banner cnt-strip">
                            <div class="image">
                                <img class="img-responsive" src="public/assets\images\banners\home-banner1.jpeg" alt="">
                            </div>

                        </div><!-- /.wide-banner -->
                    </div><!-- /.col -->
                    <div class="col-md-5 col-sm-5">
                        <div class="wide-banner cnt-strip">
                            <div class="image">
                                <img class="img-responsive" src="public/assets\images\banners\home-banner2.jpeg" alt="">
                            </div>

                        </div><!-- /.wide-banner -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.wide-banners -->

            <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
            <!-- ============================================== FEATURED PRODUCTS ============================================== -->
            <section class="section featured-product wow fadeInUp">
                <h3 class="section-title">Featured products</h3>
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

                    <div class="item item-carousel">
                        <div class="products">

                            <div class="product">		
                                <div class="product-image">
                                    <div class="image">
                                        <a href="detail.html"><img src="public/assets\images\products\p5.jpeg" alt=""></a>
                                    </div><!-- /.image -->			

                                    <div class="tag hot"><span>hot</span></div>		   
                                </div><!-- /.product-image -->


                                <div class="product-info text-left">
                                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="description"></div>

                                    <div class="product-price">	
                                        <span class="price">
                                            $450.99				</span>
                                        <span class="price-before-discount">$ 800</span>

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
                                                    <i class="fa fa-signal" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!-- /.action -->
                                </div><!-- /.cart -->
                            </div><!-- /.product -->

                        </div><!-- /.products -->
                    </div><!-- /.item -->

                    <div class="item item-carousel">
                        <div class="products">

                            <div class="product">		
                                <div class="product-image">
                                    <div class="image">
                                        <a href="detail.html"><img src="public/assets\images\products\p6.jpeg" alt=""></a>
                                    </div><!-- /.image -->			

                                    <div class="tag new"><span>new</span></div>                        		   
                                </div><!-- /.product-image -->


                                <div class="product-info text-left">
                                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="description"></div>

                                    <div class="product-price">	
                                        <span class="price">
                                            $450.99				</span>
                                        <span class="price-before-discount">$ 800</span>

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
                                                    <i class="fa fa-signal" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!-- /.action -->
                                </div><!-- /.cart -->
                            </div><!-- /.product -->

                        </div><!-- /.products -->
                    </div><!-- /.item -->

                    <div class="item item-carousel">
                        <div class="products">

                            <div class="product">		
                                <div class="product-image">
                                    <div class="image">
                                        <a href="detail.html"><img src="public/assets\images\blank.gif" data-echo="public/assets/images/products/p7.jpg" alt=""></a>
                                    </div><!-- /.image -->			

                                    <div class="tag sale"><span>sale</span></div>            		   
                                </div><!-- /.product-image -->


                                <div class="product-info text-left">
                                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="description"></div>

                                    <div class="product-price">	
                                        <span class="price">
                                            $450.99				</span>
                                        <span class="price-before-discount">$ 800</span>

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
                                                    <i class="fa fa-signal" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!-- /.action -->
                                </div><!-- /.cart -->
                            </div><!-- /.product -->

                        </div><!-- /.products -->
                    </div><!-- /.item -->

                    <div class="item item-carousel">
                        <div class="products">

                            <div class="product">		
                                <div class="product-image">
                                    <div class="image">
                                        <a href="detail.html"><img src="public/assets\images\products\p8.jpeg" alt=""></a>
                                    </div><!-- /.image -->			

                                    <div class="tag hot"><span>hot</span></div>		   
                                </div><!-- /.product-image -->


                                <div class="product-info text-left">
                                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="description"></div>

                                    <div class="product-price">	
                                        <span class="price">
                                            $450.99				</span>
                                        <span class="price-before-discount">$ 800</span>

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
                                                    <i class="fa fa-signal" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!-- /.action -->
                                </div><!-- /.cart -->
                            </div><!-- /.product -->

                        </div><!-- /.products -->
                    </div><!-- /.item -->

                    <div class="item item-carousel">
                        <div class="products">

                            <div class="product">		
                                <div class="product-image">
                                    <div class="image">
                                        <a href="detail.html"><img src="public/assets\images\products\p9.jpeg" alt=""></a>
                                    </div><!-- /.image -->			

                                    <div class="tag new"><span>new</span></div>                        		   
                                </div><!-- /.product-image -->


                                <div class="product-info text-left">
                                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="description"></div>

                                    <div class="product-price">	
                                        <span class="price">
                                            $450.99				</span>
                                        <span class="price-before-discount">$ 800</span>

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
                                                    <i class="fa fa-signal" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!-- /.action -->
                                </div><!-- /.cart -->
                            </div><!-- /.product -->

                        </div><!-- /.products -->
                    </div><!-- /.item -->

                    <div class="item item-carousel">
                        <div class="products">

                            <div class="product">		
                                <div class="product-image">
                                    <div class="image">
                                        <a href="detail.html"><img src="public/assets\images\products\p10.jpeg" alt=""></a>
                                    </div><!-- /.image -->			

                                    <div class="tag sale"><span>sale</span></div>            		   
                                </div><!-- /.product-image -->


                                <div class="product-info text-left">
                                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="description"></div>

                                    <div class="product-price">	
                                        <span class="price">
                                            $450.99				</span>
                                        <span class="price-before-discount">$ 800</span>

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
                                                    <i class="fa fa-signal" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!-- /.action -->
                                </div><!-- /.cart -->
                            </div><!-- /.product -->

                        </div><!-- /.products -->
                    </div><!-- /.item -->
                </div><!-- /.home-owl-carousel -->
            </section><!-- /.section -->
            <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
            <!-- ============================================== WIDE PRODUCTS ============================================== -->
            <div class="wide-banners wow fadeInUp outer-bottom-xs">
                <div class="row">

                    <div class="col-md-12">
                        <div class="wide-banner cnt-strip">
                            <div class="image">
                                <img class="img-responsive" src="public/assets\images\banners\home-banner.jpeg" alt="">
                            </div>	
                            <div class="strip strip-text">
                                <div class="strip-inner">
                                    <h2 class="text-right">New Mens Fashion<br>
                                        <span class="shopping-needs">Save up to 40% off</span></h2>
                                </div>	
                            </div>
                            <div class="new-label">
                                <div class="text">NEW</div>
                            </div><!-- /.new-label -->
                        </div><!-- /.wide-banner -->
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.wide-banners -->
            <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
            <!-- ============================================== BEST SELLER ============================================== -->

            <div class="best-deal wow fadeInUp outer-bottom-xs">
                <h3 class="section-title">Best seller</h3>
                <div class="sidebar-widget-body outer-top-xs">
                    <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
                        <div class="item">
                            <div class="products best-product">
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="#">
                                                            <img src="public/assets\images\products\p20.jpeg" alt="">
                                                        </a>					
                                                    </div><!-- /.image -->



                                                </div><!-- /.product-image -->
                                            </div><!-- /.col -->
                                            <div class="col2 col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price">	
                                                        <span class="price">
                                                            $450.99				</span>

                                                    </div><!-- /.product-price -->

                                                </div>
                                            </div><!-- /.col -->
                                        </div><!-- /.product-micro-row -->
                                    </div><!-- /.product-micro -->

                                </div>
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="#">
                                                            <img src="public/assets\images\products\p21.jpeg" alt="">
                                                        </a>					
                                                    </div><!-- /.image -->


                                                </div><!-- /.product-image -->
                                            </div><!-- /.col -->
                                            <div class="col2 col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price">	
                                                        <span class="price">
                                                            $450.99				</span>

                                                    </div><!-- /.product-price -->

                                                </div>
                                            </div><!-- /.col -->
                                        </div><!-- /.product-micro-row -->
                                    </div><!-- /.product-micro -->

                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="products best-product">
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="#">
                                                            <img src="public/assets\images\products\p22.jpeg" alt="">
                                                        </a>					
                                                    </div><!-- /.image -->


                                                </div><!-- /.product-image -->
                                            </div><!-- /.col -->
                                            <div class="col2 col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price">	
                                                        <span class="price">
                                                            $450.99				</span>

                                                    </div><!-- /.product-price -->

                                                </div>
                                            </div><!-- /.col -->
                                        </div><!-- /.product-micro-row -->
                                    </div><!-- /.product-micro -->

                                </div>
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="#">
                                                            <img src="public/assets\images\products\p23.jpeg" alt="">
                                                        </a>					
                                                    </div><!-- /.image -->



                                                </div><!-- /.product-image -->
                                            </div><!-- /.col -->
                                            <div class="col2 col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price">	
                                                        <span class="price">
                                                            $450.99				</span>

                                                    </div><!-- /.product-price -->

                                                </div>
                                            </div><!-- /.col -->
                                        </div><!-- /.product-micro-row -->
                                    </div><!-- /.product-micro -->

                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="products best-product">
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="#">
                                                            <img src="public/assets\images\products\p24.jpeg" alt="">
                                                        </a>					
                                                    </div><!-- /.image -->



                                                </div><!-- /.product-image -->
                                            </div><!-- /.col -->
                                            <div class="col2 col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price">	
                                                        <span class="price">
                                                            $450.99				</span>

                                                    </div><!-- /.product-price -->

                                                </div>
                                            </div><!-- /.col -->
                                        </div><!-- /.product-micro-row -->
                                    </div><!-- /.product-micro -->

                                </div>
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="#">
                                                            <img src="public/assets\images\products\p25.jpeg" alt="">
                                                        </a>					
                                                    </div><!-- /.image -->


                                                </div><!-- /.product-image -->
                                            </div><!-- /.col -->
                                            <div class="col2 col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price">	
                                                        <span class="price">
                                                            $450.99				</span>

                                                    </div><!-- /.product-price -->

                                                </div>
                                            </div><!-- /.col -->
                                        </div><!-- /.product-micro-row -->
                                    </div><!-- /.product-micro -->

                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="products best-product">
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="#">
                                                            <img src="public/assets\images\products\p26.jpeg" alt="">
                                                        </a>					
                                                    </div><!-- /.image -->



                                                </div><!-- /.product-image -->
                                            </div><!-- /.col -->
                                            <div class="col2 col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price">	
                                                        <span class="price">
                                                            $450.99				</span>

                                                    </div><!-- /.product-price -->

                                                </div>
                                            </div><!-- /.col -->
                                        </div><!-- /.product-micro-row -->
                                    </div><!-- /.product-micro -->

                                </div>
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="#">
                                                            <img src="public/assets\images\products\p27.jpeg" alt="">
                                                        </a>					
                                                    </div><!-- /.image -->


                                                </div><!-- /.product-image -->
                                            </div><!-- /.col -->
                                            <div class="col2 col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price">	
                                                        <span class="price">
                                                            $450.99				</span>

                                                    </div><!-- /.product-price -->

                                                </div>
                                            </div><!-- /.col -->
                                        </div><!-- /.product-micro-row -->
                                    </div><!-- /.product-micro -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.sidebar-widget-body -->
            </div><!-- /.sidebar-widget -->
            <!-- ============================================== BEST SELLER : END ============================================== -->	

            <!-- ============================================== BLOG SLIDER ============================================== -->
            <section class="section latest-blog outer-bottom-vs wow fadeInUp">
                <h3 class="section-title">latest form blog</h3>
                <div class="blog-slider-container outer-top-xs">
                    <div class="owl-carousel blog-slider custom-carousel">

                        <div class="item">
                            <div class="blog-post">
                                <div class="blog-post-image">
                                    <div class="image">
                                        <a href="blog.html"><img src="public/assets\images\blog-post\post1.jpeg" alt=""></a>
                                    </div>
                                </div><!-- /.blog-post-image -->


                                <div class="blog-post-info text-left">
                                    <h3 class="name"><a href="#">Voluptatem accusantium doloremque laudantium</a></h3>	
                                    <span class="info">By Jone Doe &nbsp;|&nbsp; 21 March 2016 </span>
                                    <p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                                    <a href="#" class="lnk btn btn-primary">Read more</a>
                                </div><!-- /.blog-post-info -->


                            </div><!-- /.blog-post -->
                        </div><!-- /.item -->


                        <div class="item">
                            <div class="blog-post">
                                <div class="blog-post-image">
                                    <div class="image">
                                        <a href="blog.html"><img src="public/assets\images\blog-post\post2.jpeg" alt=""></a>
                                    </div>
                                </div><!-- /.blog-post-image -->


                                <div class="blog-post-info text-left">
                                    <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>	
                                    <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                                    <p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                                    <a href="#" class="lnk btn btn-primary">Read more</a>
                                </div><!-- /.blog-post-info -->


                            </div><!-- /.blog-post -->
                        </div><!-- /.item -->


                        <!-- /.item -->


                        <div class="item">
                            <div class="blog-post">
                                <div class="blog-post-image">
                                    <div class="image">
                                        <a href="blog.html"><img src="public/assets\images\blog-post\post1.jpeg" alt=""></a>
                                    </div>
                                </div><!-- /.blog-post-image -->


                                <div class="blog-post-info text-left">
                                    <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>	
                                    <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                                    <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                                    <a href="#" class="lnk btn btn-primary">Read more</a>
                                </div><!-- /.blog-post-info -->


                            </div><!-- /.blog-post -->
                        </div><!-- /.item -->


                        <div class="item">
                            <div class="blog-post">
                                <div class="blog-post-image">
                                    <div class="image">
                                        <a href="blog.html"><img src="public/assets\images\blog-post\post2.jpeg" alt=""></a>
                                    </div>
                                </div><!-- /.blog-post-image -->


                                <div class="blog-post-info text-left">
                                    <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>	
                                    <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                                    <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                                    <a href="#" class="lnk btn btn-primary">Read more</a>
                                </div><!-- /.blog-post-info -->


                            </div><!-- /.blog-post -->
                        </div><!-- /.item -->


                        <div class="item">
                            <div class="blog-post">
                                <div class="blog-post-image">
                                    <div class="image">
                                        <a href="blog.html"><img src="public/assets\images\blog-post\post1.jpeg" alt=""></a>
                                    </div>
                                </div><!-- /.blog-post-image -->


                                <div class="blog-post-info text-left">
                                    <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>	
                                    <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                                    <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                                    <a href="#" class="lnk btn btn-primary">Read more</a>
                                </div><!-- /.blog-post-info -->


                            </div><!-- /.blog-post -->
                        </div><!-- /.item -->


                    </div><!-- /.owl-carousel -->
                </div><!-- /.blog-slider-container -->
            </section><!-- /.section -->
            <!-- ============================================== BLOG SLIDER : END ============================================== -->	

            <!-- ============================================== FEATURED PRODUCTS ============================================== -->
            <section class="section wow fadeInUp new-arriavls">
                <h3 class="section-title">New Arrivals</h3>
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

                    <div class="item item-carousel">
                        <div class="products">

                            <div class="product">		
                                <div class="product-image">
                                    <div class="image">
                                        <a href="detail.html"><img src="public/assets\images\products\p19.jpeg" alt=""></a>
                                    </div><!-- /.image -->			

                                    <div class="tag new"><span>new</span></div>                        		   
                                </div><!-- /.product-image -->


                                <div class="product-info text-left">
                                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="description"></div>

                                    <div class="product-price">	
                                        <span class="price">
                                            $450.99				</span>
                                        <span class="price-before-discount">$ 800</span>

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
                                                    <i class="fa fa-signal" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!-- /.action -->
                                </div><!-- /.cart -->
                            </div><!-- /.product -->

                        </div><!-- /.products -->
                    </div><!-- /.item -->

                    <div class="item item-carousel">
                        <div class="products">

                            <div class="product">		
                                <div class="product-image">
                                    <div class="image">
                                        <a href="detail.html"><img src="public/assets\images\products\p28.jpeg" alt=""></a>
                                    </div><!-- /.image -->			

                                    <div class="tag new"><span>new</span></div>                        		   
                                </div><!-- /.product-image -->


                                <div class="product-info text-left">
                                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="description"></div>

                                    <div class="product-price">	
                                        <span class="price">
                                            $450.99				</span>
                                        <span class="price-before-discount">$ 800</span>

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
                                                    <i class="fa fa-signal" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!-- /.action -->
                                </div><!-- /.cart -->
                            </div><!-- /.product -->

                        </div><!-- /.products -->
                    </div><!-- /.item -->

                    <div class="item item-carousel">
                        <div class="products">

                            <div class="product">		
                                <div class="product-image">
                                    <div class="image">
                                        <a href="detail.html"><img src="public/assets\images\products\p30.jpeg" alt=""></a>
                                    </div><!-- /.image -->			

                                    <div class="tag hot"><span>hot</span></div>		   
                                </div><!-- /.product-image -->


                                <div class="product-info text-left">
                                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="description"></div>

                                    <div class="product-price">	
                                        <span class="price">
                                            $450.99				</span>
                                        <span class="price-before-discount">$ 800</span>

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
                                                    <i class="fa fa-signal" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!-- /.action -->
                                </div><!-- /.cart -->
                            </div><!-- /.product -->

                        </div><!-- /.products -->
                    </div><!-- /.item -->

                    <div class="item item-carousel">
                        <div class="products">

                            <div class="product">		
                                <div class="product-image">
                                    <div class="image">
                                        <a href="detail.html"><img src="public/assets\images\products\p1.jpeg" alt=""></a>
                                    </div><!-- /.image -->			

                                    <div class="tag hot"><span>hot</span></div>		   
                                </div><!-- /.product-image -->


                                <div class="product-info text-left">
                                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="description"></div>

                                    <div class="product-price">	
                                        <span class="price">
                                            $450.99				</span>
                                        <span class="price-before-discount">$ 800</span>

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
                                                    <i class="fa fa-signal" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!-- /.action -->
                                </div><!-- /.cart -->
                            </div><!-- /.product -->

                        </div><!-- /.products -->
                    </div><!-- /.item -->

                    <div class="item item-carousel">
                        <div class="products">

                            <div class="product">		
                                <div class="product-image">
                                    <div class="image">
                                        <a href="detail.html"><img src="public/assets\images\products\p2.jpeg" alt=""></a>
                                    </div><!-- /.image -->			

                                    <div class="tag sale"><span>sale</span></div>            		   
                                </div><!-- /.product-image -->


                                <div class="product-info text-left">
                                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="description"></div>

                                    <div class="product-price">	
                                        <span class="price">
                                            $450.99				</span>
                                        <span class="price-before-discount">$ 800</span>

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
                                                    <i class="fa fa-signal" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!-- /.action -->
                                </div><!-- /.cart -->
                            </div><!-- /.product -->

                        </div><!-- /.products -->
                    </div><!-- /.item -->

                    <div class="item item-carousel">
                        <div class="products">

                            <div class="product">		
                                <div class="product-image">
                                    <div class="image">
                                        <a href="detail.html"><img src="public/assets\images\products\p3.jpeg" alt=""></a>
                                    </div><!-- /.image -->			

                                    <div class="tag sale"><span>sale</span></div>            		   
                                </div><!-- /.product-image -->


                                <div class="product-info text-left">
                                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="description"></div>

                                    <div class="product-price">	
                                        <span class="price">
                                            $450.99				</span>
                                        <span class="price-before-discount">$ 800</span>

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
                                                    <i class="fa fa-signal" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!-- /.action -->
                                </div><!-- /.cart -->
                            </div><!-- /.product -->

                        </div><!-- /.products -->
                    </div><!-- /.item -->
                </div><!-- /.home-owl-carousel -->
            </section><!-- /.section -->
            <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->

        </div><!-- /.homebanner-holder -->
        <!-- ============================================== CONTENT : END ============================================== -->
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
                            console.log(response)
                            updateCartInfo("{{url('get-cart-info')}}")
                        } 
                    });
                }
    }

    //chạy dược rồi đúng ko dạ rồi sao cho hén lên trên kia
    //t/rên nào

    $(document).ready(function(){
       
    });
</script>
</script>
@endsection


