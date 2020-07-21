@extends('admin.layouts.app')
@section('title', $title)
@section('breadcrumb')
<script type="text/javascript">
    mn_selected = 'mn_info';</script>
<ol class="breadcrumb">
    <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> {{trans('Trang chủ')}}</a></li>
    <li>Chi tiết</li>
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
                
                <li><a href="{{url('admin/info-user')}}" class="btn btn-default" ><i class="fa fa-refresh"></i> {{trans('Tải lại')}}</a></li>
            </ul>
        </div>
    </div>
    <div class="box-body">
        <div class="box-body table-responsive no-padding">
            <div class="box-search-table pull-right">               
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Thông tin khách hàng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tên khách hàng: {{$info->name}}</td>
                                </tr>
                                <tr>
                                    <td>Tên đăng nhập: {{$info->username}}</td>
                                </tr>
                                <tr>
                                    <td>Ngày sinh: {{$info->birthdate}}</td>
                                </tr>
                                <tr>
                                    <td>Số điện thoại: {{ "0".$info->phone}}</td>
                                </tr>
                                <tr>
                                    <td>Email: {{$info->email}}</td>
                                </tr>
                                <tr>
                                    <td>Vai trò: 
                                        @if($info->role == 1)
                                            {!! 'Quản trị viên' !!}
                                        @elseif($info->role == 2)
                                            {!! 'Nhân viên bán hàng' !!}
                                        @elseif($info->role == 3)
                                            {!! 'Nhân viên kho' !!} 
                                        @elseif($info->role == 4)
                                            {!! 'Khách hàng' !!} 
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
               </div> 
        <h3>Danh sách địa chỉ nhận hàng</h3>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    
                                    <th class="w_30">{{trans('STT')}}</th>
                                    <th>{!!sort_title('name',trans('Tên người nhận'))!!}</th>
                                    <th>{!!sort_title('phone',trans('Số điện thoại'))!!}</th>
                                    <th>{!!sort_title('email',trans('Email'))!!}</th>
                                    <th>{!!sort_title('street',trans('Địa chỉ'))!!}</th>
                                </tr>
                            </thead> 
                            <tbody>
                                @if(!$bills->isEmpty())
                                @php
                                $no = 1 
                                @endphp
                                @foreach($add as $item)
                                <tr>
                                    
                                    <td class="text-center">{{$no++}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td >
                                        {{$item->street}}
                                    </td>
                                    <td>
                                        {{$info->email}}
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
        <h3>Lịch sử mua hàng</h3>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    
                                    <th class="w_30">{{trans('STT')}}</th>
                                    <th>{!!sort_title('name',trans('Tên người nhận'))!!}</th>
                                    <th>{!!sort_title('name',trans('Ngày đặt'))!!}</th>
                                    <th>{!!sort_title('total',trans('Tổng tiền'))!!}</th>
                                    <th>{!!sort_title('status',trans('Trạng thái'))!!}</th>
                                    <th>{!!sort_title('status',trans('Thao tác'))!!}</th>
                                </tr>
                            </thead> 
                            <tbody>
                                @if(!$bills->isEmpty())
                                @php
                                $no = 1 
                                @endphp
                                @foreach($bills as $key => $bill)
                                <tr>
                                    
                                    <td class="text-center">{{$no++}}</td>
                                    <td>{{$bill->name}}</td>
                                    <td>{{$bill->created_at}}</td>
                                    <td>{{number_format($bill->total)." ₫"}}</td>
                                    <td class="text-center w_100">
                                        {{$bill->status}}
                                    </td>
                                    <td class=" w_200">
                                        <a href="{{url('admin/bill/edit/' . $bill->id)}}" class="btn btn-primary" title="{{trans('Chỉnh sửa')}}"><i class="fa fa-edit"></i></a>
                                        <a href="{{url('admin/bill/invoice/' . $bill->id)}}" class="btn btn-primary" title="{{trans('Chi tiết')}}"><i class="fa fa-list"></i></a>
                                        <a href="javascript:;" onclick="deleteModal('{{$bill->id}}', '/admin/bill/destroy')" title="{{trans('Xóa')}}" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
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
                   
                </div>
            </div>
            
        </div>
            
        </div>
    </div><!-- /.box-body -->
</div>
<!-- <script type="text/javascript">
    $(document).ready(function () {
        $("[name='is_visible']").bootstrapSwitch();
        $('input[name="is_visible"]').on('switchChange.bootstrapSwitch', function (event, state) {
            var is_visible;
            is_visible = (state == true) ? 1 : 0;
            
            $.ajax({
                url: root + '/admin/info/active', 
                type: 'POST',
                data: {id: $(this).val(), is_visible: is_visible}, 
                success: function (data, success) {

                }
            });
        });
    });
</script> -->
@stop



