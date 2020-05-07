
@extends('layouts.app')
@section('title', $title)
@section('content')

<div class="container">
    <div class="row ">
        <div class="breadcrumb">
            <div class="container">
                <div class="breadcrumb-inner">
                    <ul class="list-inline list-unstyled">
                        <li><a href="#">Home</a></li>
                        <li class='active'>Shopping Cart</li>
                    </ul>
                </div><!-- /.breadcrumb-inner -->
            </div><!-- /.container -->
        </div><!-- /.breadcrumb -->

        <div class="shopping-cart">
            <div class="shopping-cart-table ">
                <div class="table-responsive">
                    @if($subtotal != 0)
                    <form action="{{ url('cart-update') }}" method="post">
                        {{ csrf_field() }}
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="cart-romove item">Xóa</th>
                                <th class="cart-description item">Hình ảnh</th>
                                <th class="cart-product-name item">Tên sản phẩm</th>
                                <th class="cart-qty item">Số lượng</th>
                                <th class="cart-sub-total item">Giá tiền</th>
                                <th class="cart-total last-item">Thành tiền</th>
                            </tr>
                        </thead><!-- /thead -->
                        
                        <tbody>
                            
                            	@foreach($cart as $item)
                                <tr>
                                    <td class="romove-item"><a href="{{route('remove-cart',[ 'rowId' => $item->rowId])}}" title="cancel" class="icon"><i class="fa fa-trash-o"></i></a></td>
                                    <td class="cart-image">
                                        <a class="entry-thumbnail" href="detail.html">
                                            <img src="{{ asset('storage/app/products/'.$item->options->img) }}" alt="">

                                        </a>
                                    </td>
                                    <td class="cart-product-name-info">
                                        <h4 class='cart-product-description'><a href="detail.html">{{ $item->name}}</a></h4>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="rating rateit-small"></div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="reviews">
                                                    (06 Reviews)
                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                        <div class="cart-product-info">
                                            <span class="product-color">COLOR:<span>Blue</span></span>
                                        </div>
                                    </td>
                                    <td class="cart-product-quantity">
                                        <div class="quant-input">
                                            <div class="arrows">
                                                <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
                                                <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
                                            </div>
                                            <input type="text" value="{{$item->qty}}" name="qty">
                                        </div>
                                    </td>
                                    <td class="cart-product-grand-total"><span class="cart-grand-total-price">{{ number_format($item->price)." ₫" }}</span></td>
                                    <td class="cart-product-grand-total"><span class="cart-grand-total-price">{{ number_format($item->price*$item->qty)." ₫" }}</span></td>
                                    <input type="hidden" name="id" value="{{$item->id}}">
                                </tr>
                                @endforeach

                        </tbody><!-- /tbody -->
                        <tfoot>
                            <tr>
                                <td colspan="7">
                                    <div class="shopping-cart-btn">
                                        <span class="">
                                            <a href="{{ route('home')}}" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
                                            
                                            <button class="btn btn-upper btn-primary pull-right outer-right-xs">Update shopping cart</button>
                                            <a href="{{route('delete-all')}}" class="btn btn-upper btn-primary pull-center outer-right-xs">Delete All shopping cart</a>
                                        </span>
                                    </div><!-- /.shopping-cart-btn -->
                                </td>
                            </tr>
                        </tfoot>
                    </table><!-- /table -->
                    </form>
                    @else
                        {!! $error !!}
                    @endif
                </div>
            </div><!-- /.shopping-cart-table -->				
            <!-- <div class="col-md-4 col-sm-12 estimate-ship-tax">
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                <span class="estimate-title">Estimate shipping and tax</span>
                                <p>Enter your destination to get shipping and tax.</p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label class="info-title control-label">Country <span>*</span></label>
                                    <select class="form-control unicase-form-control selectpicker">
                                        <option>--Select options--</option>
                                        <option>India</option>
                                        <option>SriLanka</option>
                                        <option>united kingdom</option>
                                        <option>saudi arabia</option>
                                        <option>united arab emirates</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="info-title control-label">State/Province <span>*</span></label>
                                    <select class="form-control unicase-form-control selectpicker">
                                        <option>--Select options--</option>
                                        <option>TamilNadu</option>
                                        <option>Kerala</option>
                                        <option>Andhra Pradesh</option>
                                        <option>Karnataka</option>
                                        <option>Madhya Pradesh</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="info-title control-label">Zip/Postal Code</label>
                                    <input type="text" class="form-control unicase-form-control text-input" placeholder="">
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn-upper btn btn-primary">GET A QOUTE</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div> --><!-- /.estimate-ship-tax -->

            <div class="col-md-8 col-sm-12 estimate-ship-tax">
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                <span class="estimate-title">Mã giảm giá</span>
                                <p>Nhập mã phiếu giảm giá nếu có.</p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <input type="text" class="form-control unicase-form-control text-input" placeholder="Mã phiếu">
                                </div>
                                <div class="clearfix pull-right">
                                    <button type="submit" class="btn-upper btn btn-primary">Áp dụng</button>
                                </div>
                            </td>
                        </tr>
                    </tbody><!-- /tbody -->
                </table><!-- /table -->
            </div><!-- /.estimate-ship-tax -->

            <div class="col-md-4 col-sm-12 cart-shopping-total">
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                <div class="cart-sub-total">
                                    Tổng tiền hàng<span class="inner-left-md">{{ $subtotal." ₫" }}</span>
                                </div>
                            </th>
                        </tr>
                    </thead><!-- /thead -->
                    <tbody>
                        <tr>
                            <td>
                                <div class="cart-checkout-btn pull-right">
                                    <form action="{{ url('checkout') }}" method="get">
                                        
                                        <button type="submit" class="btn btn-primary checkout-btn"><b>THANH TOÁN</b></button>
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tbody><!-- /tbody -->
                </table><!-- /table -->
            </div><!-- /.cart-shopping-total -->			</div><!-- /.shopping-cart -->
    </div> <!-- /.row -->
    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
    <div id="brands-carousel" class="logo-slider wow fadeInUp">

        <div class="logo-slider-inner">	
            <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
                <div class="item m-t-15">
                    <a href="#" class="image">
                        <img data-echo="assets/images/brands/brand1.png" src="assets\images\blank.gif" alt="">
                    </a>	
                </div><!--/.item-->

                <div class="item m-t-10">
                    <a href="#" class="image">
                        <img data-echo="assets/images/brands/brand2.png" src="assets\images\blank.gif" alt="">
                    </a>	
                </div><!--/.item-->

                <div class="item">
                    <a href="#" class="image">
                        <img data-echo="assets/images/brands/brand3.png" src="assets\images\blank.gif" alt="">
                    </a>	
                </div><!--/.item-->

                <div class="item">
                    <a href="#" class="image">
                        <img data-echo="assets/images/brands/brand4.png" src="assets\images\blank.gif" alt="">
                    </a>	
                </div><!--/.item-->

                <div class="item">
                    <a href="#" class="image">
                        <img data-echo="assets/images/brands/brand5.png" src="assets\images\blank.gif" alt="">
                    </a>	
                </div><!--/.item-->

                <div class="item">
                    <a href="#" class="image">
                        <img data-echo="assets/images/brands/brand6.png" src="assets\images\blank.gif" alt="">
                    </a>	
                </div><!--/.item-->

                <div class="item">
                    <a href="#" class="image">
                        <img data-echo="assets/images/brands/brand2.png" src="assets\images\blank.gif" alt="">
                    </a>	
                </div><!--/.item-->

                <div class="item">
                    <a href="#" class="image">
                        <img data-echo="assets/images/brands/brand4.png" src="assets\images\blank.gif" alt="">
                    </a>	
                </div><!--/.item-->

                <div class="item">
                    <a href="#" class="image">
                        <img data-echo="assets/images/brands/brand1.png" src="assets\images\blank.gif" alt="">
                    </a>	
                </div><!--/.item-->

                <div class="item">
                    <a href="#" class="image">
                        <img data-echo="assets/images/brands/brand5.png" src="assets\images\blank.gif" alt="">
                    </a>	
                </div><!--/.item-->
            </div><!-- /.owl-carousel #logo-slider -->
        </div><!-- /.logo-slider-inner -->

    </div><!-- /.logo-slider -->
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
    
@stop