<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
   		'customer_id',
   		'product_id',
   		'rating',
   		'content',
   		'created_at',
   ];

   public function product()
   {
   		return $this->belongsTo(\App\model\Product::class);
   }

   public function customer()
   {
         return $this->hasMany(\App\model\Customer::class);
   }
}
