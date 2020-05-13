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
        return $this->hasMany(\App\models\Addresse::class);
    }
}
