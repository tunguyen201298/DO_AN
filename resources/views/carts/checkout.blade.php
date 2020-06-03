@extends('layouts.app')
@section('title', $title)
@section('content')
<style type="text/css">
	 body {
  	font-family: "Open Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", Helvetica, Arial, sans-serif; 
	}
	tr:hover{
		background: #f5f5f5;
	}
/* The container */
.add-radio {
  display: block;
  position: relative;
  padding-left: 25px;
  cursor: pointer;
  font-size: 13px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default radio button */
.add-radio input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 12px;
  width: 12px;
  background-color: #eee;
  border-radius: 50%;
  margin-top: 4px;
}

/* On mouse-over, add a grey background color */
.add-radio:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.add-radio input:checked ~ .checkmark {
  background-color: #66ad44;
  margin-top: 2px;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.add-radio input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.add-radio .checkmark:after {
 	top: 4px;
	left: 4px;
	width: 4px;
	height: 4px;
	border-radius: 50%;
	background: white;
}
</style>
<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">
				<div class="col-md-8">
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->
<div class="panel panel-default checkout-step-01">

	<!-- panel-heading -->
		<div class="panel-heading">
    	<h4 class="unicase-checkout-title">
	        <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
	          <span>1</span>Địa chỉ nhận hàng
	        </a>
	     </h4>
    </div>
    <!-- panel-heading -->

	<div id="collapseOne" class="panel-collapse collapse in" style="">

		<!-- panel-body  -->
	    <div class="panel-body">
                	<ul class="nav nav-checkout-progress list-unstyled">
                		<div class="row">
                		
                			<div class="col-md-8">

                				@foreach($add as $item)
		                		<li>
		                			<label class="add-radio">
		                				<p class="checkout-item2 "><b>{{$item->name}}</b>{{' ( 0' .$item->phone.','.$item->street. ')'}}</p>
									   <input type="radio" checked="checked" name="radio" value="{{$item->id}}">
									   <span class="checkmark"></span>
									</label>
			                	</li>
			                	@endforeach
		                	</div>
		               
		                	<div class="col-md-4">
		                		<p class="checkout-user"><a href="" >Mặt định</a></p>
		                		<p class="checkout-user">
				                		<input  type="submit" name="submit" value="Chỉnh sửa" class="addstreet-none btn-upper btn btn-primary checkout-page-button" onclick="none()"></input>
				                		<div class="addstreet-block" style="display: none">
					                		<input  type="submit" name="submit" class="btn-upper btn btn-primary checkout-page-button" id="addstreet"
					                		value="Thêm mới"  onclick="block()"></input>
					                		<a href="#" id="setting" class="btn-upper btn btn-primary checkout-page-button" >Sửa</a>
				                		</div>
				                	</p>
		                	</div>
		                </div>
                	</ul>
                	
		</div>
		<!-- panel-body  -->

	</div><!-- row -->
</div>
<!-- checkout-step-01  -->
					    <!-- checkout-step-02  -->
					  	<div class="panel panel-default checkout-step-02">
						    <div class="panel-heading">
						      <h4 class="unicase-checkout-title">
						        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseTwo">
						          <span>2</span>Sản phẩm
						        </a>
						      </h4>
						    </div>
						    <div id="collapseTwo" class="panel-collapse collapse" style="height: 0px;">
						      <div class="panel-body">
						      	
							
						      </div>
						    </div>
					  	</div>
					  	<!-- checkout-step-02  -->

						<!-- checkout-step-03  -->
					  	<div class="panel panel-default checkout-step-03">
						    <div class="panel-heading">
						      <h4 class="unicase-checkout-title">
						        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseThree">
						       		<span>3</span>Phương thức thanh toán
						        </a>
						      </h4>
						    </div>
						    <div id="collapseThree" class="panel-collapse collapse" style="height: 0px;">
						      <div class="panel-body">
						      	<span>Thanh toán khi nhận hàng</span>
						      	<span>Thanh toán bằng thẻ</span>
						      </div>
						    </div>
					  	</div>
					  	<!-- checkout-step-03  -->

						
					</div><!-- /.checkout-steps -->
				</div>
				<div class="col-md-4">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">Đơn hàng của bạn</h4>
		    </div>
		     <div class="">
				<ul class="nav nav-checkout-progress list-unstyled">
					<li class="checkout-item1"><h5 class="unicase-checkout-title"><b>SẢN PHẨM</b></h5></li>
					<li class="checkout-item2"><h5 class="unicase-checkout-title"><b>THÀNH TIỀN</b></h5></li>
				</ul>	
			</div>
			<hr>
		    <div class="">
				<ul class="nav nav-checkout-progress list-unstyled">
					@foreach($cart as $item)
					<li ><p class="checkout-item3">{{ $item->name }}</p><p class="checkout-item3">{{ "x ".$item->qty}}</p><p class="checkout-item3">{{ number_format($item->qty*$item->price)." ₫"}}</p></li>
					@endforeach
					<hr>
					<li ><p class="checkout-item3">Tổng tiền :</p><p class="checkout-item3"></p><p class="checkout-item3">{{ Cart::subtotal()." ₫"}}</p></li>
				</ul>		
			</div>
		</div>
	</div>
	<form action="{{ url('success-post')}}" method="post">
		{{ csrf_field() }}
		<a href="#" class="btn-upper btn btn-primary checkout-page-button" style="margin-left: 240px" id="checkout">Thanh toán</a>
	</form>
</div> 
<!-- checkout-progress-sidebar -->				</div>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
<div id="brands-carousel" class="logo-slider wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">

		<div class="logo-slider-inner">	
			<div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme" style="opacity: 1; display: block;">
				<div class="owl-wrapper-outer"><div class="owl-wrapper" style="width: 3800px; left: 0px; display: block;"><div class="owl-item" style="width: 190px;"><div class="item m-t-15">
					<a href="#" class="image">
						<img src="assets/images/brands/brand1.png" alt="">
					</a>	
				</div></div><div class="owl-item" style="width: 190px;"><div class="item m-t-10">
					<a href="#" class="image">
						<img src="assets/images/brands/brand2.png" alt="">
					</a>	
				</div></div><div class="owl-item" style="width: 190px;"><div class="item">
					<a href="#" class="image">
						<img src="assets/images/brands/brand3.png" alt="">
					</a>	
				</div></div><div class="owl-item" style="width: 190px;"><div class="item">
					<a href="#" class="image">
						<img src="assets/images/brands/brand4.png" alt="">
					</a>	
				</div></div><div class="owl-item" style="width: 190px;"><div class="item">
					<a href="#" class="image">
						<img src="assets/images/brands/brand5.png" alt="">
					</a>	
				</div></div><div class="owl-item" style="width: 190px;"><div class="item">
					<a href="#" class="image">
						<img src="assets/images/brands/brand6.png" alt="">
					</a>	
				</div></div><div class="owl-item" style="width: 190px;"><div class="item">
					<a href="#" class="image">
						<img src="assets/images/brands/brand2.png" alt="">
					</a>	
				</div></div><div class="owl-item" style="width: 190px;"><div class="item">
					<a href="#" class="image">
						<img src="assets/images/brands/brand4.png" alt="">
					</a>	
				</div></div><div class="owl-item" style="width: 190px;"><div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand1.png" src="assets\images\blank.gif" alt="">
					</a>	
				</div></div><div class="owl-item" style="width: 190px;"><div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand5.png" src="assets\images\blank.gif" alt="">
					</a>	
				</div></div></div></div><!--/.item-->

				<!--/.item-->
				<!--/.item-->
		    <div class="owl-controls clickable"><div class="owl-buttons"><div class="owl-prev"></div><div class="owl-next"></div></div></div></div><!-- /.owl-carousel #logo-slider -->
		</div><!-- /.logo-slider-inner -->
	
</div><!-- /.logo-slider -->
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
<script type="text/javascript">
	function none() {
	  var x = document.getElementsByClassName("addstreet-none");
	  x[0].style.display = "none";
	  var y = document.getElementsByClassName("addstreet-block");
	  y[0].style.display = "block";
	}
	function block() {
	  var x = document.getElementsByClassName("addstreet-block");
	  x[0].style.display = "block";
	}

   /*$('#setting').on('click', function() {
		 Swal.fire({
		  icon: 'success',
		  title: 'Thanh toán thành công',
		  showConfirmButton: false,
		  timer: 1500
		})
		setTimeout(function(){
		    var radioValue = $("input[name='radio']:checked").val();

            if(radioValue){
            	var url = "{{url('success')}}"+'/'+radioValue;
                location.href = url;
            }
		}, 1500);
    });*/
    $('#addstreet').on('click', function() {
    	var user = '{{ $user = Auth::user()}}';
        var id = '{{$id_cus = $user->id }}';
		(async () => {

			const { value: formValues } = await Swal.fire({
			  title: 'Thêm địa chỉ mới',
			  html:
			    '<input id="name" name="name" class="swal2-input" placeholder="Họ & tên">' +
			    '<input id="phone" class="swal2-input" placeholder="Số điện thoại">' +
			    '<input id="street" class="swal2-input" placeholder=" Địa chỉ">',
			  focusConfirm: false,
			  preConfirm: () => {
			     document.getElementById('name').value,
			      document.getElementById('phone').value,
			      document.getElementById('street').value,
			      id
			  }
			})

			if (formValues) {
				var name = document.getElementById('name').value;
				var phone = document.getElementById('phone').value;
			    var street = document.getElementById('street').value;
				$.ajax({
		            url:"{{url('add-address')}}",
		            data:{id: id, name:name, phone:phone,street:street},
		            type: 'POST',
		            headers: {
		                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		            },
		            success:function(response){
		            	var urls = "{{url('checkout')}}"
		                console.log(response);
		                
		                Swal.fire({
						  icon: 'success',
						  title: 'Thêm thành công',
						  showConfirmButton: false,
						  timer: 1500
						})
		                setTimeout(function(){
		                	window.location.href = urls
		                }, 1500)
		            } 
		        });
			  //Swal.fire(JSON.stringify(formValues))
			}

			

		})()
	
		
	});
    	
	$('#checkout').on('click', function() {
		var radioValue = $("input[name='radio']:checked").val();

            if(radioValue){
            	/*var url = "{{url('success')}}"+'/'+radioValue;
                location.href = url;*/
                var url = "{{url('success-post')}}"+'/'+radioValue;
                location.href = url;
                
            }
	});
</script>
@stop