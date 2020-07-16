<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
	protected $fillable = [
   		'promotion_name',
   		'star_date',
   		'end_date',
   		'description',
      'detail'
   ];

    public function products()
    {
        return $this->belongsToMany(\App\Models\Product::class);
    }
    public function productPromotion()
    {
        return $this->hasMany(\App\Models\ProductPromotion::class);
    }
    
}
