<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        "title", "subtitle","url" , "button_text", "image", "published"
   ];
}
