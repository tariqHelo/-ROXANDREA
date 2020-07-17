<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CateFoods extends Model
{
    protected $fillable = [
        'title',
        'published',
    ];
    public function foods(){
        return $this->hasMany("App\Models\Food");
    }
}
