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
   		return $this->belongsTo(\App\Models\Product::class);
   }

   public function user()
   {
         return $this->belongsTo(\App\Models\User::class);
   }
   
   public function startReview($product_id)
   {
      $query = Review::where('product_id', $product_id);
      $count_review = $query->count();
      if ($count_review != 0) {
         $sum = $query->sum('rating');
         return $sum/$count_review;
         
      }
      return 0;
   }

}
