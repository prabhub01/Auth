<?php

namespace App\Models;
use App\Models\Bus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'start_from', 'final_destination', 'price', 'bus_id'
    ];
    
    function bus(){
        return $this->belongsTo(Bus::Class, 'bus_id');
    }
}
