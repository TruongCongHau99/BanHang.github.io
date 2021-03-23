@extends('client.template.master')

@section('content')
        <div class="container">
            <div class="row">
                <div class="col-6 order-1">
                    <div class="image_selected">
                        <img src="{{ asset('hinhanhsanpham') }}/{{ $sanPham->sp_hinhanh }}" style="width:350px;height:350px">
                    </div>
                </div>
                <!-- Description -->
                <div class="col-6 order-2">
                <form action="{{route('them-nhieu-san-pham',['idProduct'=>$sanPham->sp_id])}}" method="GET">
                        <ul class="list-group mt-5">
                            <li class="list-group-item border-none"><b>Thông tin sản phẩm</b></li>
                            <li class="list-group-item border-none">Giá: {{ number_format($sanPham->sp_gia) }}</li>
                            <li class="list-group-item border-none">
                                Số lượng: <input type="number" name="soLuong" value="1">
                            </li>
                            <li class="list-group-item border-none">Loại: {{ ($sanPham->l_ten) }}</li>
                            <li class="list-group-item border-none"><button class="btn btn-primary">Thêm vào giỏ hàng</button></li>
                        </ul>
                    </form>
                    {{-- <div class="product_description">
                        <div class="product_name">{{ $sanPham->sp_ten }}</div>
                        <div class="product_price">{{ $sanPham->sp_gia }}</div>
                        <div class="product_number">{{ $sanPham->sp_soluong }}</div>

                            <div>
                                <button type="button" class="btn btn-primary mt-3"><i class="fa fa-shopping-cart" aria-hidden="true"></i>  Thêm vào giỏ</button>
                                <button   type="button" class="btn btn-danger mt-3 ml-3" >Mua ngay</button>
                            </div>
                            <div >
                                <div class="btn btn-success mt-5" >
                                     <a href="/" style="color:honeydew">
                                        <i class="fa fa-undo" aria-hidden="true"></i>  Trở về
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div> --}}
                    <div class="col-12 mt-5 order-3">
                        <h4><b>Mô tả sản phẩm:</b> </h4>
                        <p>{{ $sanPham->sp_mota }}</p>
                    </div>
                </div>
            </div>
        <div  class="fb-comments" data-href="{{Request::url()}}https://developers.facebook.com/docs/plugins/comments#configurator" data-numposts="5" data-width=""></div>

        </div>


@endsection
