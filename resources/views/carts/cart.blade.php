
@extends('layouts.app')
@section('title', $title)
@section('content')

<div class="container">
    <div class="row ">
        @include('layouts._breadcrumd')

        <div class="shopping-cart">
            <div class="shopping-cart-table ">
                <div class="table-responsive">
                    @if($subtotal != 0)
                    <!-- <form action="{{ url('cart-update') }}" method="post"> -->
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
                                                <div class="rating rateit-small"  data-rateit-value="{{$start_review->startReview($item->id)}}"></div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="reviews">
                                                    ({{App\Models\Review::where('product_id', $item->id)->count()}} Bình luận)
                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                    </td>
                                    <td class="cart-product-quantity">
                                        <div class="quant-input">
                                            
                                            <input type="number" value="{{$item->qty}}" name="qty" id="update{{$item->id}}" min="1" max="10" >
                                        </div>
                                    </td>
                                    <td class="cart-product-grand-total"><span class="cart-grand-total-price" >{{ number_format($item->price)." ₫" }}</span></td>
                                    <td class="cart-product-grand-total"><span class="cart-grand-total-price" id="subtotal{{$item->id}}">{{ number_format($item->price*$item->qty)." ₫" }}</span></td>
                                    <input type="hidden" name="id" value="{{$item->id}}">
                                    <input type="hidden" name="rowId" value="{{$item->rowId}}" id="rowId{{$item->id}}">
                                </tr>
                                @endforeach

                        </tbody><!-- /tbody -->
                        <tfoot>
                            <tr>
                                <td colspan="7">
                                    <div class="shopping-cart-btn">
                                        <span class="">
                                            <a href="{{ route('home')}}" class="btn btn-upper btn-primary pull-right outer-right-xs">Tiếp tục mua hàng</a>
                                            <a href="{{route('delete-all')}}" class="btn btn-upper btn-primary pull-center outer-right-xs">Xóa hết giỏ hàng</a>
                                        </span>
                                    </div><!-- /.shopping-cart-btn -->
                                </td>
                            </tr>
                        </tfoot>
                    </table><!-- /table -->
                    <!-- </form> -->
                    @else
                        <h3 style="color: #777777"><b>Giỏ hàng rỗng</b></h3><br>
                        <a href="{{route('home')}}" class="btn-upper btn btn-primary">TIẾP TỤC MUA HÀNG</a>
                        
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
                
            </div><!-- /.estimate-ship-tax -->

            <div class="col-md-4 col-sm-12 cart-shopping-total">
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                <div class="cart-sub-total">
                                    Thành tiền:<span class="inner-left-md" id="total">{{ $subtotal ." ₫" }}</span>
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
                
            </div><!-- /.owl-carousel #logo-slider -->
        </div><!-- /.logo-slider-inner -->

    </div><!-- /.logo-slider -->
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->


@stop
@section('scripts')
<script>
        Number.prototype.formatMoney = function(decPlaces, thouSeparator, decSeparator) {
        var n = this,
            decPlaces = isNaN(decPlaces = Math.abs(decPlaces)) ? 2 : decPlaces,
            decSeparator = decSeparator == undefined ? "." : decSeparator,
            thouSeparator = thouSeparator == undefined ? "," : thouSeparator,
            sign = n < 0 ? "-" : "",
            i = parseInt(n = Math.abs(+n || 0).toFixed(decPlaces)) + "",
            j = (j = i.length) > 3 ? j % 3 : 0;
        return sign + (j ? i.substr(0, j) + thouSeparator : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thouSeparator) + (decPlaces ? decSeparator + Math.abs(n - i).toFixed(decPlaces).slice(2) : "");
    };
    $(document).ready(function(){
        @foreach($cart as $item)
            $("#update{{$item->id}}").on('change keyup', function(){
                //var price = {{$item->price}};
                var newQty = $("#update{{$item->id}}").val();
                var rowId = $("#rowId{{$item->id}}").val();
                $.ajax({
                    url:"{{url('cart-update')}}",
                    data:{rowId: rowId, newQty: newQty},
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success:function(response){
                        console.log(response);
                        $("#update{{$item->id}}").val(response.data.qty);
                        var myMoney=response.data.qty*response.data.price;
                        var formattedMoney = myMoney.formatMoney(0,',',',')+" ₫";
                        $("#subtotal{{$item->id}}").text(formattedMoney);
                        $("#total").text(response.total) ;  

                    } 
                });
            });
        @endforeach
    });
</script>
@stop