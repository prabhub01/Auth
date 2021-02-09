<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfirmBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'cus_name', 'cus_phone', 'seats','date', 'price', 'route_id'
    ];

    function route(){
        return $this->belongsTo(Route::Class, 'route_id');
    }
}
