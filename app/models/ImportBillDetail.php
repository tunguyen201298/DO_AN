<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ImportBillDetail extends Model
{
    protected $fillable = [
   		'import_bill_id',
      'product_id',
      'quantity',
      'price',
   		'total'
   ];
	
  public function importbill() 
  { 
    return $this->belongsTo(\App\Models\ImportBill::class);
  }
  public function product() 
  { 
    return $this->belongsTo(\App\Models\Product::class);
  }
}
