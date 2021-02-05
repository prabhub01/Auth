<?php

namespace App\Models;
use App\Models\Bus;
use App\Models\State;
use App\Models\District;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'start_from', 'state_id', 'district_id', 'price', 'bus_id'
    ];
    
    function bus(){
        return $this->belongsTo(Bus::Class,'bus_id');
    }

    function state(){
        return $this->belongsTo(State::Class,'state_id');
    }

    function district(){
        return $this->belongsTo(District::Class,'district_id');
    }
}
