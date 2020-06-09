<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Addresse extends Model
{
    protected $fillable = [
         'user_id',
         'street',
         'phone',
         'name'

   ];

   public function user()
   {
      return $this->belongsTo(\App\Models\User::class);
   }
   
}
