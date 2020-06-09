@extends('admin.layouts.app')
@section('title', $title)
@section('breadcrumb')
<script type="text/javascript">
    mn_selected = 'mn_user';</script>
<ol class="breadcrumb">
    <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> {{trans('Trang chủ')}}</a></li>
    <li>Danh sách khu vực</li>
</ol>
@stop
@section('content')
@include('partials._bootstrap_switch')
<div class="box box-primary">
    <div class="box-header with-border">
        <span class="bullet">
            <i class="fa fa-cubes "></i>
        </span>

        <h3 class="box-title">{{$title}}</h3>
        <div class="box-action pull-right">
            <ul class="header-action">
                <li><a href="{{url('admin/user/create')}}" class="btn btn-primary"><i class="fa fa-plus-square"></i> {{trans('Thêm mới')}}</a></li>
                <li><a href="{{url('admin/user')}}" class="btn btn-default" ><i class="fa fa-refresh"></i> {{trans('Tải lại')}}</a></li>
            </ul>
        </div>
    </div>
    <div class="box-body">
        <div class="box-body table-responsive no-padding">
            <div class="box-search-table pull-right">
                <div class="box-delete_multi pull-left">
                    <a href="javascript:;" id="btn-delete-all" data-routes="/admin/user/destroy" class="btn btn-danger"><i class="fa fa-trash-o"></i> Xóa tất cả</a>
                </div>
                {!! Form::open(array('url' => url("admin/user"), 'id' => 'form-search', 'method' => 'GET')) !!}
                <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> {{trans('Tìm kiếm')}}</button>
                {!! Form::text('search', Input::get('search'), array('class' => 'form-control form-inline', 'maxlength' => 50, 'id' => 'input_source', 'placeholder' => trans('Nhập từ khóa'))) !!} 
                {!!Form::hidden("numpaging", Input::get('numpaging'))!!}
                {!!Form::hidden("paging", Input::get('paging'))!!}
                {!! Form::close() !!}
            </div>
            <table id="table-main" class="table table-striped">
                <thead>
                    <tr>
                        <th class="rowCheckAll w_30"><input type="checkbox" id="checkAll" /></th>
                        <th class="w_30">{{trans('STT')}}</th>
                        <th>{!!sort_title('name',trans('Tên'))!!}</th>
                        <th>{!!sort_title('email',trans('Email'))!!}</th>
                        <th>{!!sort_title('name',trans('Vai trò'))!!}</th>
                        <th>{!!sort_title('is_visible',trans('Trạng thái'))!!}</th>
                        <th class="w_100">{{trans('Thao tác')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!$users->isEmpty())
                    @php
                    $no = (($users->currentPage() - 1) * $users->perPage() + 1) 
                    @endphp
                    @foreach($users as $key => $user)
                    <tr>
                        <td class="text-center "><input type="checkbox" class="checkItem" value="{{$user->id}}" /></td>
                        <td class="text-center">{{$no++}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            @if($user->role == 1)
                                {!! 'Quản trị viên' !!}
                            @elseif($user->role == 2)
                                {!! 'Nhân viên bán hàng' !!}
                            @elseif($user->role == 3)
                                {!! 'Nhân viên kho' !!} 
                            @elseif($user->role == 4)
                                {!! 'Khách hàng' !!} 
                            @endif
                        </td>
                        <td class="text-center w_100">
                            <div>
                                <input type="checkbox" value="{{$user->id}}" data-size="mini" data-on-text="Hiện" data-off-text="Ẩn" data-on-color="success" data-off-color="danger" name="is_visible" {{$user->is_visible?'checked':''}} />
                            </div>
                            
                        </td>
                        <td class="action">
                            <a href="{{url('admin/user/edit/' . $user->id)}}" class="btn btn-primary" title="{{trans('Chỉnh sửa')}}"><i class="fa fa-edit"></i></a>
                            <a href="{{url('admin/user/info-user/' . $user->id)}}" class="btn btn-primary" title="{{trans('Chi tiết')}}"><i class="fa fa-list"></i></a>
                            <a href="javascript:;" onclick="deleteModal('{{$user->id}}', '/admin/user/destroy')" title="{{trans('Xóa')}}" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                            
                            
                            
                            
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
            <div class="footer-table">
                <div class="col-sm-6">
                    <span class="total-record">Tổng cộng: <strong>: {{$count}}</strong> kết quả</span>
                </div>
                <div class="col-sm-6">
                    <div class="pull-right">
                        {{$users->appends(Input::all())->render()}}
                    </div>
                    @include("partials.numpaging")
                </div>
            </div>
        </div>
    </div><!-- /.box-body -->
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("[name='is_visible']").bootstrapSwitch();
        $('input[name="is_visible"]').on('switchChange.bootstrapSwitch', function (event, state) {
            var is_visible;
            is_visible = (state == true) ? 1 : 0;
            
            $.ajax({
                url: root + '/admin/user/active', 
                type: 'POST',
                data: {id: $(this).val(), is_visible: is_visible}, 
                success: function (data, success) {

                }
            });
        });
    });
</script>
@stop



