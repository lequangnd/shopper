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
        Schema::create('chitiethoadonban', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hoadonban_id');
            $table->foreign('hoadonban_id')->references('id')->on('hoadonban')->onDelete('cascade');
            $table->unsignedBigInteger('sanpham_id');
            $table->foreign('sanpham_id')->references('id')->on('sanpham');
            $table->string('size');
            $table->string('color');
            $table->bigInteger('soluong');
            $table->decimal('TongTien');
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
        Schema::dropIfExists('chitiethoadonban');
    }
};
