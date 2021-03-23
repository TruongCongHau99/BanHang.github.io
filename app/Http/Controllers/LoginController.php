<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use Session;
use DB;

class LoginController extends Controller
{
    public function xuLyDangNhapKhachHang(Request $request)
    {
        $username= $request->username;
        $password=$request->password;

        // $arr=[
        //     'username'=>$username,
        //     'password'=>$password
        // ];
        // dd($arr);
        // dd(Hash::check('123', $password));
        // if(Auth::guard('khachhang')->attempt($arr)){
        //    dd("đăng nhập thành công");
        //     return redirect()->route('danh-sach-loai');
        //     return redirect()->back();
        // }else{
        //    dd("tài khoản mật khẩu chưa chính xác");
        // }

            $taiKhoan= DB::table('khachhang')->where('username','=',$request->username)->first();
            if(Hash::check($request->password,$taiKhoan->password))
            {
                // dd('dang nhap thanh cong');
                Session::put('kh',$taiKhoan->username);
                Session::put('ht',$taiKhoan->kh_hoten);
                Session::put('sdt',$taiKhoan->kh_sdt);
                Session::put('dc',$taiKhoan->kh_diachi);
                Session::put('idkh',$taiKhoan->kh_id);


                return redirect()->route('trangchu');
            }else{
                // Session::put('aler-info','sai tai khoan hoac mat khau);
                return redirect()->route('xuLyDangNhapKhachHang');
            }

    }



    public function logoutkh()
    {
        // Auth::guard('khachhang')->logout();
        Session::put('kh','');
        return redirect()->route('trangchu');
    }
}



