<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
       protected $fillable = [
        'user_id',
        'vehicle_id',
        'start_date',
        'end_date',
        'total_cost',
        'status',
    ];
}
