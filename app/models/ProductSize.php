<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    protected $fillable = [
    	'product_id',
    	'size',
    	'price'
    ];

    public function productsize()
    {
    	return $this->belongsTo(\App\models\Product::class);
    }
}
