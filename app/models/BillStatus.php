<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillStatus extends Model
{
	protected $table = 'bill_status';
    protected $fillable = [
    	'id',
   		'name',
   ];


  
}
