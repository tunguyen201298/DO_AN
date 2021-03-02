@extends('layouts.app')
@section('title', $title)
@section('content')
    <link href="{{ asset('/public/css/user.css') }}" rel="stylesheet">
    <div class="container">
        <div class="row ">
            @include('layouts._breadcrumd')
            <div class="container emp-profile">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="profile-img">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog"
                                    alt="" />
                                
                            </div>
                        </div>
                        <div class="col-md-6 border-right">
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <h4 class="text-left">Đổi mật khẩu</h4>
                                        </div>
                                        <div class="col-md-3">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12 form-group">
                                        <label class="labels">Mật khẩu cũ</label>
                                        <input type="password" class="form-control" name="password" onblur="checkPassword()"  placeholder="Mật khẩu cũ" id="password">
                                        <span class="help-block" id="help-block" style="color: red"></span>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label class="labels">Mật khẩu mới</label>
                                        <input type="password" class="form-control" name="password_new" placeholder="Mật khẩu mới">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label class="labels">Nhập lại</label>
                                        <input type="password" class="form-control" name="password_confirm" placeholder="Nhập lại">
                                    </div>
                                </div>
                                <div class="mt-5 text-right">
                                    <button class="btn btn-primary profile-button" type="submit" disabled='true'>Đổi mật khẩu</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div><!-- /.row -->
    </div> <!-- /.container -->

@stop
