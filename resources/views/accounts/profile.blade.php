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
                        <div class="col-md-6">
                            <div class="profile-head">
                                <h5>
                                    {{$user->name}}
                                </h5>
                                <h6>
                                    {{ 'Email: '.$user->email }}
                                </h6>
                                <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                            aria-controls="home " aria-selected="true">Danh sách địa chỉ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                            aria-controls="profile" aria-selected="false">Đơn hàng đã đặt</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('edit-profile') }}" class="profile-edit-btn" name="btnAddMore">Chỉnh sửa</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="profile-work">
                                <h4><b>THÔNG TIN NGƯỜI DÙNG</b></h4>
                                <a href="">Username: {{ $user->email }}</a><br />
                                <a href="">Ngày sinh: {{ $user->birthdate }}</a><br />
                                <a href="">Số điên thoại: {{'0'.$user->phone}}</a>
                                
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="tab-content profile-tab" id="myTabContent">
                                <div class="tab-pane fade in active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    
                                    <div class="row">
                                        <table class="table">
                                            <thead class="thead-inverse">
                                              <tr>
                                                <th>Mặc định</th>
                                                <th>Tên</th>
                                                <th>Địa chỉ</th>
                                                <th>Số điện thoại</th>
                                                <th></th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($user->addresse as $item)
                                              <tr>
                                                <th scope="row">
                                                    <input type="radio" name="default" onChange="updateDefaultAddress({{$item->id}})" {{ $item->default == 1 ? 'checked' : '' }} value="{{$item->id}}"/>
                                                </th>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->street }}</td>
                                                <td>{{ $item->phone }}</td>
                                                <td><a href="">Thay đổi</a></td>
                                              </tr>
                                            </tbody>
                                            @endforeach
                                          </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="row">
                                        <table class="table">
                                            <thead class="thead-inverse">
                                              <tr>
                                                <th>Mã đơn hàng</th>
                                                <th>Ngày đặt</th>
                                                <th>Sản phẩm</th>
                                                <th>Tổng cộng</th>
                                                <th></th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($user->bill as $item)
                                                <tr>
                                                    <th scope="row">
                                                        <a href="{{route('success-view',['id'=>$item->id]) }}">
                                                            <p>{{ $item->id }}</p>
                                                        </a>
                                                    </th>
                                                    <td>{!! formatDateBill($item->created_at) !!}</td>
                                                    <td>
                                                        @foreach($item->invoiceDetails as $products)
                                                        <div style="margin: 1px 0">
                                                            <a href="{{route('product-details',['id'=>$products->product->id]) }}">
                                                                <img src="{{ asset('storage/app/products/'.$products->product->img_link) }}" style="width: 40px"/>
                                                                <p class="checkout-item3" style="margin-bottom: -5px !important" >{{ $products->product->name}} </p>{{'x'.$products->quantity }}
                                                            </a>
                                                        </div>
                                                        @endforeach   
                                                    </td>
                                                    <td>{{ number_format($item->total).' ₫' }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                          </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div><!-- /.row -->
    </div> <!-- /.container -->

@stop
