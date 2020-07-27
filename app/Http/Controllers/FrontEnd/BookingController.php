<?php

namespace App\Http\Controllers\FrontEnd;
use App\Models\Booking;
use App\Models\Room;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postCreate(BookingRequest $request){
        
        Booking::create($request->all());

        return redirect()->back();
    }
}
