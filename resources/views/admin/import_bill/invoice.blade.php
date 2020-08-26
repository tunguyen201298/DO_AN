@extends('admin.layouts.app')
@section('title', $title)
@section('breadcrumb')
<script type="text/javascript">
    mn_selected = 'mn_invoice';</script>
<ol class="breadcrumb">
    <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> {{trans('Trang chủ')}}</a></li>
    <li>Chi tiết phiếu nhập</li>
</ol>
@stop
@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <span class="bullet">
            <i class="fa fa-cubes "></i>
        </span>

        <h3 class="box-title">{{$title}}</h3>
        <div class="box-action pull-right">
            <ul class="header-action">
                
                <li><a href="{{url('admin/invoice')}}" class="btn btn-default" ><i class="fa fa-refresh"></i> {{trans('Tải lại')}}</a></li>
                <li><a href="{{url('admin/bill')}}" class="btn btn-default"><i class="fa fa-reply"></i> {{trans('Trở lại')}}</a></li>
            </ul>
        </div>
    </div>
    <div class="box-body">
        <div class="box-body table-responsive no-padding">
            
            <div class="row">
               <div class="col-sm-5">
                    <div class="form-group">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Thông tin khách hàng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tên khách hàng: {{ $customer->name }}</td>
                                </tr>
                                <tr>
                                    <td>Ngày sinh: {{ $customer->birthdate }}</td>
                                </tr>
                                <tr>
                                    <td>Số điện thoại: {{"0".$customer->phone }}</td>
                                </tr>
                                <tr>
                                    <td>Email: {{ $customer->email }}</td>
                                </tr>
                                <tr>
                                    <td>Địa chỉ: {{ $customer->address }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
               </div> 
               <div class="col-sm-7">
                    <div class="form-group">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Thông tin giao hàng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tên người nhận: {{ $bills->name }}</td>
                                </tr>
                                <tr>
                                    <td>Số điện thoại: {{ "0".$bills->phone }}</td>
                                </tr>
                                <tr>
                                    <td>Địa chỉ: {{ $bills->address }}</td>
                                </tr>
                                <tr>
                                    <td>Ghi chú: Thanh toán khi nhận hàng </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
               </div> 
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Thông tin giao hàng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <label for="input_area_name">{{trans('Tình trạng đơn hàng')}}</label>
                                        {!! Form::select('status', $status, trans('-- Tình trạng đơn hàng --'), array('class' => 'form-control', 'id' => 'input_status','placeholder' => $status_bill )) !!}
                                    </td>
                                    
                                </tr>

                            </tbody>
                        </table>
                         <div class="form-group">
                            <form action="{{url('admin/bill/update-status')}}"  id="form-supplier" method="post">
                                <input type="hidden" name="id" value="{{$bills->id}}">
                                <input type="hidden" name="id_status" value="{{$status_id}}">
                                <button class="btn btn-primary" type="submit" id="btn_update"><i class="fa fa-save"></i> {{trans('Cập nhật')}}</button>
                                {{ csrf_field() }}
                            </form>
                        </div>           
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    
                                    <th class="w_30">{{trans('STT')}}</th>
                                    <th>{!!sort_title('name',trans('Tên'))!!}</th>
                                    <th>{!!sort_title('price',trans('Đơn giá'))!!}</th>
                                    <th>{!!sort_title('qty',trans('Số lượng'))!!}</th>
                                    <th class="w_120">{{trans('Thành tiền')}}</th>
                                </tr>
                            </thead> 
                            <tbody>
                                @if(!$invoice->isEmpty())
                                @php
                                $no = 1
                                @endphp
                                @foreach($invoice as $key => $invoice)
                                <tr>
                                    
                                    <td class="text-center">{{$no++}}</td>
                                    <td>{{$invoice->product->name}}</td>
                                    <td>{{number_format($invoice->product->price)." ₫"}}</td>
                                    <td class="text-center w_100">
                                        {{$invoice->quantity}}
                                    </td>
                                    <td class="action">
                                        {{number_format($invoice->total)." ₫"}}
                                    </td>
                                </tr>

                                @endforeach
                                
                                @else 
                                <tr>
                                    <td colspan="6">{{trans('Không có dữ liệu')}}</td>
                                </tr>
                                @endif

                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
            <div class="footer-table">
                <div class="col-sm-12" >
                    <span class="total-record"><strong>Tổng tiền: </strong> {{number_format($bills->total)." ₫"}}</span>
                </div>
            </div>
        </div>
    </div><!-- /.box-body -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
<script type="text/javascript">
    /*$('#input_status').on('change', function(){
        $('#btn_update').on('click', function() {
            var id_status = $('#input_status').val()
            var id_bill = $('input[name="id"]').val()
            $.ajax({
                url:"{{url('admin/bill/update-status')}}",
                data:{id_status: id_status, id_bill: id_bill},
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(response){
                    
                } 
            });
        });
    });*/
</script>
@stop



