<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $fillable = [
   		'user_id',
   		'product_id'
   ];

   public function product() 
    {	
		return $this->hasMany(\App\Models\Product::class);
	}
}
