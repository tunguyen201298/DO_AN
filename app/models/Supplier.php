<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
   		'name',
   		'street',
   		'street_1',
   		'street_2',
   		'phone',
   		'email'
   ];


	public function importbill() 
	{	
		return $this->hasMany(\App\models\ImportBill::class);
	}

}
