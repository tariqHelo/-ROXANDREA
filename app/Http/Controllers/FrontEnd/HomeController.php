<?php

namespace App\Http\Controllers\FrontEnd;
use App\Models\Food;
use App\Models\Room;
use App\Models\Slider;
use App\Models\ContactMe;
use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\CreateRequest;



class HomeController extends Controller
{
    public function index(){

        $slider = Slider::where("published",1)->orderBy("id" ,"desc")->limit(3)->get();
        $foods = Food::where("published",1)->orderBy("id" ,"desc")->limit(3)->get();
        return view('frontend.home.index')->with('slider',$slider)->with('foods',$foods);
    }

    public function about(){
     return view('frontend.home.about');
    }

    public function contact(){
        return view('frontend.home.contact');
    }

    public function postContact(CreateRequest $request){
        dd($request->all());
        ContactMe::create($request->all());
        session()->flash("msg","s: Thank you for your contact");
        return redirect(route("contact"));
    }


    public function foods(){
     $foods = Food::where("published",1)->orderBy("id" , "desc")->limit(3)->get();
        return view('frontend.home.foods')->withFoods($foods);
    }

    public function rooms(){
        $rooms=Room::where('published',1)->orderBy("id","desc")->paginate(4);
        return view('frontend.rooms.rooms')->withRooms($rooms);
    }


    
}
