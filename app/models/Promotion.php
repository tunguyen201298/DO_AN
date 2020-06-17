<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
	protected $fillable = [
   		//'product_id', // thèn ni ko có đúng  kodaj nằm bên bảng trung gian
   		'promotion_name',
   		'star_date',
   		'end_date',
   		'description',
      'detail'
   ];

    public function product()
    {
        return $this->belongsToMany(\App\Models\Product::class);
    }
}
