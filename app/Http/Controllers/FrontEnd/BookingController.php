<?php

namespace App\Http\Controllers\FrontEnd;
use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Site\BookingRequest;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postCreate(BookingRequest $request){
        $rooms = Room::where('published' , 1)->get()->count();
        if ($rooms > 0 ){
            Booking::create($request->all());
            session()->flash('msg' , 's: room book successfully');
            return redirect()->back();
        }
        else{
            session()->flash('msg' , "w: sorry we haven't rooms now ");
            return redirect()->back();
        }
        // //dd($request->all());
        // Booking::create($request->all());
        // return redirect()->back();
    }
}
