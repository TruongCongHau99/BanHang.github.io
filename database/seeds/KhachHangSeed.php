<?php

use Illuminate\Database\Seeder;

class KhachHangSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0 ; $i <= 5 ; $i++)
        {
            DB::table('khachhang')->insert(
                [
                    'username' => 'conghau'.$i,
                    'password' => Hash::make(123),
                    'kh_hoten' => 'Công Hậu'.$i,
                    'kh_sdt' => '087890090'.rand(1,9),
                    'kh_diachi' => 'Cần Thơ'
                ]
            );
        }
    }
}
