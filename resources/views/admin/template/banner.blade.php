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
    <div class="container-fluid">
        <div class="row">
        <div class="col-9">
            <h3 class="text-center">Banner</h3>
            <table class="table">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Tên Banner</th>
                    <th>Hình ảnh</th>
                    <th>Nội dung</th>
                  </tr>
                </thead>
                <tbody>

                  @foreach ($danhSachBanner as $item)
                      <tr>
                      <td>{{$item->bn_id}}</td>
                      {{-- <td>...</td> --}}

                      <td>{{$item->bn_noidung}}</td>
                      <td>
                          @if ($item->bn_hinhanh == null)
                            Chưa có hình ảnh sản phẩm
                        @else
                      <img src="{{ asset('hinhanhsanpham') }}/{{ $item->bn_hinhanh }}" style="width:180px; height=200px">
                        @endif
                      </td>

                      </tr>
                  @endforeach

                </tbody>
              </table>
        </div>
        <div class="col-3">
            <h3 class="text-center">Thêm sản phẩm</h3>


            {{-- Khi cần tải file(hình ảnh.....) lên thì xài enctype="multipart/form-data" --}}

        <form action="{{ route('xu-ly-banner') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Tên banner</label>
                <input name="tenBanner" class="form-control mr-sm-2" type="search" placeholder="Nhập tên sản phẩm . . ." aria-label="Search">
            </div>


            {{-- <div class="form-group">
                <label>Loại sản phẩm</label>
                <select class="form-control" name="tenLoai" id="exampleFormControlSelect1">
                    @foreach ($danhSachLoai as $item)
                    <option value="{{$item->l_id}}">{{ $item->l_ten }}</option>
                    @endforeach
                </select>
            </div> --}}

            <div class="form-group">
                <label> Nội dung</label>

                 <textarea name="noiDung" id="" class="form-control" cols="8" rows="8" ></textarea>
                 {{-- summernote --}}
            </div>

            {{-- <div class="form-group">
                <label>Số lượng</label>
<textarea name="soLuong" id="soluong" class="form-control" cols="2" rows="2"></textarea>
            </div> --}}

            {{-- <div class="form-group">
                <label> Giá</label>

                 <textarea name="gia" id="gia" class="form-control" cols="2" rows="2"></textarea>
            </div> --}}

            <div class="form-group">
            <label for="exampleFormControlFile1">Hình ảnh</label>
                <input type="file" name="hinhAnh" class="form-control-file" id="exampleFormControlFile1">
            </div>



            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
        </div>
    </div>
    </div>


@endsection
