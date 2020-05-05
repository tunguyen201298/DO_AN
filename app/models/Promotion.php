<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
	protected $fillable = [
   		'product_id',
   		'promotion_name',
   		'star_date',
   		'end_date',
   		'description',
      'detail'
   ];

   	public function product()
    {
    	return $this->belongsTo(\App\models\Product::class);
    }

}
