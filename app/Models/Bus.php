<?php

namespace App\Models;
use App\Models\BusType;
use App\Models\Route;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bus extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'bus_type_id', 'route_id', 'reg_num', 'seat_capacity'
    ];

    protected $dates = ['deleted_at'];

    function bus_type(){
        return $this->belongsTo(BusType::class,'bus_type_id');
    }
    function route(){
        return $this->belongsTo(Route::class,'route_id');
    }
}
