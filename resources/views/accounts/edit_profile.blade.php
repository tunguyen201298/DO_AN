@extends('layouts.app')
@section('title', $title)
@section('content')
    <link href="{{ asset('/public/css/user.css') }}" rel="stylesheet">
    <div class="container">
        <div class="row ">
            @include('layouts._breadcrumd')
            <div class="container emp-profile">
                <div class="row">
                    <form action="{{ url('user/update-profile') }}" method="post">
                        <div class="col-md-4 border-right profile-img">
                            <div class="text-center">
                                <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png"
                                    class="avatar img-circle img-thumbnail" alt="avatar">
                                <input type="file" class="text-center center-block file-upload">
                            </div>
                            <hr><br>
                        </div>
                        <div class="col-md-8 border-right">
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <h4 class="text-left">Chỉnh sửa thông tin</h4>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="{{ url('user/change-password') }}" class="profile-edit-btn">Đổi mật khẩu</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6 form-group">
                                        <label class="labels">Tên</label>
                                        <input type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="Tên">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label class="labels">Số điện thoại</label>
                                        <input type="text" class="form-control" name="phone" value="{{ '0'.$user->phone }}" placeholder="Số điện thoại">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12 form-group">
                                        <label class="labels">Email</label>
                                        <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="Email">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label class="labels">Ngày sinh</label>
                                        <input type="text" class="form-control input--style-1 js-datepicker" name="birthdate" value="{{ $user->birthdate }}" >
                                    </div>
                                </div>
                                <div class="mt-5 text-right">
                                    <button class="btn btn-primary profile-button" type="submit">Lưu thay đổi</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
