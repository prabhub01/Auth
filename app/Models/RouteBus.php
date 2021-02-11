<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouteBus extends Model
{
    use HasFactory;
    protected $table = "route_has_buses";

    protected $fillable = [
        'bus_id', 'route_id'
    ];
    
}
