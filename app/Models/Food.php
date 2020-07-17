<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable = [
        'title',
        'price',
        'image',
        'details',
        'published',
        'category_id'
    ];
    public function category(){
        return $this->hasMany('App\Models\CateFoods');
    }
    
}
