<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'name' ,
        'email' ,
        'website' ,
        'comment' ,
        'blog_id' ,
        'published'
    ];

    protected $appends = ['blog_name'];

    public function blog(){

    $this->belongsTo('App\Models\Blog');

    }
}
