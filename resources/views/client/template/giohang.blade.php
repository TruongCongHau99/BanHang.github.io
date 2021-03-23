@extends('client.template.master')
@section('content')
<div class="col-9 ">
    <h1 class="text-center">Giỏ hàng</h1>
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
        @foreach ($cartCollection as $item)
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

          <td colspan="1"><a class="btn btn-primary" href="#">Cập nhật</a></td>


        </tr>
        {{-- @if (Auth::guard('khachhang')->check()){ --}}
    <td colspan="1"><a class="btn btn-success" href="{{route('thanh-toan')}}">Thanh Toán</a></td>
        {{-- } --}}
        {{-- @else
        dd("bạn chưa đăng nhập")
        @endif --}}

    </table>
  </div>
@endsection
