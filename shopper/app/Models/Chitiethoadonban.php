<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chitiethoadonban extends Model
{
    protected $table='chitiethoadonban';

    public function sanpham()
    {
        return $this->belongsTo('App\Models\Sanpham','sanpham_id','id');
    }
}
