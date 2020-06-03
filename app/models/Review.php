<?php

namespace App\Models;

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
   		return $this->belongsTo(\App\Model\Product::class);
   }

   public function customer()
   {
         return $this->hasMany(\App\Model\Customer::class);
   }

   public function user()
   {
         return $this->hasMany(\App\Model\User::class);
   }
}
