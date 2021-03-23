<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class KhachHangModel extends Authenticatable
{
    //tên bảng
    protected $table = 'khachhang';
    //khóa chính
    protected $primarykey = 'kh_id';
    //trường cần thêm
    protected $fillable = ['kh_hoten','kh_diachi','kh_sdt','username','password'];

    protected $hidden = [];
    protected $dates = [];
}
