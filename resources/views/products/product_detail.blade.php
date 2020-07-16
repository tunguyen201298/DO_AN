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

        <div id="owl-single-product">

            @foreach($product_img as $item)
            <div class="single-product-gallery-item" id="slide{{$no}}">
                <a data-lightbox="image-{{$no}}" data-title="Gallery" href="{{ asset('storage/app/products/'.$item->link) }}">
                    <img class="img-responsive" alt="" src="{{ asset('storage/app/products/'.$item->link) }}" data-echo="{{ asset('storage/app/products/'.$item->link) }}">
                </a>
                <input type="hidden" name="{{$no++}}">
            </div><!-- /.single-product-gallery-item -->
            
            
            @endforeach

        </div><!-- /.single-product-slider -->


        <div class="single-product-gallery-thumbs gallery-thumbs">

            <div id="owl-single-product-thumbnails">
                
                @foreach($product_img as $item)
                <div class="item">
                    <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="{{$no1}}" href="{{ asset('storage/app/products/'.$item->link) }}">
                        <img class="img-responsive" width="85" alt="" src="{{ asset('storage/app/products/'.$item->link) }}" data-echo="{{ asset('storage/app/products/'.$item->link) }}">
                    </a>
                    <input type="hidden" name="1{{$no1++}}">
                </div>

                @endforeach
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
                                        <div class="rating rateit-small"  data-rateit-value="{{$sum_start_detail}}"></div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="reviews">
                                            <a href="#" class="lnk">({{$count_review}} Bình luận)</a>
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
                                            @if($count_qty >= 5)
                                                <span class="value" style="color: green">Còn hàng</span>
                                            @elseif($count_qty >= 5)
                                                <span class="value" style="color: yellow">Sắp hết</span>
                                            @else
                                                <span class="value" style="color: red">Hết hàng</span>
                                            @endif
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
                                                    <input type="number" name="qty" value="1" min="1" max="10">
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
                                                            </span><br><div class="rating rateit-small" data-rateit-value="{{$item->rating}}"></div><br>
                                                            <span class="summary">{{$item->title}}</span><span class="date"><i class="fa fa-calendar"></i><span>
                                                                {{ App\Models\Review::find($item->id)->created_at->diffForHumans($now)}}
                                                            </span></span></div>
                                                        <div class="text">{{$item->content}}</div>
                                                        <hr>
                                                    @endforeach
                                                @else
                                                    <span>Chưa có bình luận nào.</span>
                                                    <span>Hãy là người đầu tiên bình lậu sản phẩm</span>
                                                @endif
                                            </div>

                                        </div><!-- /.reviews -->
                                    </div><!-- /.product-reviews -->
                                    <form action="#" method="post" role="form" class="cnt-form" id="theForm">
                                        <div class="product-add-review">
                                            <h4 class="title">Viết nhận xét của riêng bạn</h4>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <span>Chọn số sao: </span>
                                                    <div class="rating rateit-small rateit" id="start_review"></div>
                                                    <input type="hidden" name="rating" id="rating_ajax">
                                                </div>
                                            </div>
                                            
                                            <div class="review-form">
                                                <div class="form-container">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                
                                                                <div class="form-group">
                                                                    <label for="exampleInputSummary">Tóm tắt <span class="astk">*</span></label>
                                                                    <input type="text" class="form-control txt" id="exampleInputSummary" placeholder="Tóm tắt" name="title" id="title_review" required>
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
                                                            <button class="btn btn-primary btn-upper" type="submit">GỬI</button>
                                                            <input type="hidden" name="id" value="{{$product_detail->id}}">
                                                            <!-- <a href="#" class="btn btn-primary btn-upper" id="submit_review">GỬI</a> -->
                                                        </div><!-- /.action -->
                                                </div><!-- /.form-container -->
                                            </div><!-- /.review-form -->
                                        </div>
                                    </form>
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
                        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

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
                                            <h3 class="name"><a href="detail.html">{{$item->name}}</a></h3>
                                            <div class="rating rateit-small" data-rateit-value="{{$start_review->startReview($item->id)}}"></div>
                                            <div class="description"></div>
                                            <div class="product-price">
                                                @if(!empty($item->discount))
                                                    <span class="price">{{ number_format($item->discount)."₫" }}</span>
                                                    <span class="price-before-discount">{{ number_format($item->price)."₫" }}</span>
                                                @else
                                                    <span class="price">{{ number_format($item->price)."₫" }}</span>
                                                @endif 
                                            </div>
                                            <!-- /.product-price --> 

                                        </div>
                                        <!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                                    
                                                                    <button class="btn btn-primary icon" title="Add Cart" id="addCart{{$item->id}}" onclick="addTocart({{$item->id}})"> 
                                                                        <i class="fa fa-shopping-cart"></i> 
                                                                    </button>
                                                            </li>
                                                    
                                                    <li class="lnk">
                                                        <a data-toggle="tooltip" class="add-to-cart" href="{{route('product-details',['id'=>$item->id]) }}" title="Xem chi tiết">
                                                            <i class="fa fa-signal" aria-hidden="true"></i>
                                                        </a>
                                                    </li>
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

@stop
@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $("#submit_review").on('click',function() {
            var user = '{{ Auth::check()}}';
            var rating = $('#start_review').rateit('value');
            if (!user){
                Swal.fire('Vui lòng đăng nhập');
                return false;
            }else if(rating == 0){
                Swal.fire('Vui lòng chọn ít nhất 1 sao');
            }else{
                $('#rating_ajax').val(rating);
                var form = $("#theForm").serialize();
                $.ajax({
                   url:"{{url('product-reviews')}}",
                   data: form,
                   type: 'POST',
                   headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                   success: function(response)
                   {
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
                                  title: 'Đánh giá thành công'
                                })
                            })()
                   }
                 });
            }            
        });
    });
</script>
@stop