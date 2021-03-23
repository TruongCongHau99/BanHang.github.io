<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\NhanVienModel;
use Hash;
use Auth;

class AuthController extends Controller
{
    public function ViewDangKy(){

        return view('admin.login.register');
    }

    public function xuLyDangKy(Request $request)
    {
        $hoTen=$request->hoTen;
        $sdt=$request->sdt;
        $tenDangNhap=$request->tenDangNhap;
        $matKhau1=$request->matKhau1;
        $matKhau2=$request->matKhau2;

        if($matKhau1 != $matKhau2)
        {
            Session::flash('alert-password','Mật khẩu không trung khớp');
            return redirect()->back();
        }
        else
        {
            //dd(" thanh cong");
            $nhanVien = new NhanVienModel();
            $nhanVien->nv_hoten = $hoTen;
            $nhanVien->nv_sdt = $sdt;
            $nhanVien->username = $tenDangNhap;
            $nhanVien->password = Hash::make($matKhau1);
            $nhanVien->q_id='2';
            //save lai
            $nhanVien->save();
            return redirect()->route('dang-nhap');

        }

    }
    public function DangNhap(){
        return view('admin.login.login');
    }


    public function xuLyDangNhap(Request $request)
    {
        $username= $request->username;
        $password=$request->password;

        $arr=[
            'username'=>$username,
            'password'=>$password
        ];
        if(Auth::guard('nhanvien')->attempt($arr)){
           //dd("đăng nhập thành công");
            return redirect()->route('danh-sach-loai');
        }else{
           //dd("tài khoản mật khẩu chưa chính xác");
        }
    }
}
