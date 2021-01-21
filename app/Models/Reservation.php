<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    
    use HasFactory;
    protected $fillable = [
        'cus_name', 'cus_phone', 'seats','date', 'price', 'bus_id', 'route_id'
    ];
    
    function route(){
        return $this->belongsTo(Route::Class, 'route_id');
    }
}
