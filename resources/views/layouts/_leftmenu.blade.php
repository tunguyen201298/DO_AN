<!-- ============================================== SIDEBAR ============================================== -->  
<div class="col-xs-12 col-sm-12 col-md-3 sidebar">

    <!-- ================================== TOP NAVIGATION ================================== -->
    <div class="side-menu animate-dropdown outer-bottom-xs">
        <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Loại sản phẩm</div>        
        <nav class="yamm megamenu-horizontal" role="navigation">
            <ul class="nav">
                @foreach($menus as $menu)
                <li class="dropdown menu-item">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon fa fa-diamond"></i>
                        {{ $menu->name }}</a>
                        @if($menu->childrens)
                        <ul class="dropdown-menu mega-menu" style="min-width: 100%;">
                            <li class="yamm-content">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <ul class="links list-unstyled">  
                                            @foreach($menu->childrens as $children)
                                            <li><a href="{{ url('product-category/'.$children->id)}}">{{ $children->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div><!-- /.col -->
                                </div><!-- /.row -->

                            </li><!-- /.yamm-content -->                    
                        </ul><!-- /.dropdown-menu -->   
                        @endif         
                    </li><!-- /.menu-item -->
                    @endforeach
                </ul><!-- /.nav -->
            </nav><!-- /.megamenu-horizontal -->
        </div><!-- /.side-menu -->
        <!-- ================================== TOP NAVIGATION : END ================================== -->

        <!-- ============================================== HOT DEALS ============================================== -->
        @if($promotion)
        <div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
            <h3 class="section-title">khuyến mãi</h3>
            <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
                
                @foreach($promotion->products as $item)
                <div class="item">
                    <div class="products">
                        <div class="hot-deal-wrapper">
                            <div class="image">
                                <a href="{{ url('product-details/'.$item->id) }}"><img src="{{ asset('storage/app/products/'.$item->img_link) }}" alt="Hình ảnh sản phẩm"></a>
                            </div>
                            <div class="sale-offer-tag"><span>
                                @if($promotion->type == 'phantram')
                                SALE<br>{{$promotion->detail."%"}}
                                @else
                                SALE<br>{{$promotion->detail/1000 ."k"}}
                                @endif
                            </span></div>
                            <div class="timing-wrapper" id="clockdiv">
                                <div class="box-wrapper">
                                    <div class="date box">
                                        <span class="key days"></span>
                                        <span class="value">DAYS</span>
                                    </div>
                                </div>
                                
                                <div class="box-wrapper">
                                    <div class="hour box">
                                        <span class="key hours"></span>
                                        <span class="value">HRS</span>
                                    </div>
                                </div>

                                <div class="box-wrapper">
                                    <div class="minutes box">
                                        <span class="key minute"></span>
                                        <span class="value">MINS</span>
                                    </div>
                                </div>

                                <div class="box-wrapper hidden-md">
                                    <div class="seconds box">
                                        <span class="key second"></span>
                                        <span class="value">SEC</span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.hot-deal-wrapper -->

                        <div class="product-info text-left m-t-20">
                            <h3 class="name"><a href="{{ url('product-details/'.$item->id) }}">{{$item->name}}</a></h3>
                            <div class="row" style="margin-left: 0px">
                                <div class="rating rateit-small" data-rateit-value="{{$sum_start->startReview($item->id)}}"></div>
                            </div>
                            <div class="product-price"> 
                                <span class="price">{{ number_format($item->discount)."₫" }}</span>
                                <span class="price-before-discount">{{ number_format($item->price)."₫" }}</span>
                            </div><!-- /.product-price -->
                            
                        </div><!-- /.product-info -->

                        <div class="cart clearfix animate-effect">
                            <div class="action">
                                
                                <div class="add-cart-button btn-group">
                                    <button class="btn btn-primary icon" data-toggle="dropdown" type="button" onclick="addTocart({{$item->id}})">
                                        <i class="fa fa-shopping-cart"></i>                                                 
                                    </button>
                                    <button class="btn btn-primary cart-btn" type="button">Chi tiết sản phẩm</button>
                                                            
                                </div>
                                
                            </div><!-- /.action -->
                        </div><!-- /.cart -->
                    </div>  

                </div>              
                        
                @endforeach
                
            </div><!-- /.sidebar-widget -->
        </div>
                @endif
            <!-- ============================================== SPECIAL OFFER ============================================== -->

            <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                <h3 class="section-title">Khuyến mãi</h3>
                <div class="sidebar-widget-body outer-top-xs">
                    <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                        <div class="item">
                            <div class="products special-product">
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="#">
                                                            <img src="{{ asset('storage/app/products/p30.jpeg') }}" alt="">
                                                        </a>          
                                                    </div><!-- /.image -->



                                                </div><!-- /.product-image -->
                                            </div><!-- /.col -->
                                            <div class="col col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price"> 
                                                        <span class="price">
                                                        $450.99       </span>

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
                                                            <img src="{{ asset('storage/app/products/p29.jpeg') }}" alt="">
                                                        </a>          
                                                    </div><!-- /.image -->


                                                </div><!-- /.product-image -->
                                            </div><!-- /.col -->
                                            <div class="col col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price"> 
                                                        <span class="price">
                                                        $450.99       </span>

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
                                                            <img src="public/assets\images\products\p28.jpeg" alt="">

                                                        </a>          
                                                    </div><!-- /.image -->



                                                </div><!-- /.product-image -->
                                            </div><!-- /.col -->
                                            <div class="col col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price"> 
                                                        <span class="price">
                                                        $450.99       </span>

                                                    </div><!-- /.product-price -->

                                                </div>
                                            </div><!-- /.col -->
                                        </div><!-- /.product-micro-row -->
                                    </div><!-- /.product-micro -->

                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="products special-product">
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
                                            <div class="col col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price"> 
                                                        <span class="price">
                                                        $450.99       </span>

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
                                                            <img src="public/assets\images\products\p26.jpeg" alt="">
                                                        </a>          
                                                    </div><!-- /.image -->

                                                </div><!-- /.product-image -->
                                            </div><!-- /.col -->
                                            <div class="col col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price"> 
                                                        <span class="price">
                                                        $450.99       </span>

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
                                            <div class="col col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price"> 
                                                        <span class="price">
                                                        $450.99       </span>

                                                    </div><!-- /.product-price -->

                                                </div>
                                            </div><!-- /.col -->
                                        </div><!-- /.product-micro-row -->
                                    </div><!-- /.product-micro -->

                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="products special-product">
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
                                            <div class="col col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price"> 
                                                        <span class="price">
                                                        $450.99       </span>

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
                                            <div class="col col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price"> 
                                                        <span class="price">
                                                        $450.99       </span>

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
                                                            <img src="public/assets\images\products\p22.jpeg" alt="">
                                                        </a>          
                                                    </div><!-- /.image -->


                                                </div><!-- /.product-image -->
                                            </div><!-- /.col -->
                                            <div class="col col-xs-7">
                                                <div class="product-info">
                                                    <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="product-price"> 
                                                        <span class="price">
                                                        $450.99       </span>

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
            <!-- ============================================== SPECIAL OFFER : END ============================================== -->
            <!-- ============================================== PRODUCT TAGS ============================================== -->
            
            <!-- ============================================== Testimonials: END ============================================== -->

            
        </div><!-- /.sidemenu-holder -->


@section('scripts')
<script type="text/javascript">

    /*function addTocart(id){
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
                                  timer: 1500,
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
                                loadCart();
                            })()
                            
                        } 
                    });
                }
    }*/

    function getTimeRemaining(endtime) {
              const total = Date.parse(endtime) - Date.parse(new Date());
              const seconds = Math.floor((total / 1000) % 60);
              const minutes = Math.floor((total / 1000 / 60) % 60);
              const hours = Math.floor((total / (1000 * 60 * 60)) % 24);
              const days = Math.floor(total / (1000 * 60 * 60 * 24));
              
              return {
                total,
                days,
                hours,
                minutes,
                seconds
            };
        }

        function initializeClock(id, endtime) {
          const clock = document.getElementById(id);
          const daysSpan = clock.querySelector('.days');
          const hoursSpan = clock.querySelector('.hours');
          const minutesSpan = clock.querySelector('.minute');
          const secondsSpan = clock.querySelector('.second');

          function updateClock() {
            const t = getTimeRemaining(endtime);

            daysSpan.innerHTML = t.days;
            hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
            minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
            secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

            if (t.total <= 0) {
              clearInterval(timeinterval);
          }
      }

      updateClock();
      const timeinterval = setInterval(updateClock, 1000);
  }
  var time = '{{$newformat}}';
  const deadline = new Date(time);
  initializeClock('clockdiv', deadline);
    
</script>
@stop