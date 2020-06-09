<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ImgLink extends Model
{
    protected $fillable = [
   		'link',
   		'product_id'
   ];

    public function product() 
	{	
		return $this->belongsTo(\App\Models\Product::class);
	}
}
