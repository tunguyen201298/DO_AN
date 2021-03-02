<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
	protected $fillable = [
        'id',
   		'user_id',
        'status_id',
   		'name',
   		'phone',
   		'address',
        'total',
        'created_at'
   ];

   	public function invoiceDetails()
    {
    	return $this->hasMany(\App\Models\InvoiceDetail::class);
    }

    public function statusBill()
    {
      return $this->belongsTo(\App\Models\StatusBill::class, 'status_id');
    }
    public function user()
   {
      return $this->belongsTo(\App\User::class);
   }

}