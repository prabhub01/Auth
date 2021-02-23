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
        'name', 'start_from', 'state_id', 'district_id', 'price', 'departure_time'
    ];

    function state(){
        return $this->belongsTo(State::class,'state_id');
    }

    function bus(){
        return $this->hasMany(Bus::class);
    }

    function district(){
        return $this->belongsTo(District::class,'district_id');
    }
}
