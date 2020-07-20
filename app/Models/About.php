<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        "title",
        "video",
        "description" ,
        "image",
        "facebook",
        "twitter",
        "instagram",
        "published",     
   ];
}
