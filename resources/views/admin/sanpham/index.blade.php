@extends('admin.template.master')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12 text-center"> <h1>Sản phẩm</h1></div>

        <div class="col-9">

                <h5>Tìm kiếm</h5>
                <form class="form-inline my-2 my-lg-0 ">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm</button>
                </form>

                <h2 class="mt-4 text-center">Danh sách sản phẩm</h2>

                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Tên sản phẩm</th>
                      <th>Loại sản phẩm</th>
                      <th>Số Lượng</th>
                      <th>Giá</th>
                      <th>Hình ảnh</th>
                      <th>Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if (Session::has('alert-sp'))
                    <p style="color: blue" class="text-center">
                    {{Session::get('alert-sp')}}
                        @endif
                    </p>


                    @foreach ($loaiSanPham as $item)
                      <tr>
                          <td>{{ $item->sp_id }}</td>
                          <td>{{ $item->sp_ten }}</td>
                          <td>{{ $item->l_ten }}</td>
                          <td>{{ $item->sp_soluong }}</td>
                      <td>{{ number_format($item->sp_gia) }}</td>


                          <td>
                              @if($item->sp_hinhanh == null)
                               Chưa có hình ảnh sản phẩm
                            @else
                          <img src="{{ asset('hinhanhsanpham') }}/{{ $item->sp_hinhanh }}" style="width:180px; height=200px">
                          @endif
                          </td>
                          <td>
                          <a href="{{route('chi-tiet-san-pham', ['id'=>$item->sp_id])}}" class='btn btn-primary'>Chi tiết</a>
                            <a href="{{route('sua-san-pham', ['id'=>$item->sp_id])}}" class='btn btn-success'>Sửa</a>
                          <a href="{{route('xoa-san-pham', ['id'=>$item->sp_id])}}" class='btn btn-danger'>Xóa</a>
                          </td>
                    </tr>
                    @endforeach


                  </tbody>
                </table>
              </div>

              <div class="col-3 mt-5">
                <h2 class="mt-5 text-center">Thêm sản phẩm</h2>

                <form action="{{ route('xu-ly-san-pham') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <h5>Tên sản phẩm</h5>
                        <input name="tenSanPham" class="form-control mr-sm-2" type="search" placeholder="Nhập tên sản phẩm . . ." aria-label="Search">
                    </div>
                    <div class="form-group">
                        <h6>Loại sản phẩm</h6>
                        <select class="form-control" name="tenLoai"id="exampleFormControlSelect1">


                          @foreach ($danhSachLoai as $item)
                              <option value="{{$item->l_id}}">{{ $item->l_ten }}</option>


                          @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label >Mô tả</label>
                        <textarea name="moTa" id="summernote" cols="73" rows="4"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Số lượng</label>

                         <textarea name="soLuong" id="soluong" class="form-control" cols="2" rows="2"></textarea>
                    </div>

                    <div class="form-group">
                        <label> Giá</label>

                         <textarea name="gia" id="gia" class="form-control" cols="2" rows="2"></textarea>
                    </div>

                    <div class="form-group">
                        <label >Hình ảnh</label>
                        <input type="file" name="hinhAnh" class="form-control-file" id="exampleFormControlFile1">
                    </div>

                    <button type="submit" class="btn btn-primary">Thêm</button>
                  </form>



              </div>

  </div>

    </div>
@endsection
