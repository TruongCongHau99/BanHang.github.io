<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->bigIncrements('sp_id');
            $table->string('sp_ten',150);
            $table->string('sp_mota',200);
            $table->string('sp_hinhanh',150);
            $table->integer('sp_soluong');
            $table->integer('sp_gia');

            $table->bigInteger('l_id')->unsigned();
            $table->foreign('l_id')->references('l_id')->on('loaisanpham')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanpham');
    }
}
