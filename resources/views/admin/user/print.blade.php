<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    
    <title>In hóa đơn</title>
    <style>
      body{
        font-family: DejaVu Sans, sans-serif, font-size: 12px;
      }
    </style>
  </head>
  
  <body >
    <div>
      <b><span>SHOP ĐÁ PHONG THỦY MIXI</span></b><br>
      QUẢNG NAM<br>
      Số điện thoại: 01293963362<br>
      Website: http://localhost/nongsancantho/
    </div><hr>
    <center><h2>ĐƠN ĐẶT HÀNG</h2></center>
    
    <table>
      <tr>
        <td width="120px"><strong>Khách hàng:</strong></td> <td>{{ $customer->name }}</td>
        <td><strong></td>
      </tr>
      <tr>
        <td width="120px"><strong>Địa chỉ:</strong></td> <td>{{ $customer->address }}</td>
        <td></td>
      </tr>
      <tr>
        <td width="120px"><strong>Điện thoại:</strong></td> <td>{{ $customer->phone }}</td>
        <td></td>
      </tr>
      <tr>
        <td width="120px"><strong>Email:</strong></td> <td></td>
        <td></td>
      </tr>
    </table><br><br>
    <table cellpadding="3px" style="border:thin solid;" >
      <thead>
        <tr>
          <td style="border:thin solid;" width="50px"><strong>STT</strong></td>
          <td style="border:thin solid;" width="150px"><strong>Tên sản phẩm</strong></td>
          <td style="border:thin solid;" width="50px"><strong>Số lượng</strong></td>
          <td style="border:thin solid;" width="150px"><strong>Đơn giá</strong></td>
          <td style="border:thin solid;" width="150px"><strong>Thành tiền</strong></td>
        </tr>
      </thead>
      <tbody>
          @foreach($invoice as $item)
            <tr >
              <td style="border:thin blue solid;border-style:dashed;">{{ $no++}}</td>
              <td style="border:thin blue solid;border-style:dashed;">
                  {{$item->product_name}}
              </td>
              <td style="border:thin blue solid;border-style:dashed;">{{$item->quantity}}</td>
              <td style="border:thin blue solid;border-style:dashed;">
              {{number_format($item->price)." ₫"}}
              </td>
              
              <td style="border:thin blue solid;border-style:dashed;" >{{number_format($item->total)." ₫"}}</td>
          </tr>
        @endforeach   
            <tr>
              <td  width="150px" >
                    <b>Ghi chú :</b>
              </td>
              <td colspan="4">
                    zxdsf
                </td>
            </tr>
      </tbody>
    </table>
    <table class="sumary-table">
      <tr>
        <td width="500px">Giá trị đơn hàng</td>
        <td style="border:thin blue solid;border-style:dashed;" width="152px">ádd</td>
      </tr>
      <tr>
        <td width="500px">Tổng giá trị</td>
        <td width="152px" style="border:thin blue solid;border-style:dashed;">sadasd</td>
      </tr>
    </table><br>
    <table style="margin-bottom:-300px;">
      <tr>
        <td width="500px"></td>
        <td>Ngày lập: fdsfs</td>
      </tr>
      <tr>
        <td width="500px" class="customer-title">   <strong>Khách hàng</strong></td>
        <td class="writer-title"><strong>Người lập phiếu</strong></td>
      </tr>
      <tr>
        <td>(Ký và ghi rõ họ tên)</td>
        <td class="writer-name"><span>(Ký và ghi rõ họ tên)</span></td>
      </tr>
    </table>
  </body>
</html>
    
