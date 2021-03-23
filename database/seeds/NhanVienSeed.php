<?php

use Illuminate\Database\Seeder;

class NhanVienSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //khai báo thư viện
        $faker = Faker\Factory::create();
       // $limit =10;
        for ($i=0; $i<10;$i++){
            $nhanVien= [
                [
                 'nv_hoten'=>$faker->name,
                 'nv_sdt'=>$faker->phoneNumber,
                 'username'=>'conghau'.rand(1,999),
                 'password'=>Hash::make(123),
                 'q_id'=>1
                ]
             ];
             $addNhanVien = DB::table('nhanvien')->insert($nhanVien);

        }

    }
}
