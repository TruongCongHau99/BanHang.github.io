<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class NhanVienModel extends Authenticatable
{
    //tên bảng
    protected $table = 'nhanvien';
    //khóa chính
    protected $primarykey = 'nv_id';
    //trường cần thêm
    protected $fillable = ['nv_hoten','nv_sdt','username','password','q_id'];

    protected $hidden = [];
    protected $dates = [];
}
