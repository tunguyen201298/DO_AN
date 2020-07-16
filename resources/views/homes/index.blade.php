<!-- Stored in resources/views/child.blade.php -->
@extends('layouts.app')
@section('title', $title)
@section('content')
<div class="container">
    <div class="row ">
        @include('layouts._leftmenu')
        <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
            <!-- ========================================== SECTION – HERO ========================================= -->
@include('layouts._slider')
            <!-- ============================================== INFO BOXES : END ============================================== -->
            <!-- ============================================== SCROLL TABS ============================================== -->
            <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                <div class="more-info-tab clearfix ">
                    <h3 class="new-product-title pull-left">Sản phẩm mới</h3>
                    
                </div>
                
                <div class="tab-content outer-top-xs">
                    <div class="tab-pane in active" id="all">			
                        <div class="product-slider">
                            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                                
                                    @foreach($product as $value)
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
                                                    <div class="rating rateit-small" data-rateit-value="{{$start_review->startReview($value->id)}}"></div>
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
                                                                    
                                                                    <button class="btn btn-primary icon" type="button" title="Add Cart" id="addCart{{$value->id}}" onclick="addTocart({{$value->id}})"> 
                                                                        <i class="fa fa-shopping-cart"></i>	
                                                                    </button>
                                                            </li>

                                                            
                                                            <li class="lnk">
                                                                <a data-toggle="tooltip" class="add-to-cart" href="{{route('product-details',['id'=>$value->id]) }}" title="Xem chi tiết">
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
                    
                </div><!-- /.tab-content -->
            </div><!-- /.scroll-tabs -->
            <!-- ============================================== SCROLL TABS : END ============================================== -->
            <!-- ============================================== WIDE PRODUCTS ============================================== -->
            
            <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
            <!-- ============================================== FEATURED PRODUCTS ============================================== -->
            <section class="section featured-product wow fadeInUp">
                <h3 class="section-title">Sảm phẩm bán chạy</h3>
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                    @foreach($pro_sell as $item)
                    <div class="item item-carousel">
                        <div class="products">
                            <div class="product">		
                                <div class="product-image">
                                    <div class="image">
                                        <a href="{{route('product-details',['id'=>$item->id]) }}"><img src="{{asset('storage/app/products/'.$item->img_link)}}" alt="Hình ảnh sản phẩm"></a>
                                    </div><!-- /.image -->			

                                    <div class="tag hot"><span>hot</span></div>		   
                                </div><!-- /.product-image -->


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

                                            <li class="lnk">
                                                <a data-toggle="tooltip" class="add-to-cart" href="{{route('product-details',['id'=>$value->id]) }}" title="Xem chi tiết">
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
            </section><!-- /.section -->
            <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
            <!-- ============================================== WIDE PRODUCTS ============================================== -->
            <div class="wide-banners wow fadeInUp outer-bottom-xs">
                <div class="row">

                    <div class="col-md-12">
                        <div class="wide-banner cnt-strip">
                            <div class="image">
                                <img class="img-responsive" src="{{asset('storage/app/banners/'.$banner->name)}}" alt="Ảnh banner"style="width: 100%; height: 200px">
                            </div>	
                           
                        </div><!-- /.wide-banner -->
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.wide-banners -->
            <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
            

            <!-- ============================================== BLOG SLIDER ============================================== -->
            <section class="section latest-blog outer-bottom-vs wow fadeInUp">
                <h3 class="section-title">Bài viết mới</h3>
                <div class="blog-slider-container outer-top-xs">
                    <div class="owl-carousel blog-slider custom-carousel">
                        @foreach($blog as $item)
                        <div class="item">
                            <div class="blog-post">
                                <div class="blog-post-image">
                                    <div class="image">
                                        <a href="{{ url('blogs/detail/'.$item->id) }}"><img src="{{asset('storage/app/blog-post/'.$item->image)}}" alt="Hình ảnh bài viết" style="height: 216px; background-size: cover;"></a>
                                    </div>
                                </div><!-- /.blog-post-image -->


                                <div class="blog-post-info text-left">
                                    <h3 class="name"><a href="#">{{$item->title}}</a></h3>	
                                    <span class="info">{{$item->created_at}}</span>
                                    <!-- <p class="text blog-item" >{!!$item->content!!}</p> -->
                                    <a href="{{ url('blogs/detail/'.$item->id) }}" class="lnk btn btn-primary">Xem chi tiết</a>
                                </div><!-- /.blog-post-info -->

                            </div><!-- /.blog-post -->
                        </div><!-- /.item -->

                        @endforeach

                    </div><!-- /.owl-carousel -->
                </div><!-- /.blog-slider-container -->
            </section><!-- /.section -->
            <!-- ============================================== BLOG SLIDER : END ============================================== -->	

            <!-- ============================================== FEATURED PRODUCTS ============================================== -->
            <section class="section wow fadeInUp new-arriavls">
                <h3 class="section-title">Sản phẩm khuyến mãi</h3>
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                    @foreach($promotions as $va)
                    @foreach($va->products as $item)
                    <div class="item item-carousel">
                        <div class="products">

                            <div class="product">		
                                <div class="product-image">
                                    <div class="image">
                                        <a href="detail.html"><img src="{{asset('storage/app/products/'.$item->img_link)}}" alt="Hình ảnh sản phẩm"></a>
                                    </div><!-- /.image -->			

                                    <div class="tag new"><span>sale</span></div>                
                                           		   
                                </div><!-- /.product-image -->


                                <div class="product-info text-left">
                                    <h3 class="name"><a href="detail.html">{{$item->name}}</a></h3>
                                    <div class="rating rateit-small" data-rateit-value="{{$start_review->startReview($item->id)}}"></div>
                                    <div class="description"></div>

                                    <div class="product-price">	
                                        <span class="price">{{ number_format($item->discount)."₫" }}</span>
                                        <span class="price-before-discount">{{ number_format($item->price)."₫" }}</span>
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

                                            <li class="lnk">
                                                <a data-toggle="tooltip" class="add-to-cart" href="{{route('product-details',['id'=>$value->id]) }}" title="Xem chi tiết">
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
                    @endforeach
                </div><!-- /.home-owl-carousel -->
            </section><!-- /.section -->
            <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->

        </div><!-- /.homebanner-holder -->
        <!-- ============================================== CONTENT : END ============================================== -->
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


