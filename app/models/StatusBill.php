<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusBill extends Model
{
    protected $fillable = [
    	'id',
   		'name',
   ];
    public function bill()
   {
      return $this->hasMany(\App\Models\Bill::class);
   }
}
