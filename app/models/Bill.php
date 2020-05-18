<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
	protected $fillable = [
   		'user_id',
   		'name',
   		'phone',
   		'address',
   		'total'
   ];

   	public function invoiceDetails()
    {
    	return $this->hasMany(\App\Models\InvoiceDetail::class);
    }

    public function customer()
    {
      return $this->belongsTo(\App\Model\Customer::class);
    }
    public function user()
   {
      return $this->belongsTo(\App\User::class);
   }

}
