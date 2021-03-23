@extends('admin.template.master')
@section('content')
<div class="row">
    <h1>Loại Sản Phẩm</h1>
<h4 class="col-12 text-center">Sửa Loại Sản Phẩm {{$loaiSanPham->l_ten}}</h4>
    </div>
    <div class="col-12 text-center">

            <form action="{{route('xu-ly-sua-loai',['id'=>$loaiSanPham->l_id])}}" method="POST">
                @csrf

                    <div class="form-group">
                        <h6>Tên loại</h6>
                        <input class="form-control mr-sm-2" name="tenloai" type="search" placeholder="Nhập tên loại sản phẩm . . ." aria-label="Search">


                    </div>


                    <button type="submit" class="btn btn-primary">Thêm</button>


              </form>
           </div>
    </div>
@endsection
