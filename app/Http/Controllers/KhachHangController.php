<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Auth;
use Carbon\Carbon;
use Session;
class KhachHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sanPham = DB::table('sanpham')->get();
        return view('client.index',compact('sanPham'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sanPham = DB::table('sanpham')
            ->where('sp_id',$id)
            ->join ('loaisanpham','loaisanpham.l_id','sanpham.l_id')->first();
            return view('client.chitietsanpham',compact('sanPham'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function giohang()
    {
        //lay noi dung cua gio hang
        $cartCollection = Cart:: getContent();
        //dd($cartCollection);
        return view('client.template.giohang',compact('cartCollection'));
    }

    public function addToCart($idProduct)
    {
        $product = DB::table('sanpham')->where('sp_id',$idProduct)->first();
        Cart::add($product->sp_id, $product->sp_ten, $product->sp_gia,1);
        return redirect()->back();

    }


    public function addMoreProductToCart(Request $request,$idProduct)
    {
        $soLuong = $request->get('soLuong');
        $product = DB::table('sanpham')->where('sp_id',$idProduct)->first();
        Cart::add($product->sp_id, $product->sp_ten, $product->sp_gia, $soLuong);
        return redirect()->back();

    }



    public function clearCart()
    {
        // xóa 1 sản phẩm có id truyền vào
        Cart::clear();
        return redirect()->back();
    }

    public function clearOneCart($idProduct)
    {
        // xóa 1 sản phẩm có id truyền vào
        Cart::remove($idProduct);
        return redirect()->back();
    }

    public function getProductcategory($idLoai)
    {
        $getProduct=DB::table('sanpham')->where('l_id',$idLoai)->get();
        dd($getProduct);

    }

    public function thanhToan()
    {
        //Lấy nd của giỏ hàng
        $cartCollection = Cart::getContent();
        //dd($cartCollection);
        return view('client.template.thanhtoan',compact('cartCollection'));
    }

    public function datHang(Request $request)
    {
        $idKhachHang=Session::get('idkh');
        $donHang= DB::table('donhang')->insertGetId(
            [
                'dh_nguoinhan'=> $request->nguoiNhan,
                'dh_sdt'=> $request->sdt,
                'dh_diachi'=> $request->diaChi,
                'dh_tongtien'=>Cart::getSubTotal(),
                'dh_trangthai'=>1,
                'created_at'=> Carbon::now(), //Lay gia tri hien tai
                'kh_id'=>$idKhachHang
            ]
            );

            $cartCollection = Cart::getContent();
           foreach ($cartCollection as $value){
            $soLuongHienTai= DB::table('sanpham')->where('sp_id',$value->id)->first();
            $soLuongGiam= DB::table('sanpham')->where('sp_id',$value->id)->update(
                [
                    'sp_soluong' => $soLuongHienTai->sp_soluong - $value->quantity
                ]
            );
               $chiTietDatHang= DB::table('chitietdonhang')->insert(
                   [
                       'dh_id'=>$donHang,
                       'sp_id'=>$value->id,
                       'ctdh_giatien'=>$value->price,
                       'ctdh_soluong'=>$value->quantity
                   ]
                   );
           }
           Cart::clear();
           return redirect()->route('trangchu');

        }

        public function getOrderByCus($idCus)
        {
            // $idCus=sesion get::('kh_id')->;
            // $idCus=Session::('khachhang')->id();
            $order=DB::table('donhang')->where('kh_id',$idCus)->get();
            // dd($order);
            return view('client.donhang.donhang',compact('order'));

        }

        public function khachHang()
    {
        $khachHang=DB::table('khachhang')->get();
        return view('admin.khachhang.index',compact('khachHang'));
    }

}

