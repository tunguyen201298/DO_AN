<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = 
    [
    	'name',
    	'username',
    	'password',
    	'email',
    	'role',
    	'phone',
    	'birthdate'
    ];

    public function addresse() 
    {   
        return $this->hasMany(\App\Models\Addresse::class);
    }
     public function bill() 
    {   
        return $this->hasMany(\App\Models\Bill::class);
    }
    public function review()
   {
        return $this->hasMany(\App\Models\Review::class);
   }
}
