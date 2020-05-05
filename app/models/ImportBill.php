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
		return $this->belongsTo(\App\models\Supplier::class);
	}

  public function importbilldetail() 
  { 
    return $this->hasMany(\App\models\ImportBillDetail::class);
  }
}
