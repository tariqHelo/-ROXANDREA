<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title',
        'published',
    ];
    public function blogs(){
        return $this->hasMany("App\Models\Blog");
    }
    public function foods(){
        return $this->hasMany("App\Models\Food");
    }
}
