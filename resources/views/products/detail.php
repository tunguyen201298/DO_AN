<div class="detail-block">
                <div class="row  wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">

                    <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                        <div class="product-item-holder size-big single-product-gallery small-gallery">

                            <div id="owl-single-product" class="owl-carousel owl-theme" style="opacity: 1; display: block;">
                                <div class="owl-wrapper-outer">
                                    <div class="owl-wrapper" style="width: 5742px; left: 0px; display: block;">
                                        @foreach($product_img as $img)
                                        <div class="owl-item" style="width: 319px;">
                                            
                                            <div class="single-product-gallery-item" id="slide1">
                                                <a data-lightbox="image-1" data-title="Gallery" href="{{ asset('storage/app/products/'.$img->link) }}">
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