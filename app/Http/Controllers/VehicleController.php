<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VehicleController extends Controller
{
    function vehicleOverview(){
        return view('display_vehicle');
    }
}
