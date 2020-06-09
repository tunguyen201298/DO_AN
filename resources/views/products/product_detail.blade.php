@extends('layouts.app')
@section('title', $title)
@section('content')
<div class="container">
    <div class="row single-product">
        @include('layouts._leftmenu')
        <div class="col-md-9">
            <div class="detail-block">
                <div class="row  wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">

                    <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                        <div class="product-item-holder size-big single-product-gallery small-gallery">

                            <div id="owl-single-product" class="owl-carousel owl-theme" style="opacity: 1; display: block;">
                                <div class="owl-wrapper-outer">
                                    <div class="owl-wrapper" style="width: 5742px; left: 0px; display: block;">
                                        @foreach($product_img as $img)
                                        <div class="owl-item" style="width: 319px;">
                                            
                                            <div class="single-product-gallery-item" id="slide{{$no}}">
                                                <a data-lightbox="image-{{$no++}}" data-title="Gallery" href="{{ asset('storage/app/products/'.$img->link) }}">
                                                    <img class="img-responsive" alt="" src="{{ asset('storage/app/products/'.$img->link) }}">
                                                </a>
                                            </div>
                                        </div>

                                        @endforeach
                                    </div>
                                </div><!-- /.single-product-gallery-item -->

                                <div class="owl-controls clickable">
                                    <div class="owl-pagination">
                                        <div class="owl-page active">
                                            <span class=""></span>
                                        </div>
                                        <div class="owl-page">
                                            <span class=""></span>
                                        </div>
                                        <div class="owl-page">
                                            <span class=""></span>
                                        </div>
                                        <div class="owl-page">
                                            <span class=""></span>
                                        </div>
                                        <div class="owl-page">
                                            <span class=""></span>
                                        </div>
                                        <div class="owl-page">
                                            <span class=""></span>
                                        </div>
                                        <div class="owl-page">
                                            <span class=""></span>
                                        </div>
                                        <div class="owl-page">
                                            <span class=""></span>
                                        </div>
                                        <div class="owl-page">
                                            <span class=""></span>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.single-product-slider -->


                            <div class="single-product-gallery-thumbs gallery-thumbs">

                                <div id="owl-single-product-thumbnails" class="owl-carousel owl-theme" style="opacity: 1; display: block;">
                                    <div class="owl-wrapper-outer">
                                        <div class="owl-wrapper" style="width: 1440px; left: 0px; display: block;">
                                            <div class="owl-item" style="width: 80px;">
                                                @foreach($product_img as $img)
                                                <div class="item">
                                                    <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide1">
                                                        <img class="img-responsive" width="85" alt="" src="{{ asset('storage/app/products/'.$img->link) }}">
                                                    </a>
                                                </div>
                                                @endforeach
                                            </div>
                                            <div class="owl-item" style="width: 80px;">
                                            </div>
                                    
                                        </div>
                                        <div class="owl-controls clickable">
                                            <div class="owl-pagination">
                                                <div class="owl-page active">
                                                    <span class=""></span>
                                                </div>
                                                <div class="owl-page">
                                                    <span class=""></span>
                                                </div>
                                                <div class="owl-page">
                                                    <span class=""></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /#owl-single-product-thumbnails -->
                            </div><!-- /.gallery-thumbs -->

                        </div><!-- /.single-product-gallery -->
                    </div><!-- /.gallery-holder -->                 
                    <div class="col-sm-6 col-md-7 product-info-block">
                        <div class="product-info">
                            <h1 class="name">{{ $product_detail->name }}</h1>

                            <div class="rating-reviews m-t-20">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="rating rateit-small rateit"><button id="rateit-reset-5" data-role="none" class="rateit-reset" aria-label="reset rating" aria-controls="rateit-range-5" style="display: none;"></button><div id="rateit-range-5" class="rateit-range" tabindex="0" role="slider" aria-label="rating" aria-owns="rateit-reset-5" aria-valuemin="0" aria-valuemax="5" aria-valuenow="4" aria-readonly="true" style="width: 70px; height: 14px;"><div class="rateit-selected" style="height: 14px; width: 56px;"></div><div class="rateit-hover" style="height:14px"></div></div></div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="reviews">
                                            <a href="#" class="lnk">(13 Reviews)</a>
                                        </div>
                                    </div>
                                </div><!-- /.row -->        
                            </div><!-- /.rating-reviews -->

                            <div class="stock-container info-container m-t-10">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="stock-box">
                                            <span class="label">Trạng thái :</span>
                                        </div>  
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="stock-box">
                                            <span class="value">In Stock</span>
                                        </div>  
                                    </div>
                                </div><!-- /.row -->    
                            </div><!-- /.stock-container -->

                            <div class="description-container m-t-20">
                                {!! $product_detail->detail !!}
                            </div><!-- /.description-container -->

                            <div class="price-container info-container m-t-20">
                                <div class="row">


                                    <div class="col-sm-6">
                                        <div class="price-box">
                                            @if($product_detail->discount)
                                                <span class="price">{{ number_format($product_detail->discount)."₫" }}</span>
                                                <span class="price-strike">{{ number_format($product_detail->price)."₫" }}</span>
                                            @else
                                                <span class="price">{{ number_format($product_detail->price)."₫" }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="favorite-button m-t-10">
                                            <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="" href="#" data-original-title="Wishlist">
                                                <i class="fa fa-heart"></i>
                                            </a>
                                            <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="" href="#" data-original-title="Add to Compare">
                                                <i class="fa fa-signal"></i>
                                            </a>
                                            <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="" href="#" data-original-title="E-mail">
                                                <i class="fa fa-envelope"></i>
                                            </a>
                                        </div>
                                    </div>

                                </div><!-- /.row -->
                            </div><!-- /.price-container -->

                            <div class="quantity-container info-container">
                                <form action="{{ url('add-cart') }}" method="post">
                                        {{ csrf_field() }}
                                <div class="row">

                                    <div class="col-sm-2">
                                        <span class="label">Số lượng :</span>
                                    </div>
                                    
                                        <div class="col-sm-2">
                                            <div class="cart-quantity">
                                                <div class="quant-input">
                                                    <div class="arrows">
                                                        <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
                                                        <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
                                                    </div>
                                                    <input type="number" name="qty" value="1">
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="id" value="{{$product_detail->id}}">
                                    <div class="col-sm-7">
                                        <!-- <a href="" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> Thêm vào giỏ hàng</a> -->
                                        <button type="submit" class="btn btn-primary">Thêm vào giỏ hàng</button>
                                    </div>
                                </div><!-- /.row -->
                                </form>
                            </div><!-- /.quantity-container -->
                        </div><!-- /.product-info -->
                    </div><!-- /.col-sm-7 -->
                </div><!-- /.row -->
            </div>
            <div class="product-tabs inner-bottom-xs  wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                <div class="row">
                    <div class="col-sm-3">
                        <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                            <li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
                            <li><a data-toggle="tab" href="#review">REVIEW</a></li>
                            <li><a data-toggle="tab" href="#tags">TAGS</a></li>
                        </ul><!-- /.nav-tabs #product-tabs -->
                    </div>
                    <div class="col-sm-9">

                        <div class="tab-content">

                            <div id="description" class="tab-pane in active">
                                <div class="product-tab">
                                    <p class="text">{!! $product_detail->detail !!}</p>
                                </div>  
                            </div><!-- /.tab-pane -->

                            <div id="review" class="tab-pane">
                                <div class="product-tab">
                                    <div class="product-reviews">
                                        <h4 class="title">Customer Reviews</h4>

                                        <div class="reviews">
                                            <div class="review">
                                                <div class="review-title"><span class="summary">We love this product</span><span class="date"><i class="fa fa-calendar"></i><span>1 days ago</span></span></div>
                                                <div class="text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit.Aliquam suscipit."</div>
                                            </div>

                                        </div><!-- /.reviews -->
                                    </div><!-- /.product-reviews -->
                                    <form action="{{ url('product/reviews') }}" method="post" role="form" class="cnt-form">
                                        {{ csrf_field() }}
                                        <div class="product-add-review">
                                            <h4 class="title">Write your own review</h4>
                                            <div class="rating rateit-small rateit"><button id="rateit-reset-5" data-role="none" class="rateit-reset" aria-label="reset rating" aria-controls="rateit-range-5" style="display: none;"></button><div id="rateit-range-5" class="rateit-range" tabindex="0" role="slider" aria-label="rating" aria-owns="rateit-reset-5" aria-valuemin="0" aria-valuemax="5" aria-valuenow="4" aria-readonly="true" style="width: 70px; height: 14px;"><div class="rateit-selected" style="height: 14px; width: 56px;"></div><div class="rateit-hover" style="height:14px"></div></div></div></br></br></br>
                                            <div class="review-form">
                                                <div class="form-container">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="exampleInputName">Your Name <span class="astk">*</span></label>
                                                                    <input type="text" class="form-control txt" id="exampleInputName" placeholder="Tên" name="username">
                                                                </div><!-- /.form-group -->
                                                                <div class="form-group">
                                                                    <label for="exampleInputSummary">Summary <span class="astk">*</span></label>
                                                                    <input type="text" class="form-control txt" id="exampleInputSummary" placeholder="Tóm tắt" name="summary">
                                                                </div><!-- /.form-group -->
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="exampleInputReview">Review <span class="astk">*</span></label>
                                                                    <textarea class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder="Nhận xét" name="review"></textarea>
                                                                </div><!-- /.form-group -->
                                                            </div>
                                                        </div><!-- /.row -->
                                                        
                                                        <div class="action text-right">
                                                            <button class="btn btn-primary btn-upper" type="submit">SUBMIT REVIEW</button>
                                                        </div><!-- /.action -->

                                                    
                                                </div><!-- /.form-container -->
                                            </div><!-- /.review-form -->
                                        </div>
                                    </form>
                                </div><!-- /.product-tab -->
                            </div><!-- /.tab-pane -->

                            <div id="tags" class="tab-pane">
                                <div class="product-tag">

                                    <h4 class="title">Product Tags</h4>
                                    <form role="form" class="form-inline form-cnt">
                                        <div class="form-container">

                                            <div class="form-group">
                                                <label for="exampleInputTag">Add Your Tags: </label>
                                                <input type="email" id="exampleInputTag" class="form-control txt">


                                            </div>

                                            <button class="btn btn-upper btn-primary" type="submit">ADD TAGS</button>
                                        </div><!-- /.form-container -->
                                    </form><!-- /.form-cnt -->

                                    <form role="form" class="form-inline form-cnt">
                                        <div class="form-group">
                                            <label>&nbsp;</label>
                                            <span class="text col-md-offset-3">Use spaces to separate tags. Use single quotes (') for phrases.</span>
                                        </div>
                                    </form><!-- /.form-cnt -->

                                </div><!-- /.product-tab -->
                            </div><!-- /.tab-pane -->

                        </div><!-- /.tab-content -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.product-tabs -->

            <!-- ============================================== UPSELL PRODUCTS ============================================== -->
            <section class="section featured-product wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                <h3 class="section-title">upsell products</h3>
                <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs" style="opacity: 1; display: block;">

                    <div class="owl-wrapper-outer"><div class="owl-wrapper" style="width: 2484px; left: 0px; display: block;"><div class="owl-item" style="width: 207px;"><div class="item item-carousel">
                                    <div class="products">

                                        <div class="product">       
                                            <div class="product-image">
                                                <div class="image">
                                                    <a href="detail.html"><img src="public/assets\images\products\p1.jpeg" alt=""></a>
                                                </div><!-- /.image -->          

                                                <div class="tag sale"><span>sale</span></div>                      
                                            </div><!-- /.product-image -->


                                            <div class="product-info text-left">
                                                <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                                <div class="rating rateit-small rateit"><button id="rateit-reset-6" data-role="none" class="rateit-reset" aria-label="reset rating" aria-controls="rateit-range-6" style="display: none;"></button><div id="rateit-range-6" class="rateit-range" tabindex="0" role="slider" aria-label="rating" aria-owns="rateit-reset-6" aria-valuemin="0" aria-valuemax="5" aria-valuenow="4" aria-readonly="true" style="width: 70px; height: 14px;"><div class="rateit-selected" style="height: 14px; width: 56px;"></div><div class="rateit-hover" style="height:14px"></div></div></div>
                                                <div class="description"></div>

                                                <div class="product-price"> 
                                                    <span class="price">
                                                        $650.99             </span>
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
                                                                <i class="fa fa-signal"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div><!-- /.action -->
                                            </div><!-- /.cart -->
                                        </div><!-- /.product -->

                                    </div><!-- /.products -->
                                </div></div><div class="owl-item" style="width: 207px;"><div class="item item-carousel">
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
                                                <div class="rating rateit-small rateit"><button id="rateit-reset-7" data-role="none" class="rateit-reset" aria-label="reset rating" aria-controls="rateit-range-7" style="display: none;"></button><div id="rateit-range-7" class="rateit-range" tabindex="0" role="slider" aria-label="rating" aria-owns="rateit-reset-7" aria-valuemin="0" aria-valuemax="5" aria-valuenow="4" aria-readonly="true" style="width: 70px; height: 14px;"><div class="rateit-selected" style="height: 14px; width: 56px;"></div><div class="rateit-hover" style="height:14px"></div></div></div>
                                                <div class="description"></div>

                                                <div class="product-price"> 
                                                    <span class="price">
                                                        $650.99             </span>
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
                                                                <i class="fa fa-signal"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div><!-- /.action -->
                                            </div><!-- /.cart -->
                                        </div><!-- /.product -->

                                    </div><!-- /.products -->
                                </div></div><div class="owl-item" style="width: 207px;"><div class="item item-carousel">
                                    <div class="products">

                                        <div class="product">       
                                            <div class="product-image">
                                                <div class="image">
                                                    <a href="detail.html"><img src="public/assets\images\products\p3.jpeg" alt=""></a>
                                                </div><!-- /.image -->          

                                                <div class="tag hot"><span>hot</span></div>        
                                            </div><!-- /.product-image -->


                                            <div class="product-info text-left">
                                                <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                                <div class="rating rateit-small rateit"><button id="rateit-reset-8" data-role="none" class="rateit-reset" aria-label="reset rating" aria-controls="rateit-range-8" style="display: none;"></button><div id="rateit-range-8" class="rateit-range" tabindex="0" role="slider" aria-label="rating" aria-owns="rateit-reset-8" aria-valuemin="0" aria-valuemax="5" aria-valuenow="4" aria-readonly="true" style="width: 70px; height: 14px;"><div class="rateit-selected" style="height: 14px; width: 56px;"></div><div class="rateit-hover" style="height:14px"></div></div></div>
                                                <div class="description"></div>

                                                <div class="product-price"> 
                                                    <span class="price">
                                                        $650.99             </span>
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
                                                                <i class="fa fa-signal"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div><!-- /.action -->
                                            </div><!-- /.cart -->
                                        </div><!-- /.product -->

                                    </div><!-- /.products -->
                                </div></div><div class="owl-item" style="width: 207px;"><div class="item item-carousel">
                                    <div class="products">

                                        <div class="product">       
                                            <div class="product-image">
                                                <div class="image">
                                                    <a href="detail.html"><img src="public/assets\images\products\p4.jpeg" alt=""></a>
                                                </div><!-- /.image -->          

                                                <div class="tag new"><span>new</span></div>                                
                                            </div><!-- /.product-image -->


                                            <div class="product-info text-left">
                                                <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                                <div class="rating rateit-small rateit"><button id="rateit-reset-9" data-role="none" class="rateit-reset" aria-label="reset rating" aria-controls="rateit-range-9" style="display: none;"></button><div id="rateit-range-9" class="rateit-range" tabindex="0" role="slider" aria-label="rating" aria-owns="rateit-reset-9" aria-valuemin="0" aria-valuemax="5" aria-valuenow="4" aria-readonly="true" style="width: 70px; height: 14px;"><div class="rateit-selected" style="height: 14px; width: 56px;"></div><div class="rateit-hover" style="height:14px"></div></div></div>
                                                <div class="description"></div>

                                                <div class="product-price"> 
                                                    <span class="price">
                                                        $650.99             </span>
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
                                                                <i class="fa fa-signal"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div><!-- /.action -->
                                            </div><!-- /.cart -->
                                        </div><!-- /.product -->

                                    </div><!-- /.products -->
                                </div></div><div class="owl-item" style="width: 207px;"><div class="item item-carousel">
                                    <div class="products">

                                        <div class="product">       
                                            <div class="product-image">
                                                <div class="image">
                                                    <a href="detail.html"><img src="public/assets/images/products/p5.jpg" alt=""></a>
                                                </div><!-- /.image -->          

                                                <div class="tag hot"><span>hot</span></div>        
                                            </div><!-- /.product-image -->


                                            <div class="product-info text-left">
                                                <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                                <div class="rating rateit-small rateit"><button id="rateit-reset-10" data-role="none" class="rateit-reset" aria-label="reset rating" aria-controls="rateit-range-10" style="display: none;"></button><div id="rateit-range-10" class="rateit-range" tabindex="0" role="slider" aria-label="rating" aria-owns="rateit-reset-10" aria-valuemin="0" aria-valuemax="5" aria-valuenow="4" aria-readonly="true" style="width: 70px; height: 14px;"><div class="rateit-selected" style="height: 14px; width: 56px;"></div><div class="rateit-hover" style="height:14px"></div></div></div>
                                                <div class="description"></div>

                                                <div class="product-price"> 
                                                    <span class="price">
                                                        $650.99             </span>
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
                                                                <i class="fa fa-signal"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div><!-- /.action -->
                                            </div><!-- /.cart -->
                                        </div><!-- /.product -->

                                    </div><!-- /.products -->
                                </div></div><div class="owl-item" style="width: 207px;"><div class="item item-carousel">
                                    <div class="products">

                                        <div class="product">       
                                            <div class="product-image">
                                                <div class="image">
                                                    <a href="detail.html"><img src="public/assets/images/products/p6.jpg" alt=""></a>
                                                </div><!-- /.image -->          

                                                <div class="tag new"><span>new</span></div>                                
                                            </div><!-- /.product-image -->


                                            <div class="product-info text-left">
                                                <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                                <div class="rating rateit-small rateit"><button id="rateit-reset-11" data-role="none" class="rateit-reset" aria-label="reset rating" aria-controls="rateit-range-11" style="display: none;"></button><div id="rateit-range-11" class="rateit-range" tabindex="0" role="slider" aria-label="rating" aria-owns="rateit-reset-11" aria-valuemin="0" aria-valuemax="5" aria-valuenow="4" aria-readonly="true" style="width: 70px; height: 14px;"><div class="rateit-selected" style="height: 14px; width: 56px;"></div><div class="rateit-hover" style="height:14px"></div></div></div>
                                                <div class="description"></div>

                                                <div class="product-price"> 
                                                    <span class="price">
                                                        $650.99             </span>
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
                                                                <i class="fa fa-signal"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div><!-- /.action -->
                                            </div><!-- /.cart -->
                                        </div><!-- /.product -->

                                    </div><!-- /.products -->
                                </div></div></div></div><!-- /.item -->

                    <!-- /.item -->

                    <!-- /.item -->

                    <!-- /.item -->

                    <!-- /.item -->

                    <!-- /.item -->
                    <div class="owl-controls clickable"><div class="owl-buttons"><div class="owl-prev"></div><div class="owl-next"></div></div></div></div><!-- /.home-owl-carousel -->
            </section><!-- /.section -->
            <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->

        </div>
    </div>
</div>

@stop