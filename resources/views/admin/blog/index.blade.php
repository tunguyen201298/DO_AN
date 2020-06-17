@extends('admin.layouts.app')
@section('title', $title)
@section('breadcrumb')
<script type="text/javascript">
    mn_selected = 'mn_blog';</script>
<ol class="breadcrumb">
    <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> {{trans('Trang chủ')}}</a></li>
    <li>Bài viết</li>
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
                <li><a href="{{url('admin/blog/create')}}" class="btn btn-primary"><i class="fa fa-plus-square"></i> {{trans('Thêm mới')}}</a></li>
                <li><a href="{{url('admin/blog')}}" class="btn btn-default" ><i class="fa fa-refresh"></i> {{trans('Tải lại')}}</a></li>
            </ul>
        </div>
    </div>
    <div class="box-body">
        <div class="box-body table-responsive no-padding">
            <div class="box-search-table pull-right">
                <div class="box-delete_multi pull-left">
                    <a href="javascript:;" id="btn-delete-all" data-routes="/admin/blog/destroy" class="btn btn-danger"><i class="fa fa-trash-o"></i> Xóa tất cả</a>
                </div>
                {!! Form::open(array('url' => url("admin/blog"), 'id' => 'form-search', 'method' => 'GET')) !!}
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
                        <th>{!!sort_title('name',trans('Tiêu đề'))!!}</th>
                        <th>{!!sort_title('is_visible',trans('Trạng thái'))!!}</th>
                        <th class="w_100">{{trans('Thao tác')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!$blogs->isEmpty())
                    @php
                    $no = (($blogs->currentPage() - 1) * $blogs->perPage() + 1) 
                    @endphp
                    @foreach($blogs as $key => $blog)
                    <tr>
                        <td class="text-center "><input type="checkbox" class="checkItem" value="{{$blog->id}}" /></td>
                        <td class="text-center">{{$no++}}</td>
                        <td>{{$blog->title}}</td>
                        <td class="text-center w_100">
                            <input type="checkbox" value="{{$blog->id}}" data-size="mini" data-on-text="Hiện" data-off-text="Ẩn" data-on-color="success" data-off-color="danger" name="is_visible" {{$blog->is_visible?'checked':''}} />
                        </td>
                        <td class="action">
                            <a href="{{url('admin/blog/edit/' . $blog->id)}}" class="btn btn-primary" title="{{trans('Chỉnh sửa')}}"><i class="fa fa-edit"></i></a>
                            <a href="javascript:;" onclick="deleteModal('{{$blog->id}}', '/admin/blog/destroy')" title="{{trans('Xóa')}}" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                            
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
                    <span class="total-record">{!!trans("Tổng cộng: <strong>:total</strong> kết quả", ['total' => $blogs->total()])!!}</span>
                </div>
                <div class="col-sm-6">
                    <div class="pull-right">
                        {{$blogs->appends(Input::all())->render()}}
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
                url: root + '/admin/blog/active', 
                type: 'POST',
                data: {id: $(this).val(), is_visible: is_visible}, 
                success: function (data, success) {

                }
            });
        });
    });
</script>
@stop



