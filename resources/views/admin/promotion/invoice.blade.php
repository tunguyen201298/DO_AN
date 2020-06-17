@extends('admin.layouts.app')
@section('title', $title)
@section('breadcrumb')
<script type="text/javascript">
    mn_selected = 'mn_invoice';</script>
<ol class="breadcrumb">
    <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> {{trans('Trang chủ')}}</a></li>
    <li>Chi tiết hóa đơn</li>
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
                                    <td>{{$invoice->product_name}}</td>
                                    <td>{{number_format($invoice->price)." ₫"}}</td>
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
<!-- <script type="text/javascript">
    $(document).ready(function () {
        $("[name='is_visible']").bootstrapSwitch();
        $('input[name="is_visible"]').on('switchChange.bootstrapSwitch', function (event, state) {
            var is_visible;
            is_visible = (state == true) ? 1 : 0;
            
            $.ajax({
                url: root + '/admin/invoices/active', 
                type: 'POST',
                data: {id: $(this).val(), is_visible: is_visible}, 
                success: function (data, success) {

                }
            });
        });
    });
</script> -->
@stop



