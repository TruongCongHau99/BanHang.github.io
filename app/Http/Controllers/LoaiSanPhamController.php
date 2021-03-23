<?php

namespace App\Http\Controllers;
use DB;
use Session;
use Illuminate\Http\Request;

class LoaiSanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danhSachLoai = DB::table('loaisanpham')->get();

        return view('admin.loaisanpham.index',compact('danhSachLoai'));
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
        try {
            //code...
            $addLoai = DB::table('loaisanpham')->insert(
                [
                    'l_ten' => $request->tenloai
                ]
                );

                Session::flash('alert','Thêm Thành Công');
            //dd('them thanh cong');
            return redirect()->route('danh-sach-loai');
        } catch (\Throwable $th) {
            //throw $th;
            Session::flash('alert-error','có lỗi trong quá trình thêm');
            return redirect()->route('danh-sach-loai');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loaiSanPham=DB::table('loaisanpham')->where('l_id',$id)->first();
        return view('admin.loaisanpham.edit',compact('loaiSanPham'));
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
        try {
            //code...
            $updateLSP=DB::table('loaisanpham')->where('l_id',$id)->update([
                'l_ten' =>$request ->tenloai
            ]);
            Session::flash('hihi','Cập Nhật Thành Công');
            return redirect()->route('danh-sach-loai');
            //dd("sua thanh cong");
        } catch (\Throwable $th) {
            Session::flash('huhu','Cập nhật thất bại');
            return redirect()->route('danh-sach-loai');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //xóa xóa xóa
    public function destroy($id)
    {
        try {
            //code...
            $delLOAISANPHAM = DB::table('loaisanpham')->where('l_id',$id)->delete();

            Session::flash('hauhau','Xóa Thành Công');
                 return redirect()->route('danh-sach-loai');
        } catch (\Throwable $th) {
            //throw $th;
        }

    }

    public function timKiem(Request $request){
        $tuKhoa = $request -> get('tuKhoa');
        $loaiSanPhamTimDuoc = DB::table('loaisanpham')->where('l_ten','like','%'.$tuKhoa.'%')->get();
      // dd($loaiSanPhamTimDuoc);
        return view('admin.loaisanpham.loaisanphamtimduoc',compact('loaiSanPhamTimDuoc','tuKhoa'));
    }

    public function banner(){
        $danhSachBanner = DB::table('banner')->get();
        return view('admin.template.banner',compact('danhSachBanner'));
    }

    public function xulybanner(Request $request)
    {
        $tenBanner= $request->tenBanner;
        $noiDung= $request->noiDung;
        $hinhAnh= $request->hinhAnh;


        if($hinhAnh !=null){
            $tenHinhAnh = $hinhAnh->getClientOriginalName();
            $hinhAnh -> move('hinhanhsanpham', $tenHinhAnh);
            $addBanner = DB::table('banner')->insert(
                [
                'bn_hinhanh'=> $tenHinhAnh,
                'bn_noidung'=> $noiDung
                ]
            );
        }
        else{
            $addBanner= DB::table('banner')->insert([
                'bn_hinhanh'=> $tenHinhAnh,
                'bn_noidung'=> $noiDung

            ]);
        }
        //dd('them thanh cong');
        return redirect()->route('banner');
    }
}
