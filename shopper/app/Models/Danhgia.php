<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Danhgia extends Model
{
   protected $table='danhgia';
   public function users()
   {
       return $this->belongsTo('App\Models\User','users_id','id');
   }
}
