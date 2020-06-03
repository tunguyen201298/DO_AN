<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1">


    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
        <div class="container">
            <div class="header-top-inner">
                <div class="cnt-account">
                    <ul class="list-unstyled">
                        
                        <li><a href="#"><i class="icon fa fa-heart"></i>Yêu thích</a></li>
                        <li><a href="{{ route('cart-show')}}"><i class="icon fa fa-shopping-cart"></i>Giỏ hàng</a></li>
                        <li><a href="#" id="result"><i class="icon fa fa-check"></i>Thanh toán</a></li>
                    </ul>
                </div><!-- /.cnt-account -->

                <div class="cnt-block">
                    <ul class="list-unstyled list-inline">
                        <li class="dropdown dropdown-small">
                            <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">USD </span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">USD</a></li>
                                <li><a href="#">INR</a></li>
                                <li><a href="#">GBP</a></li>
                            </ul>
                        </li>

                        <li class="dropdown dropdown-small">
                            <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">English </span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">English</a></li>
                                <li><a href="#">French</a></li>
                                <li><a href="#">German</a></li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-small">
                            <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><i class="icon fa fa-user"></i><span class="value">
                                @if(!Auth::check())
                                    My Account
                                @else
                                    {{Auth::user()->name}}
                                @endif
                            </span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                
                                @if(Auth::check())
                                    <li><a href="{{ route('logout') }}"><i class=""></i>Đăng xuất</a></li>
                                @else
                                    <li><a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>Đăng nhập</a></li>
                                    <!-- <li><a href="{{ route('login') }}"><i class=""></i>Register</a></li> -->
                                @endif
                            </ul>
                        </li>
                    </ul><!-- /.list-unstyled -->
                </div><!-- /.cnt-cart -->
                <div class="clearfix"></div>
            </div><!-- /.header-top-inner -->
        </div><!-- /.container -->
    </div><!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                    <!-- ============================================================= LOGO ============================================================= -->
                    <div class="logo">
                        <a href="{{route('home')}}">

                            <img src="{{asset('storage/app/logo/logo.png')}}" alt="Logo">
                        </a>
                    </div><!-- /.logo -->
                    <!-- ============================================================= LOGO : END ============================================================= -->				</div><!-- /.logo-holder -->

                <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
                    <!-- /.contact-row -->
                    <!-- ============================================================= SEARCH AREA ============================================================= -->
                    <div class="search-area">
                        <form action="{{ url('product/search') }}" method="post">
                            <div class="control-group">

                                <ul class="categories-filter animate-dropdown">
                                    <li class="dropdown">

                                        <a class="dropdown-toggle" data-toggle="dropdown" href="category.html">Categories <b class="caret"></b></a>

                                        <ul class="dropdown-menu" role="menu">
                                            <li class="menu-header">Computer</li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Clothing</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Electronics</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Bài viết</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Liên hệ</a></li>

                                        </ul>
                                    </li>
                                </ul>
                                
                                    <input type="text" class="search-field" placeholder="Nhập từ khóa" name="search" id="text_search">
                                    <button class="search-button" type="submit"></button>
                                    {{ csrf_field() }}
                                    <!-- <a class="search-button" href="#" id="search"></a> -->    
                                
                            </div>
                        </form>
                    </div><!-- /.search-area -->
                    <!-- ============================================================= SEARCH AREA : END ============================================================= -->				</div><!-- /.top-search-holder -->

                <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
                    <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

                    <div class="dropdown dropdown-cart">
                        <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
                            <div class="items-cart-inner">
                                <div class="basket">
                                    <i class="glyphicon glyphicon-shopping-cart"></i>
                                </div>
                                <div class="basket-item-count"><span id="itemCount" class="count">{{ $count }}</span></div>
                                <div class="total-price-basket">
                                    <span class="total-price">
                                        <span id="itemValue" class="value">{{ number_format($total).' ₫' }}</span>
                                    </span>
                                </div>


                            </div>
                        </a>
                        <ul id="cartLists" class="dropdown-menu">
                            <li>
                                @foreach($carts as $cart)
                                <div class="cart-item product-summary" >
                                    
                                        <div class="row" style="border: solid 1px #66ad44;border-radius: 5px;margin-bottom: 2px">
                                            <div class="col-xs-4">
                                                <div class="image">
                                                    <a href="{{route('product-details',['id'=>$cart->id])}}"><img src="{{ asset('storage/app/products/'.$cart->options->img) }}" alt=""></a>
                                                </div>
                                            </div>
                                            <div class="col-xs-7">

                                                <h3 class="name"  ><a href="#"><p style="white-space: nowrap;width: 100px;text-overflow: ellipsis;    overflow: hidden;" id="nameProduct"><b>{!! $cart->name !!}</b></p></a></h3>
                                                <div class="price">{{ number_format($cart->price*$cart->qty).' ₫'}}</div>
                                            </div>
                                            <div class="col-xs-1 action">
                                                <a href="#"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </div>
                                   
                                </div><!-- /.cart-item -->
                                 @endforeach
                                <div class="clearfix"></div>
                                <hr>
                                <div class="clearfix cart-total">
                                    <div class="pull-right">

                                        <span class="text">Tỏng cộng :</span><span class='price'>{{ number_format($total).' ₫' }}</span>

                                    </div>
                                    <div class="clearfix"></div>

                                    <a href="{{route('cart-show')}}" class="btn btn-upper btn-primary btn-block m-t-20">Tới giỏ hàng</a>	
                                </div><!-- /.cart-total-->


                            </li>
                        </ul><!-- /.dropdown-menu-->
                    </div><!-- /.dropdown-cart -->

                    <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->				</div><!-- /.top-cart-row -->
            </div><!-- /.row -->

        </div><!-- /.container -->

    </div><!-- /.main-header -->

    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
        <div class="container">
            <div class="yamm navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="nav-bg-class">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">
                            <ul class="nav navbar-nav">
                                <li class="active dropdown yamm-fw">
                                    <a href="{{route('home')}}" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Trang chủ</a>

                                </li>
                                <li class="dropdown yamm mega-menu">
                                    <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Clothing</a>
                                    <ul class="dropdown-menu container">
                                        <li>
                                            <div class="yamm-content ">
                                                <div class="row">

                                                    <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                                        <h2 class="title">Men</h2>
                                                        <ul class="links">
                                                            <li><a href="#">Dresses</a></li>
                                                            <li><a href="#">Shoes </a></li>
                                                            <li><a href="#">Jackets</a></li>
                                                            <li><a href="#">Sunglasses</a></li>
                                                            <li><a href="#">Sport Wear</a></li>
                                                            <li><a href="#">Blazers</a></li>
                                                            <li><a href="#">Shirts</a></li>

                                                        </ul>
                                                    </div><!-- /.col -->

                                                    <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                                        <h2 class="title">Women</h2>
                                                        <ul class="links">
                                                            <li><a href="#">Handbags</a></li>
                                                            <li><a href="#">Jwellery</a></li>
                                                            <li><a href="#">Swimwear </a></li>                   
                                                            <li><a href="#">Tops</a></li>
                                                            <li><a href="#">Flats</a></li>
                                                            <li><a href="#">Shoes</a></li>
                                                            <li><a href="#">Winter Wear</a></li>

                                                        </ul>
                                                    </div><!-- /.col -->

                                                    <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                                        <h2 class="title">Boys</h2>
                                                        <ul class="links">
                                                            <li><a href="#">Toys & Games</a></li>
                                                            <li><a href="#">Jeans</a></li>
                                                            <li><a href="#">Shirts</a></li>
                                                            <li><a href="#">Shoes</a></li>
                                                            <li><a href="#">School Bags</a></li>
                                                            <li><a href="#">Lunch Box</a></li> 
                                                            <li><a href="#">Footwear</a></li>

                                                        </ul>
                                                    </div><!-- /.col -->

                                                    <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                                        <h2 class="title">Girls</h2>
                                                        <ul class="links">
                                                            <li><a href="#">Sandals </a></li> 
                                                            <li><a href="#">Shorts</a></li>
                                                            <li><a href="#">Dresses</a></li>
                                                            <li><a href="#">Jwellery</a></li>
                                                            <li><a href="#">Bags</a></li>
                                                            <li><a href="#">Night Dress</a></li>
                                                            <li><a href="#">Swim Wear</a></li>


                                                        </ul>
                                                    </div><!-- /.col -->


                                                    <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image">
                                                        <img class="img-responsive" src="public/assets\images\banners\top-menu-banner.jpeg" alt="">






                                                    </div><!-- /.yamm-content -->					
                                                </div>
                                            </div>

                                        </li>
                                    </ul>

                                </li>

                                <li class="dropdown mega-menu">
                                    <a href="category.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Electronics
                                        <span class="menu-label hot-menu hidden-xs">hot</span>
                                    </a>
                                    <ul class="dropdown-menu container">
                                        <li>
                                            <div class="yamm-content">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-2 col-menu">
                                                        <h2 class="title">Laptops</h2>
                                                        <ul class="links">
                                                            <li><a href="#">Gaming</a></li>
                                                            <li><a href="#">Laptop Skins</a></li>
                                                            <li><a href="#">Apple</a></li>
                                                            <li><a href="#">Dell</a></li>
                                                            <li><a href="#">Lenovo</a></li>
                                                            <li><a href="#">Microsoft</a></li>
                                                            <li><a href="#">Asus</a></li>
                                                            <li><a href="#">Adapters</a></li>
                                                            <li><a href="#">Batteries</a></li>
                                                            <li><a href="#">Cooling Pads</a></li>
                                                        </ul>
                                                    </div><!-- /.col -->

                                                    <div class="col-xs-12 col-sm-12 col-md-2 col-menu">
                                                        <h2 class="title">Desktops</h2>
                                                        <ul class="links">
                                                            <li><a href="#">Routers & Modems</a></li>
                                                            <li><a href="#">CPUs, Processors</a></li>
                                                            <li><a href="#">PC Gaming Store</a></li>
                                                            <li><a href="#">Graphics Cards</a></li>
                                                            <li><a href="#">Components</a></li>
                                                            <li><a href="#">Webcam</a></li>
                                                            <li><a href="#">Memory (RAM)</a></li>
                                                            <li><a href="#">Motherboards</a></li>
                                                            <li><a href="#">Keyboards</a></li>
                                                            <li><a href="#">Headphones</a></li>
                                                        </ul>
                                                    </div><!-- /.col -->

                                                    <div class="col-xs-12 col-sm-12 col-md-2 col-menu">
                                                        <h2 class="title">Cameras</h2>
                                                        <ul class="links">
                                                            <li><a href="#">Accessories</a></li>
                                                            <li><a href="#">Binoculars</a></li>
                                                            <li><a href="#">Telescopes</a></li>
                                                            <li><a href="#">Camcorders</a></li>
                                                            <li><a href="#">Digital</a></li>
                                                            <li><a href="#">Film Cameras</a></li>
                                                            <li><a href="#">Flashes</a></li>
                                                            <li><a href="#">Lenses</a></li>
                                                            <li><a href="#">Surveillance</a></li>
                                                            <li><a href="#">Tripods</a></li>

                                                        </ul>
                                                    </div><!-- /.col -->
                                                    <div class="col-xs-12 col-sm-12 col-md-2 col-menu">
                                                        <h2 class="title">Mobile Phones</h2>
                                                        <ul class="links">
                                                            <li><a href="#">Apple</a></li>
                                                            <li><a href="#">Samsung</a></li>
                                                            <li><a href="#">Lenovo</a></li>
                                                            <li><a href="#">Motorola</a></li>
                                                            <li><a href="#">LeEco</a></li>
                                                            <li><a href="#">Asus</a></li>
                                                            <li><a href="#">Acer</a></li>
                                                            <li><a href="#">Accessories</a></li>
                                                            <li><a href="#">Headphones</a></li>
                                                            <li><a href="#">Memory Cards</a></li>
                                                        </ul>
                                                    </div>

                                                    <div class="col-xs-12 col-sm-12 col-md-4 col-menu custom-banner">
                                                        <a href="#"><img alt="" src="public/assets\images\banners\banner-side.png"></a>
                                                    </div>
                                                </div><!-- /.row -->
                                            </div><!-- /.yamm-content -->					</li>
                                    </ul>
                                </li>
                                <li class="dropdown hidden-sm">

                                    <a href="category.html">Giới thiệu
                                        <!-- <span class="menu-label new-menu hidden-xs">new</span> -->
                                    </a>
                                </li>

                                <li class="dropdown hidden-sm">
                                    <a href="category.html">Dịch vụ</a>
                                </li>

                                <li class="dropdown">
                                    <a href="{{ route('blogs') }}">Bài viết</a>
                                </li>

                                <li class="dropdown">
                                    <a href="{{ route('contact') }}">Liên hệ</a>
                                </li>
                                
                                <li class="dropdown  navbar-right special-menu">
                                    <a href="#">Todays offer</a>
                                </li>


                            </ul><!-- /.navbar-nav -->
                            <div class="clearfix"></div>				
                        </div><!-- /.nav-outer -->
                    </div><!-- /.navbar-collapse -->


                </div><!-- /.nav-bg-class -->
            </div><!-- /.navbar-default -->
        </div><!-- /.container-class -->

    </div><!-- /.header-nav -->
    <!-- ============================================== NAVBAR : END ============================================== -->

</header>

<!-- ============================================== HEADER : END ============================================== -->

<script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
<script type="text/javascript">
    $('#result').on('click', function() {
        console.log("btn click");
        var carts = '{{Cart::count()}}';
        var user = '{{ !Auth::check()}}';
        if (user){
            Swal.fire('Xin mời đăng nhập')
        }
        else if (carts == 0) {
            Swal.fire('Chưa có sản phẩm nào')
        }else{
            location.href = '{{url("checkout")}}';
        }
        
    });
    /*$('#search').on('click', function() {
        console.log("btn click");
        var text_search = $('input[name="search"]').val();
        if (text_search != "") {
            var url = "{{url('product/search')}}"+'/'+text_search;
            location.href = url;
        }        
    });*/
</script>