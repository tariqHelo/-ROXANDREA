<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'summary',
        'image',
        'details',
        'user_id',
        'category_id',
        'published'
    ];

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
