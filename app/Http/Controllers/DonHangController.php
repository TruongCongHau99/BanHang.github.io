<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DonHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donHang = DB::table('donhang')->get();
        return view('admin.donhang.dathang',compact('donHang'));
    }
    public function chitietdonhang($idDonHang)
    {

        $donHang= DB::table('donhang')->where('dh_id',$idDonHang)->first();
        $sanPhamDonHang = DB::table('chitietdonhang')
        //->join('dondathang','dondathang.ddh_id','chitietdonhang.ddh_id')
        ->join('sanpham','sanpham.sp_id','chitietdonhang.sp_id')
        ->where('chitietdonhang.dh_id',$idDonHang)
        ->get();
        // dd($sanPhamDonHang);
        return view('admin.donhang.chitietdonhang',compact('donHang','sanPhamDonHang'));
    }

    public function timKiem(Request $request)
    {
        switch ($request ->get('thuocTinh')) {
            case 'donHang':
                # code...
                $search= DB::table('donhang')->where('dh_id',$request->get('tuKhoa'))->get();
                // dd($search);
                return view('admin.donhang.timkiemdonhang',compact('search'));
            break;
            case 'tenKhachHang':
                # code...
                $search= DB::table('donhang')->where('dh_nguoinhan','like','%'.$request->get('tuKhoa').'%')->get();
                //dd($search);
                return view('admin.donhang.timkiemdonhang',compact('search'));
            break;


            default:
                # code...
                break;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


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
        //
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



}
