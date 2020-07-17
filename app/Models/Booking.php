<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable=[
        "offer_id", 
        "room_id",
        "name",
        "email",
        "phone", 
        "check_in", 
        "check_out", 
        "adults",
        "children"
    ];


    public function offer(){
        $this->belongsTo('App\Models\Offer');
    }
    public function room(){
        $this->belongsTo('App\Models\Room');
    }
}
