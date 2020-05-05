<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    protected $fillable = [
   		'bill_id',
   		'product_id',
   		'quantity',
   		'total'
   ];


	public function bill() 
	{	
		return $this->belongsTo(\App\models\Bill::class);
	}

  public function product() 
  { 
    return $this->hasMany(\App\models\Product::class);
  }
}
