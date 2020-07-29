<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable=[
        "room_id",
        "check_in", 
        "check_out", 
       "adults",
    ];

    public function room(){
        $this->belongsTo('App\Models\Room');
    }
}
