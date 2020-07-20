<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Slider;



class HomeController extends Controller
{
    public function index(){
        $slider = Slider::where("published",1)->orderBy("id" ,"desc")->limit(3)->get();
    }
    
}
