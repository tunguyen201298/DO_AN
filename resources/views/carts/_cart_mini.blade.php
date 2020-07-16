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
                                    
                                        <div class="row">
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
                                                <a href="{{route('remove-cart',[ 'rowId' => $cart->rowId])}}"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </div>
                                   
                                </div><!-- /.cart-item -->
                                <div class="clearfix"></div>
                                 @endforeach
                                
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