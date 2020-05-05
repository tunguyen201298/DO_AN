<?php

namespace App\models;

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
}
