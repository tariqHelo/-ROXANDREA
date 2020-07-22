<?php

namespace App\Http\Controllers\FrontEnd;
use App\Models\Food;
use App\Models\Slider;
use App\Http\Controllers\Controller;



class HomeController extends Controller
{
    public function index(){
        $slider = Slider::where("published",1)->orderBy("id" ,"desc")->limit(3)->get();
        $food = Food::where("published",1)->orderBy("id" ,"desc")->limit(3)->get();
        return view()->with('slides',$slides)->with('food',$food);
    }
    
}
