@extends('layouts.app')
@section('content')
    <style type="text/css">
        h5 {
            text-align: left !important;
        }
    </style>
    @include('layouts._breadcrumd')
    <div class="terms-conditions-page">
        <div class="x-page inner-bottom-sm">
            <div class="row">
                <div class="col-md-12 x-text text-center">
                    <h3>Cảm ơn bạn. Đơn đặt hàng của bản đã được nhận.</h3>
                    <div class="row" style="background: cornsilk;">
                        <div class="col-lg-6">
                            <h2 class="heading-title">Thông tin đơn hàng</h2>
                            <h5 class="name">Mã đơn hàng : {{ $bill->id }}</h5>
                            <h5 class="name">Ngày đặt : {{ formatDateBill($bill->created_at) }}</h5>
                            <h5 class="name">Tổng tiền : {{ number_format($bill->total) . ' ₫' }}</h5>
                            <h5 class="name">Phương thức thanh toán :</h5>
                        </div>
                        <div class="col-lg-6">
                            <h2 class="heading-title">Thông tin người nhận</h2>
                            <h5 class="name">Tên người nhận : {{ $bill->name }}</h5>
                            <h5 class="name">Địa chỉ : {{ $bill->address }}</h5>
                            <h5 class="name">Số điện thoại : {{ '0'.$bill->phone }}</h5>
                            <h5 class="name">Tình trạng đơn hàng :
                                {{ $bill->statusBill->name }}
                            </h5>
                        </div>
                    </div>
                </div>
            </div><!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <h2 class="heading-title">Chi tiết hóa đơn</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Sản phẩm</th>
                                <th scope="col">Giá tiền</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $subtotal = 0;
                            @endphp
                            @foreach ($bill->invoiceDetails as $item)
                                <tr>
                                    <td style="padding: 0">
                                        <img src="{{ asset('storage/app/products/' . $item->product->img_link) }}"
                                            width="50" />
                                    </td>
                                    <td style="padding: 0">{{ $item->product->name }}</td>
                                    <td style="padding: 0">{{ number_format($item->product->price) . ' ₫' }}</td>
                                    <td style="padding: 0">{{ $item->quantity }}</td>
                                    <td style="padding: 0">{{ number_format($item->total) . ' ₫' }}</td>
                                    @php
                                        $subtotal += $item->total;
                                    @endphp
                                </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <h5>Thành tiền: {{ number_format($subtotal) . ' ₫' }}</h5>
                                    <h5>Phí ship: {{ number_format($bill->total - $subtotal) . ' ₫' }}</h5>
                                    <h4>Tổng tiền : {{ number_format($bill->total) . ' ₫' }}</h4>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    @if ($bill->statusBill->id == 1)
                                        <a href="{{ url('delete-bill/' . $bill->id) }}"
                                            class="btn-upper btn btn-primary checkout-page-button"
                                            style="margin-left: 240px; background-color:red">Hủy đơn hàng</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('/') }}" class="btn-upper btn btn-primary checkout-page-button"
                                        style="margin-left: 240px;display: inline-block;">Trở lại</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            var sta = "{{ Session::has('updatebill') }}";
            if (sta) {
                (async () => {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 1500,
                        timerProgressBar: true,
                        onOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'success',
                        title: 'Hủy đơn hàng thành công'
                    })
                })()
            }
        });

    </script>
@stop
