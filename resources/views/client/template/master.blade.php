<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ - bán vàng</title>
    <!-- CSS and Bootstrap -->
    @include('client.template.css')
</head>
<body>
    <div class="container ">
        @include('client.template.header')
        <div class="row mt-2">
            @include('client.template.sidebar')
           <div class="col-9">
            @yield('content')
           </div>
        </div>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tr>
                      <th>#</th>
                      <th>Tên sản phẩm</th>
                      <th>Số lượng</th>
                      <th>Đơn giá</th>
                      <th>Giá</th>
                    </tr>
                    @php
                     $stt = 1;
                    @endphp
                    @foreach ($cart as $item)
                    <tr class="sanpham">
                      <td>{{ $stt++}}</td>
                      <td>{{ $item->name }}</td>
                      <td>{{ $item->quantity }}</td>
                      <td>
                      <p>{{ number_format($item->price)}} </p>
                      </td>
                      <td>
                      <p>{{ number_format($item->getPriceSum)}}</p>
                      </td>
                      <td colspan="1"><a href="{{route('xoa-mot-san-pham',['idProduct'=>$item->id])}}" class="btn btn-danger" href="#">X</a></td>
                    </tr>
                    @endforeach
                    <tr>
                    <td colspan="3"><b>Tổng tiền:</b> {{number_format(Cart::getSubTotal())}}</td>

                      {{-- <td colspan="1"><a class="btn btn-primary" href="#">Cập nhật</a></td> --}}


                    </tr>
                    {{-- @if (Auth::guard('khachhang')->check()){ --}}
                <td colspan="1"></td>
                    {{-- } --}}
                    {{-- @else
                    dd("bạn chưa đăng nhập")
                    @endif --}}

                </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
              <a class="btn btn-success" href="{{route('thanh-toan')}}">Thanh Toán</a>
            </div>
          </div>
        </div>
      </div>
<!-- JS and JQuery -->
    @include('client.template.js')
</body>
</html>
