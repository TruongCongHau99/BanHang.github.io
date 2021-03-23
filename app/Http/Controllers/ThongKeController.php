<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
class ThongKeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donHangMoi= DB::table('donhang')->where('dh_trangthai',1)->count();
        $khachHangMoi = DB::table('khachhang')
                        ->whereMonth('created_at',Carbon::now()->month)
                        ->count();
        $donHangDaGiao= DB::table('donhang')->where('dh_trangthai',3)->count();
        $tongDanhThuThang= DB::table('donhang')->where('dh_trangthai',4)
                            ->whereMonth('created_at',Carbon::now()->month)
                            ->sum('dh_tongtien');


        return view('admin.thongke.index',compact('donHangMoi','donHangDaGiao','tongDanhThuThang','khachHangMoi'));
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
