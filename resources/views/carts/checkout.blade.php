@extends('layouts.app')
@section('title', $title)
@section('content')
<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">
				@include('layouts._breadcrumd')
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
									   <input type="radio"  name="radio" id="radio{{$item->id}}" value="{{$item->id}}" @if($item->default == 1){{'checked="checked"'}}@endif>
									   <span class="checkmark"></span>
									</label>
			                	</li>
			                	@endforeach
		                	</div>
		               
		                	<div class="col-md-4">
		                		<p class="checkout-user"><button type="button" name="default" id="default">Mặt định</button></p>
		                		<p class="checkout-user">
				                		<input  type="submit" name="submit" value="Chỉnh sửa" class="addstreet-none btn-upper btn btn-primary checkout-page-button" onclick="none()"></input>
				                		<div class="addstreet-block" style="display: none">
					                		<button type="button" class="addstreet-none btn-upper btn btn-primary" data-toggle="modal" data-target="#addAddressModal">Thêm mới</button>
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
					    

						<!-- checkout-step-03  -->
					  	<div class="panel panel-default checkout-step-02">
						    <div class="panel-heading">
						      <h4 class="unicase-checkout-title">
						        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseThree">
						       		<span>2</span>Phương thức thanh toán
						        </a>
						      </h4>
						    </div>
						    <div id="collapseThree" class="panel-collapse collapse" style="height: 0px;">
						    	<div class="row">
						    		<div class="col-md-5">
						    			<div class="panel-body">
									      	<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
											  <li>
					                			<label class="add-radio">
					                				<p class="checkout-item2 ">Thanh toán khi nhận hàng</p>
												   <input type="radio"  name="radiopayment" id="radio" value="">
												   <span class="checkmark"></span>
												</label>
						                	</li>
						                	<li>
					                			<label class="add-radio">
					                				<p class="checkout-item2 ">Thanh toán bằng ATM</p>
												   <input type="radio"  name="radiopayment" id="radio1" value="">
												   <span class="checkmark"></span>
												</label>
						                	</li>
											</ul>
									      </div>
									    </div>
						    		</div>
						    	</div>
						      
					  	</div>
					  	<!-- checkout-step-03  -->

						
					</div><!-- /.checkout-steps -->
				</div>
				<div class="col-md-4">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar " id="checkoutdetail">
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
					<li ><p class="checkout-item3">Phí ship :</p><p class="checkout-item3"></p><p class="checkout-item3">{{ number_format($money_ship)." ₫"}}</p></li>
					<li ><p class="checkout-item3">Tổng tiền :</p><p class="checkout-item3"></p><p class="checkout-item3">{{ number_format($total+$money_ship) ." ₫"}}</p></li>
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
					
				</div></div></div></div><!--/.item-->

				<!--/.item-->
				<!--/.item-->
		    <div class="owl-controls clickable"><div class="owl-buttons"><div class="owl-prev"></div><div class="owl-next"></div></div></div></div><!-- /.owl-carousel #logo-slider -->
		</div><!-- /.logo-slider-inner -->
	
</div><!-- /.logo-slider -->
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	
</div><!-- /.container -->
</div>

<!-- Modal -->
<div id="addAddressModal" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thêm mới địa chỉ</h4>
      </div>
      <div class="modal-body">
      	{!! Form::open(['url' => url("add-address"), 'id' => 'form-add-address']) !!}
      	<input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                    <div class="form-group">
            <label class="required" for="input_name">{{trans('Họ và tên')}}</label>
            {!! Form::text('name', null, ['class' => 'form-control', 'maxlength' => 100,  'placeholder' => trans('Họ và tên'),'required']) !!} 
        </div>
         <div class="form-group">
            <label class="required" for="input_phone">{{trans('Số điện thoại')}}</label>
            {!! Form::text('phone', null, ['class' => 'form-control', 'maxlength' => 100,  'placeholder' => trans('Số điện thoại'),'required']) !!} 
        </div>
        <div class="row">
        	<div class="col-sm-9">
        		<div class="form-group">
            <label class="required" for="input_address">{{trans('Địa chỉ')}}</label>
            {!! Form::text('address', null, ['class' => 'form-control', 'id' => 'input_address',   'placeholder' => trans('Vui lòng nhập địa chỉ đúng với nơi nhận'),'required']) !!}
        </div>
        	</div>
        	<div class="col-md-3">
        		<input id="submit" type="button" class="addstreet-none btn-upper btn btn-primary" value="Tìm vị trí" style="margin-top: 22px;">
        	</div>
        </div>
        <div class="row">
        	<div class="col-sm-6">
        		<label class="required" for="input_phone">{{trans('Kinh độ')}}</label>
            {!! Form::text('lng', null, ['class' => 'form-control', 'id' => 'input_lng', 'placeholder' => trans('Kinh độ'), 'readonly' => true]) !!} 
        	</div>
        	<div class="col-sm-6">
        		<label class="required" for="input_phone">{{trans('Vĩ độ')}}</label>
            {!! Form::text('lat', null, ['class' => 'form-control', 'id' => 'input_lat', 'placeholder' => trans('Vĩ độ'), 'readonly' => true]) !!} 
        	</div>
        </div>
        <div class="form-group">
        	<div id="map" style="height: 250px"></div>
        </div>
        <div class="form-group">
        	<button type="submit" class="btn btn-success">Lưu</button>
        </div>
        {!! Form::close() !!}
    
      </div>
    </div>

  </div>
</div>
@stop
@section('scripts')

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBeOyXJmGII1QwjzNsFv2Nu_9Fos9xcWkg&callback=initMap">
    </script>
<script type="text/javascript">

	var map = null;
	var marker = null;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 8,
          center: {lat: -34.397, lng: 150.644}
        });
        var geocoder = new google.maps.Geocoder();

        document.getElementById('submit').addEventListener('click', function() {
          geocodeAddress(geocoder);
        });
      }

      function geocodeAddress(geocoder) {
        var address = document.getElementById('input_address').value;
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {
          	var location = results[0].geometry.location;
            map.setCenter(location);
            map.setZoom(17);

            marker = new google.maps.Marker({
              map: map,
              position: location,
              draggable: true
            });

            google.maps.event.addListener(marker, 'dragend', function() {
            	geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
	                $('#input_lng').val(marker.getPosition().lng());
            		$('#input_lat').val(marker.getPosition().lat());
            		$('#input_address').val(results[0].formatted_address);
	            }
                });
             });

            $('#input_lng').val(location.lng);
            $('#input_lat').val(location.lat);
            
          } else {
            alert('Địa chỉ không chính xác, vui lòng chọn lại! ');
          }
        });
      }

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
	$(document).ready(function(){
		var add_id = $('Input[name="radio"]:checked').val();
		$.ajax({
            url: "{{url('checked-address-default')}}",
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {add_id:add_id},
            success: function(data) {
               
	            setTimeout(function(){
                	location.reload();
	            }, 500)
	            
            }
        });
	});
   $('#default').on('click', function() {
   		var address_id = $('Input[name="radio"]:checked').val();
   		$.ajax({
            url: "{{url('update-address-default')}}",
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {address_id:address_id},
            success: function(data) {
               (async () => {
	                const Toast = Swal.mixin({
	                  toast: true,
	                  position: 'top-end',
	                  showConfirmButton: false,
	                  timer: 500,
	                  timerProgressBar: true,
	                  onOpen: (toast) => {
	                    toast.addEventListener('mouseenter', Swal.stopTimer)
	                    toast.addEventListener('mouseleave', Swal.resumeTimer)
	                  }
	                })

	                Toast.fire({
	                  icon: 'success',
	                  title: 'Đặt mặt định thành công'
	                })
	            })()
	            setTimeout(function(){
                	location.reload();
	            }, 500)
	            
            }
        });
		 
    });

    var formAddAddress = '#form-add-address';

    $(formAddAddress).submit(function(e){
    	e.preventDefault();
        //get the action-url of the form
        var actionurl = e.currentTarget.action;
        //do your own request an handle the results
        $.ajax({
            url: actionurl,
            type: 'POST',
            data: $(formAddAddress).serialize(),
            success: function(data) {
               location.reload();
            }
        });
    });

 
    	
	$('#checkout').on('click', function() {
		var radioValue = $("input[name='radio']:checked").val();

            if(radioValue){
                var url = "{{url('success-post')}}"+'/'+radioValue;
                location.href = url;
                
            }
	});
</script>
@stop