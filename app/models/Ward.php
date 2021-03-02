<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $fillable = [
        'id',
        'province_id',
   		'name',
        'type',
   ];
}
