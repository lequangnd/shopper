<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->id();
            $table->string('TenSP');
            $table->unsignedBigInteger('loai_id');
            $table->foreign('loai_id')->references('id')->on('loai')->onDelete('cascade');
            $table->string('ThuongHieu');
            $table->decimal('Gia');
            $table->decimal('GiaBan');
            $table->string('Anh');
            $table->string('MauSac');
            $table->boolean('Fashion');
            $table->string('MoTa');
            $table->unsignedBigInteger('nhacungcap_id');
            $table->foreign('nhacungcap_id')->references('id')->on('nhacungcap');
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
};
