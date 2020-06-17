@extends('admin.layouts.app')
@section('title', $title)
@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{{url('admin/promotion')}}"><i class="fa fa-dashboard"></i> {{trans('promotion')}}</a></li>
    <li>Thêm mới</li>
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
        {!! Form::open(array('url' => url("admin/promotion/store"), 'id' => 'form-area')) !!}
            @include('admin.promotion._form')
        {!! Form::close() !!}
    </div><!-- /.box-body -->
</div>
@stop