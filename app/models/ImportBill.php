<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ImportBill extends Model
{
    protected $fillable = [
   		'supplier_id',
   		'total'
   ];


	public function supplier() 
	{	
		return $this->belongsTo(\App\Models\Supplier::class);
	}

  //tên hàng nên them hiểu camel
  public function importBillDetails() 
  { 
    return $this->hasMany(\App\Models\ImportBillDetail::class);
  }
}
