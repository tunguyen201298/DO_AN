<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
     protected $fillable = [
   		'title',
   		'content',
   		'image'
   ];
}
