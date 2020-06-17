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
                                        <div class="owl-item" style="width: 319px;">
                                            
                                            <div class="single-product-gallery-item" id="slide{{$no}}">
                                                <a data-lightbox="image-{{$no++}}" data-title="Gallery" href="{{ asset('storage/app/products/'.$product_detail->img_link) }}">
                                                    <img class="img-responsive" alt="" src="{{ asset('storage/app/products/'.$product_detail->img_link) }}">
                                                </a>
                                            </div>
                                        </div>
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
                                                <span class="price">{{ number_format($product_detail->discount)." ₫" }}</span>
                                                <span class="price-strike">{{ number_format($product_detail->price)."₫" }}</span>
                                            @else
                                                <span class="price">{{ number_format($product_detail->price)." ₫" }}</span>
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
                            <li class="active"><a data-toggle="tab" href="#description">Mô tả</a></li>
                            <li><a data-toggle="tab" href="#review">Đánh giá</a></li>
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
                                        <h4 class="title">Đánh giá của khách hàng</h4>

                                        <div class="reviews">
                                            <div class="review">
                                                @if(!empty($review))
                                                    @foreach($review as $item)
                                                        <div class="review-title">
                                                            <span class="summary"><b>
                                                            {{$item->name}}</b>
                                                            </span><br>
                                                            <span class="summary">{{$item->title}}</span><span class="date"><i class="fa fa-calendar"></i><span>1 days ago</span></span></div>
                                                        <div class="text">{{$item->content}}</div>
                                                    @endforeach
                                                @else
                                                    <span>Chưa có bình luận nào.</span>
                                                    <span>Hãy là người đầu tiên bình lậu sản phẩm</span>
                                                @endif
                                            </div>

                                        </div><!-- /.reviews -->
                                    </div><!-- /.product-reviews -->
                                    <form action="" method="post" role="form" class="cnt-form" id="theForm">
                                        {{ csrf_field() }}
                                        <div class="product-add-review">
                                            <h4 class="title">Viết nhận xét của riêng bạn</h4>
                                            <fieldset class="rating star">
                                                <input type="radio" id="field6_star5" name="rating2" value="5" /><label class = "full" for="field6_star5"></label>
                                                <input type="radio" id="field6_star4" name="rating2" value="4" /><label class = "full" for="field6_star4"></label>
                                                <input type="radio" id="field6_star3" name="rating2" value="3" /><label class = "full" for="field6_star3"></label>
                                                <input type="radio" id="field6_star2" name="rating2" value="2" /><label class = "full" for="field6_star2"></label>
                                                <input type="radio" id="field6_star1" name="rating2" value="1" /><label class = "full" for="field6_star1"></label>
                                            </fieldset>
                                            <div class="review-form">
                                                <div class="form-container">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                
                                                                <div class="form-group">
                                                                    <label for="exampleInputSummary">Tóm tắt <span class="astk">*</span></label>
                                                                    <input type="text" class="form-control txt" id="exampleInputSummary" placeholder="Tóm tắt" name="title" id="title_review">
                                                                </div><!-- /.form-group -->
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="exampleInputReview">Nhận xét <span class="astk">*</span></label>
                                                                    <textarea class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder="Nhận xét" name="content" id="content_review"></textarea>
                                                                </div><!-- /.form-group -->
                                                            </div>
                                                        </div><!-- /.row -->
                                                        
                                                        <div class="action text-right">
                                                            <!-- <button class="btn btn-primary btn-upper" type="submit">GỬI</button> -->
                                                            <input type="hidden" name="id" value="{{$product_detail->id}}">
                                                            <a href="#" class="btn btn-primary btn-upper" id="submit_review">GỬI</a>
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
            <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
            <div class="more-info-tab clearfix ">
                <h3 class="new-product-title pull-left">Sản Phẩm Tương Tự </h3>

                <!-- /.nav-tabs --> 
            </div>
            <div class="tab-content outer-top-xs">
                <div class="tab-pane in active" id="all">
                    <div class="product-slider">
                        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="5">

                            @foreach($tt as $item)
                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image"> <a href=""><img   src="{{asset('storage/app/products/'.$item->img_link)}}" alt="" style="width: 164px;height:200px"></a> </div>
                                            <!-- /.image -->

                                        </div>
                                        <!-- /.product-image -->

                                        <div class="product-info text-left">
                                            <h3 class="name" style="height: 45px"><a href="detail.html">{{$item->name}}</a></h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>
                                            <div class="product-price"> <span class="price"> {{number_format($item->price)." ₫"}} </span>  </div>
                                            <!-- /.product-price --> 

                                        </div>
                                        <!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="lnk"> <a class="add-to-cart" href="{{asset('cart/ad/'.$item->id)}}" title="Thêm vào giỏ hàng"> <i class="fa fa-shopping-cart" aria-hidden="true"></i> </a> </li>
                                                    
                                                    <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Thêm vào yêu thích"> <i class="icon fa fa-heart"></i> </a> </li>
                                                    <li class="lnk"> <a class="add-to-cart" href="" title="Xem chi tiết"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                                </ul>
                                            </div>
                                            <!-- /.action --> 
                                        </div>
                                        <!-- /.cart --> 
                                    </div>
                                    <!-- /.product --> 

                                </div>

                                <!-- /.products --> 
                            </div>
                            @endforeach
                            <!-- /.item -->

                            <!-- /.item --> 
                        </div>
                        <!-- /.home-owl-carousel --> 
                    </div>
                    <!-- /.product-slider --> 
                </div>
               

                <!-- end main -->
            </div>
        
        </div>
            <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->

        </div>
    </div>
</div>
<script type="text/javascript">
    $("label").click(function(){
      $(this).parent().find("label").css({"background-color": "#78e2fb"});
      $(this).css({"background-color": "yellow"});
      $(this).nextAll().css({"background-color": "yellow"});
    });
    $(".star label").click(function(){
      $(this).parent().find("label").css({"color": "#78e2fb"});
      $(this).css({"color": "yellow"});
      $(this).nextAll().css({"color": "yellow"});
      $(this).css({"background-color": "transparent"});
      $(this).nextAll().css({"background-color": "transparent"});
    });
    $("#submit_review").on('click',function() {
        var user = '{{ !Auth::check()}}';
        if (user){
            Swal.fire('Xin mời đăng nhập')
        }
        else{
            var form = $("#theForm").serialize();
            $.ajax({
               url: "{{url('product/reviews')}}",
               data: form,
               type: "POST",
               success: function(data)
               {
                    
               }
             });
        }
        
    });
</script>
@stop