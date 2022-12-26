<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loai extends Model
{
    protected $table='Loai';
    
    public function sanpham()
    {
        return $this->hasMany('App\Models\Sanpham','loai_id','id');
    }
}
