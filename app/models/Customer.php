<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
   		'name',
   		'username',
   		'password',
   		'email',
   		'phone',
   ];

   public function bill()
   {
   		return $this->hasMany(\App\model\Bill::class);
   }

   public function review()
   {
   		return $this->hasMany(\App\model\Review::class);
   }

   public function addresse()
   {
   		return $this->hasMany(\App\model\Addresse::class);
   }
}
