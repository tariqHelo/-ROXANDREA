<?php

namespace App\Http\Controllers\FrontEnd;
use App\Models\Booking;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Site\BookingRequest;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postCreate(BookingRequest $request){
        
        //dd($request->all());
        Booking::create($request->all());
        return redirect()->back();
    }
}
