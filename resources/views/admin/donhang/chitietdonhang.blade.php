@extends('admin.template.master')
@section('title')

<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Chi tiết đơn hàng</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard v1</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->

@endsection

@section('content')

    <div class="row col-12">
         <div class="col-6">

            <label>Người nhận: {{$donHang->dh_nguoinhan}} </label><br>
            <label>Số điện thoại:{{$donHang->dh_sdt}} </label><br>
            <label>Địa chỉ: {{$donHang->dh_diachi}} </label><br>
            <label>Ngày đặt: {{ Carbon\Carbon::parse($donHang->created_at)->format('d/m/Y')}} </label>
         <form action="{{ route('chi-tiet-don-hang',['idDonHang'=>$donHang->dh_id]) }}" method="POST">
            <label>Trạng thái: </label>
            <h5>Thay đổi trạng thái đơn hàng</h5>
            <select class="form-control" name="trangThai" id="trangThai">
                <option value="1"{{ $donHang->dh_trangthai == '1' ? 'selected': ''}}>Đang chờ duyệt</option>
                <option value="2"{{ $donHang->dh_trangthai == '2' ? 'selected': ''}}>Đã duyệt</option>
                <option value="3"{{ $donHang->dh_trangthai == '3' ? 'selected': ''}}>Đang vận chuyển</option>
                <option value="4"{{ $donHang->dh_trangthai == '4' ? 'selected': ''}}>Đã nhận</option>
            </select><br>
            <a href="#" type="submit" class="btn btn-primary">Xác nhận</a>
            </form><br>
         </div>
    </div>


    {{-- <div class="row col-12">
        <div class="col-12 text-center">
            <h4>Danh sách sản phẩm</h4>
        </div>
    </div> --}}

    <div class="row col-12">
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Hình ảnh Sản phẩm</th>
                        <th scope="col">Đơn giá</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1
                    @endphp
                        @foreach ($sanPhamDonHang as $item)
                      <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{$item->sp_ten}}</td>
                        <td><img src="{{ asset('hinhanhsanpham') }}/{{ $item->sp_hinhanh }}" style="width:180px; height=200px"></td>
                        <td>{{$item->sp_gia}}</td>
                        <td>{{$item->sp_soluong}}</td>
                        <td>{{$item->ctdh_giatien}}</td>
                        <td>

                        </td>
                      </tr>
                    @endforeach
                    <tr>
                        <td colspan="5"><b>Tổng tiền thanh toán:</b> {{ number_format($donHang->dh_tongtien) }} đ </td>
                    </tr>
                        {{-- <td>
                            <a href="#"class="btn btn-primary">Chi Tiết</a>
                        </td> --}}
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
