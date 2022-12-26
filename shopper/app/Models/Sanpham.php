<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\CssSelector\Node\FunctionNode;

class Sanpham extends Model
{
    protected $table='sanpham';
    public function nhacungcap()
    {
        return $this->belongsTo('App\Models\Nhacungcap','nhacungcap_id','id');
    }

    public Function loai()
    {
        return $this->belongsTo('App\Models\Loai','loai_id','id');
    }

    public Function chitietsize()
    {
        return $this->hasMany('App\Models\Chitietsize','sanpham_id','id');
    }

}
