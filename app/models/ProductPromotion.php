<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPromotion extends Model
{
	protected $table = 'product_promotion';
    protected $fillable = [
   		'product_id',
   		'promotion_id'
   	];
    public function products() 
	{	
		return $this->belongsTo(\App\Models\Product::class);
	}
	public function promotions() 
	{	
		return $this->belongsTo(\App\Models\Promotions::class);
	}
}
