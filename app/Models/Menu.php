<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'title' ,
        'url' ,
        'active' ,
        'parent_id' ,
        'index' ,
        'is_route'
    ];

    public function subMenus(){
        return $this->hasMany("\App\Models\Menu","parent_id","id");
    }
    public function parentMenu(){
        return $this->belongsTo("\App\Models\Menu","parent_id","id");
    }

    public static $routes = [
        'home'      => 'Home Page',    
        'blogs'     => 'Blogs',    
        'rooms'     => 'Rooms',    
        'foods'    => 'Restaurant',    
        'contact'   => 'Contact Us',    
        'about'     => 'About us'
    ];
}
