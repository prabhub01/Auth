<?php

namespace App\Models;
use App\Models\BusType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;
    protected $fillable = [
        'bus_type_id', 'reg_num', 'seat_capacity'
    ];
    function bus_type(){
        return $this->belongsTo(BusType::Class,'bus_type_id');
    }
}
