@extends('admin.template.master')
@section('title')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Sản Phẩm</h1>
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
                <div class="row">
                    <div class="col-12 text-center">
                        <h4>Sửa sản phẩm {{ $sanPham->sp_id }}</h4>
                    </div>
                    <div class="col-12">
                        <form action="{{ route('xu-ly-sua-sp', ['id'=>$sanPham->sp_id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                            <label for="exampleInputTenloai">Tên Sản Phẩm</label>
                            <input type="text" autocomplete="off" value="{{ $sanPham->sp_ten }}" name="tenSanPham"  class="form-control" id="exampleInputTenloai" aria-describedby="tenloaiHelp" placeholder="Nhập tên loại sản phẩm...">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputTenloai">Loại Sản Phẩm</label>
                                <select name="tenLoai" id=""class="form-control">
                                    @foreach ($loaisp as $item)
                                        {{-- <option value="{{ $item->l_id }}">{{ $item->l_ten }}</option> --}}
                                        <option value="{{ $item->l_id }}" {{ $sanPham->l_id == $item->l_id ? 'selected' : ''}}>{{ $item->l_ten }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputTenloai">Số lượng</label>
                                <input type="text" autocomplete="off" value="{{ $sanPham->sp_soluong }}" name="soLuong"  class="form-control" id="exampleInputTenloai" aria-describedby="tenloaiHelp" placeholder="Nhập tên loại sản phẩm...">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputTenloai">Giá</label>
                                <input type="text" autocomplete="off" value="{{ $sanPham->sp_gia }}" name="gia"  class="form-control" id="exampleInputTenloai" aria-describedby="tenloaiHelp" placeholder="Nhập tên loại sản phẩm...">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Hình ảnh</label>
                                <input type="file" name="hinhAnh" class="form-control-file" id="exampleFormControlFile1">
                                <img src="{{asset('hinhanhsanpham')}}/{{$sanPham->sp_hinhanh}}" style = "width:150px">
                            </div>
                            {{-- <img src="{{asset('hinhanhsanpham')}}/{{$item->sp_hinhanh}}" style = "width:150px" alt=""> --}}
                            <button type="submit" class="btn btn-primary">Sửa</button>
                        </form>
                    </div>
                </div>
@endsection
