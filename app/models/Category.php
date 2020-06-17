<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
   		'name',
   		'parent_id'
   ];

   public function product()
   {
   		return $this->hasMany(\App\Models\Product::class);
   }

    public function childrens()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
