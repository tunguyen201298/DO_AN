<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    	'category_id',
    	'product_name',
    	'quantity',
    	'detail',
        'price',
        'img_link',
        'qty_number_sell'
    ];

    public function imglink() 
    {	
		return $this->hasMany(\App\models\ImgLink::class);
	}

    public function productsize() 
    {   
        return $this->hasMany(\App\models\ProductSize::class);
    }

    public function invoicedetail() 
    {   
        return $this->hasMany(\App\Models\InvoiceDetail::class);
    }

    public function category() 
    {   
        return $this->belongsTo(\App\models\Category::class);
    }

    public function review() 
    {   
        return $this->hasMany(\App\models\Review::class);
    }

    public function promotion() 
    {   
        return $this->belongsTo(\App\models\Promotion::class);
    }
}
