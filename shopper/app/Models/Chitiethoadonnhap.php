<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chitiethoadonnhap extends Model
{
    protected $table='chitiethoadonnhap';
    public function sanpham()
    {
        return $this->belongsTo('App\Models\Sanpham','sanpham_id','id');
    }
}
