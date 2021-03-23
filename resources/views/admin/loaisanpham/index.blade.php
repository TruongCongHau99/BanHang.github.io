@extends('admin.template.master')
@section('title')

<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Loại Sản Phẩm</h1>
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
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <button type="submit" data-toggle="modal" data-target="#exampleModal2" class="btn btn-primary">Thêm</button>
         <h3>Danh sách loại sản phẩm</h3>
                 <form action="{{route('xu-ly-tim-kiem')}}" method="GET">
                    @csrf
                     <div class="form-group">
                         <label for="formGroupExampleInput">Tìm kiếm</label>
                         <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" name="tuKhoa">
                     </div>

                 </form>

         <table class="table">
             <thead>
               <tr>
                 <th scope="col">stt</th>
                 <th scope="col">TenLoaiSanPham</th>
                 <th scope="col">Thao tác</th>
                 <th scope="col"></th>
               </tr>
             </thead>
             <tbody>
                 @foreach ($danhSachLoai as $item)
                 <tr>
                 <th scope="row">{{$item->l_id}}</th>
                     <td>{{ $item->l_ten }}</td>
                     <td>
                         <a href="{{ route('sua-loai-san-pham', ['id'=> $item->l_id]) }}"class="btn btn-success">Sửa</a>
                         <a href="#"class="btn btn-danger">Xóa</a>
                     </td>

                   </tr>
                 @endforeach


             </tbody>
           </table>
        </div>
        <div class="col-3">
         {{-- <form action="{{route('xu-ly-them-loai')}}" method="POST">
             @csrf

                 <div class="form-group">
                     <h6>Tên loại</h6>
                     <input class="form-control mr-sm-2" name="tenloai" type="search" placeholder="Nhập tên loại sản phẩm . . ." aria-label="Search">

                 </div>

                 <button type="submit" class="btn btn-primary">Thêm</button> --}}

           </form>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{route('xu-ly-them-loai')}}" method="POST">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="col-3">

                    @csrf

                        <div class="form-group">
                            <h6>Tên loại</h6>
                            <input class="form-control mr-sm-2" name="tenloai" type="search" placeholder="Nhập tên loại sản phẩm . . ." aria-label="Search">

                        </div>




               </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Thêm</button>
        </div>
      </div>
    </form>
    </div>
  </div>
@endsection
