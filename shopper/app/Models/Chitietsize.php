<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chitietsize extends Model
{
    protected $table='chitietsize';

    public function size()
    {
        return $this->belongsTo('App\Models\Size','size_id','id');
    }

    public function sanpham()
    {
        return $this->belongsTo('App\Models\Sanpham','sanpham_id','id');
    }

}
