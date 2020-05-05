@extends('admin.layouts.app')
@section('title', $title)
@section('breadcrumb')
<script type="text/javascript">
    mn_selected = 'mn_priceRange';</script>
<ol class="breadcrumb">
    <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> {{__('Trang chủ')}}</a></li>
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
                <li><a href="{{url('admin/price-ranges/create')}}" class="btn btn-primary"><i class="fa fa-plus-square"></i> {{__('Thêm mới')}}</a></li>
                <li><a href="{{url('admin/price-ranges')}}" class="btn btn-default" ><i class="fa fa-refresh"></i> {{__('Tải lại')}}</a></li>
            </ul>
        </div>
    </div>
    <div class="box-body">
        <div class="box-body table-responsive no-padding">
            <div class="box-search-table pull-right">
                <div class="box-delete_multi pull-left">
                    <a href="javascript:;" id="btn-delete-all" data-routes="/admin/price-ranges/destroy" class="btn btn-danger"><i class="fa fa-trash-o"></i> Xóa tất cả</a>
                </div>
                {!! Form::open(array('url' => url("admin/price-ranges"), 'id' => 'form-search', 'method' => 'GET')) !!}
                <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> {{__('Tìm kiếm')}}</button>
                {!! Form::text('search', Input::get('search'), array('class' => 'form-control form-inline', 'maxlength' => 50, 'id' => 'input_source', 'placeholder' => __('Nhập từ khóa'))) !!} 
                {!!Form::hidden("numpaging", Input::get('numpaging'))!!}
                {!!Form::hidden("paging", Input::get('paging'))!!}
                {!! Form::close() !!}
            </div>
            <table id="table-main" class="table table-striped">
                <thead>
                    <tr>
                        <th class="rowCheckAll w_30"><input type="checkbox" id="checkAll" /></th>
                        <th class="w_30">{{__('STT')}}</th>
                        <th>{!!sort_title('name',__('Tên'))!!}</th>
                        <th>{!!sort_title('is_visible',__('Trạng thái'))!!}</th>
                        <th class="w_100">{{__('Thao tác')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!$priceRanges->isEmpty())
                    @php
                    $no = (($priceRanges->currentPage() - 1) * $priceRanges->perPage() + 1) 
                    @endphp
                    @foreach($priceRanges as $key => $priceRange)
                    <tr>
                        <td class="text-center "><input type="checkbox" class="checkItem" value="{{$priceRange->id}}" /></td>
                        <td class="text-center">{{$no++}}</td>
                        <td>{{$priceRange->name}}</td>
                        <td class="text-center w_100">
                            <input type="checkbox" value="{{$priceRange->id}}" data-size="mini" data-on-text="Hiện" data-off-text="Ẩn" data-on-color="success" data-off-color="danger" name="is_visible" {{$priceRange->is_visible?'checked':''}} />
                        </td>
                        <td class="action">
                            <a href="{{url('admin/price-ranges/edit/' . $priceRange->id)}}" class="btn btn-primary" title="{{trans('common.edit')}}"><i class="fa fa-edit"></i></a>
                            <a href="javascript:;" onclick="deleteModal('{{$priceRange->id}}', '/admin/price-ranges/destroy')" title="{{trans('common.delete')}}" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    @else 
                    <tr>
                        <td colspan="6">{{__('Không có dữ liệu')}}</td>
                    </tr>
                    @endif
                </tbody>
            </table>
            <div class="footer-table">
                <div class="col-sm-6">
                    <span class="total-record">{!!__("Tổng cộng: <strong>:total</strong> kết quả", ['total' => $priceRanges->total()])!!}</span>
                </div>
                <div class="col-sm-6">
                    <div class="pull-right">
                        {{$priceRanges->appends(Input::all())->render()}}
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
                url: root + '/admin/price-ranges/active', 
                type: 'POST',
                data: {id: $(this).val(), is_visible: is_visible}, 
                success: function (data, success) {

                }
            });
        });
    });
</script>
@stop



