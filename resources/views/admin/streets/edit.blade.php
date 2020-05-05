@extends('admin.layouts.app')
@section('title', $title)
@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> {{trans('common.dashboard')}}</a></li>
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
        {!! Form::open(array('url' => url("admin/streets/update/" . $street->id), 'id' => 'form-street')) !!}
            {!! Form::hidden('id', $street->id) !!}
            @include('admin.streets._form')
        {!! Form::close() !!}
    </div><!-- /.box-body -->
</div>
@stop