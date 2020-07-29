<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMe extends Model
{
    protected $table='contact_me';
    protected $fillable=[
    'name',
    'email',
    'subject',
    'message',
    ];
}