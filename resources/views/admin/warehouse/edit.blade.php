@extends('admin.layouts.app')
@section('title', $title)
@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> {{trans('Sản phẩm')}}</a></li>
    <li>Cập nhật</li>
</ol>
@stop
@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <span class="bullet">
            <i class="fa fa-cubes "></i>
        </span>
        <h3 class="box-title">{{$title}}</h3>
    </div>
    <div class="box-body">
        <!-- form start -->
        {!! Form::open(['url' => url("admin/product/update/" . $area->id), 'id' => 'form-area', 'enctype' => 'multipart/form-data']) !!}
            {!! Form::hidden('id', $area->id) !!}
            @include('admin.areas._form')
        {!! Form::close() !!}
    </div><!-- /.box-body -->
</div>
@stop