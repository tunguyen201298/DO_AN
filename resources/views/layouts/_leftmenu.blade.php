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

            
            <!-- ============================================== SPECIAL OFFER : END ============================================== -->
            <!-- ============================================== PRODUCT TAGS ============================================== -->
            
            <!-- ============================================== Testimonials: END ============================================== -->

            
        </div><!-- /.sidemenu-holder -->


