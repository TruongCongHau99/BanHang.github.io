<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//  Route::get('/', function () {
//     return view('admin.template.master');
// });
//  Route::get('/haha', function () {
//      return view('admin.index');
//  });
Route::get('/loaisanpham','LoaiSanPhamController@index')->name('danh-sach-loai');
route::post('/xu-ly-them-loai','LoaiSanPhamController@store')->name('xu-ly-them-loai');

route::get('/sua-loai-san-pham/{id}','LoaiSanPhamController@edit')->name('sua-loai-san-pham');
route::post('/xu-ly-sua-loai/{id}','LoaiSanPhamController@update')->name('xu-ly-sua-loai');

route::get('/xoa-loai-san-pham/{id}','LoaiSanPhamController@destroy')->name('xoa-loai-san-pham');

route::get('/timkiemloaisanpham','LoaiSanPhamController@timKiem')->name('xu-ly-tim-kiem');




Route::get('/sanpham','SanPhamController@index')->name('san-pham');
route::post('/xu-ly-san-pham','SanPhamController@store')->name('xu-ly-san-pham');

route::get('/sua-san-pham/{id}','SanPhamController@edit')->name('sua-san-pham');
route::post('/xu-ly-sua-sp/{id}','SanPhamController@update')->name('xu-ly-sua-sp');

route::get('/xoa-san-pham/{id}','SanPhamController@destroy')->name('xoa-san-pham');
route::get('/chi-tiet-san-pham/{id}','SanPhamController@show')->name('chi-tiet-san-pham');



route::get('/dangky','AuthController@ViewDangKy')->name('dang-ky');
route::post('/xu-ly-dang-ky','AuthController@xuLyDangKy')->name('xu-ly-dang-ky');


route::get('/dangnhap','AuthController@DangNhap')->name('dang-nhap');
route::post('/xu-ly-dang-nhap','AuthController@xuLyDangNhap')->name('xu-ly-dang-nhap');

route::get('/chi-tiet/{id}','KhachHangController@show')->name('chi-tiet');

// route::group(['prefix'=>'admin'],function(){
//     route::group(['prefix'=>'loai-san-pham'],function(){
//         Route::get('/loaisanpham','LoaiSanPhamController@index')->name('danh-sach-loai');
//         route::post('/xu-ly-them-loai','LoaiSanPhamController@store')->name('xu-ly-them-loai');

//         route::get('/sua-loai-san-pham/{id}','LoaiSanPhamController@edit')->name('sua-loai-san-pham');
//         route::post('/xu-ly-sua-loai/{id}','LoaiSanPhamController@update')->name('xu-ly-sua-loai');

//         route::get('/xoa-loai-san-pham/{id}','LoaiSanPhamController@destroy')->name('xoa-loai-san-pham');

//     });

//     Route::get('/sanpham','SanPhamController@index')->name('san-pham');
//     route::post('/xu-ly-san-pham','SanPhamController@store')->name('xu-ly-san-pham');

//     route::get('/sua-san-pham/{id}','SanPhamController@edit')->name('sua-san-pham');
//     route::post('/xu-ly-sua-sp/{id}','SanPhamController@update')->name('xu-ly-sua-sp');

//     route::get('/xoa-san-pham/{id}','SanPhamController@destroy')->name('xoa-san-pham');
// });

// route::group(['middleware' => ['checkNhanVien']], function() {
//     route::group(['prefix'=>'loai-san-pham'], function() {
//         Route::get('/loaisanpham','LoaiSanPhamController@index')->name('danh-sach-loai');
//         route::post('/xu-ly-them-loai','LoaiSanPhamController@store')->name('xu-ly-them-loai');

//         route::get('/sua-loai-san-pham/{id}','LoaiSanPhamController@edit')->name('sua-loai-san-pham');
//         route::post('/xu-ly-sua-loai/{id}','LoaiSanPhamController@update')->name('xu-ly-sua-loai');

//         route::get('/xoa-loai-san-pham/{id}','LoaiSanPhamController@destroy')->name('xoa-loai-san-pham');

//     });
//     Route::get('/sanpham','SanPhamController@index')->name('san-pham');
//     route::post('/xu-ly-san-pham','SanPhamController@store')->name('xu-ly-san-pham');

//     route::get('/sua-san-pham/{id}','SanPhamController@edit')->name('sua-san-pham');
//     route::post('/xu-ly-sua-sp/{id}','SanPhamController@update')->name('xu-ly-sua-sp');

//     route::get('/xoa-san-pham/{id}','SanPhamController@destroy')->name('xoa-san-pham');
// });

Route::get('/','KhachHangController@index')->name('trangchu');



// Route::get('/dangnhapkhachhang', function () {
//        return view('client.login.login');
// });


Route::get('/giohang','KhachHangController@giohang')->name('gio-hang');

Route::get('/them-vao-gio-hang/{idProduct}','KhachHangController@addToCart')->name('them-vao-gio-hang');

Route::get('/xoa-gio-hang','KhachHangController@clearCart')->name('xoa-gio-hang');

Route::get('/xoa-mot-san-pham/{idProduct}','KhachHangController@clearOneCart')->name('xoa-mot-san-pham');

Route::get('/lay-san-pham/{idLoai}','KhachHangController@getProductcategory')->name('lay-san-pham');

Route::get('/them-nhieu-san-pham/{idProduct}','KhachHangController@addMoreProductToCart')->name('them-nhieu-san-pham');


//KhachHang

route::post('/xuLyDangNhapKhachHang','LoginController@xuLyDangNhapKhachHang')->name('xuLyDangNhapKhachHang');
route::get('/dang-xuat-kh','LoginController@logoutkh')->name('dang-xuat-kh');

Route::get('/thanhtoan','KhachHangController@thanhToan')->name('thanh-toan');
Route::post('/dathang','KhachHangController@datHang')->name('dat-hang');


route::get('/donhang','DonHangController@index')->name('don-hang');
route::get('/chitietdonhang/{idDonHang}','DonHangController@chitietdonhang')->name('chi-tiet-don-hang');
route::get('/donhangkh/{idCus}','KhachHangController@getOrderByCus')->name('don-hang-kh');

Route::get('/timkiemtheoten','DonHangController@timKiem')->name('tim-kiem');

Route::get('/khachhang','KhachHangController@khachHang')->name('khach-hang-admin');

Route::get('/thongke','ThongKeController@index')->name('thongke');


Route::get('/banner','LoaiSanPhamController@banner')->name('banner');
Route::post('/xulybanner','LoaiSanPhamController@xulybanner')->name('xu-ly-banner');
