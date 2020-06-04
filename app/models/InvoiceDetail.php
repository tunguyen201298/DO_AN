<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    protected $fillable = [
   		'bill_id',
   		'product_id',
   		'quantity',
   		'total',
      'product_name'
   ];


	public function bill() 
	{	
		return $this->belongsTo(\App\Models\Bill::class);
	}

  public function product() 
  { 
    return $this->belongsTo(\App\Models\Product::class);
  }
}
