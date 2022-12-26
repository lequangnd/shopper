<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hoadonban extends Model
{
    protected $table='hoadonban';
    public function users()
    {
        return $this->belongsTo('App\Models\User','users_id','id');
    }
}
