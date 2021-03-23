<div class="col-3 ">

    <ul class="list-group normal-border">
        <li class="list-group-item list-group-item-dark normal-border bg-red"><b>Danh mục sản phẩm</b></li>
@foreach ($loaiSanPham as $item)

    <li class="list-group-item list-group-item-dark normal-border bg-red"><a href="{{route('lay-san-pham',['idLoai'=>$item->l_id])}}">{{ $item->l_ten }}</a></li>
@endforeach

      </ul>
      {{-- {{ print_r(Auth::guard('khachhang')) }} --}}
      @if (Session::has('kh') && Session::get('kh') != '')

      <div>
          <ul class="list-group normal-border">
          <li class="list-group-item normal-border">Xin chào, <b>{{ Session::get('kh') }}</b></li>
          <li class="list-group-item normal-border"><a href="{{ route('dang-xuat-kh')}}">Đăng xuất</a></li>
          </ul>
      </div>
    <li class="list-group-item normal-border"><a href="{{route('don-hang-kh',['idCus'=>Session::get('idkh')])}}">Đơn hàng</a></li>
      @else
        <form action="{{ route('xuLyDangNhapKhachHang')}}" method="POST">
            @csrf
            <ul class="list-group normal-border mt-4">
                <li class="list-group-item list-group-item-dark normal-border bg-red"><b>Đăng nhập</b></li>
                <li class="list-group-item normal-border">
                    <label for="username"><b>Tên đăng nhập</b></label>
                    <input type="text" name="username" id="username">
                </li>
                <li class="list-group-item normal-border">
                    <label for="password"><b>Mật khẩu</b></label>
                    <input type="password" name="password" id="password">
                </li>
            </ul>
                <br>
                    <button type="submit" class='btn btn-primary'> Đăng nhập,<b>{{ Session::get('khachhang') }}</b></button>
                    {{-- <a href="#" class='btn btn-success'>Đăng ký</a> --}}
        </form>

      @endif


</div>
