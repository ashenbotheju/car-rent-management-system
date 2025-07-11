<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    // function vehicleOverview(){
    //     return view('display_vehicle');
    // }

    function vehicles()
    {
        $vehicles = Vehicle::with('images')->paginate(3);
        return view('vehicles', compact('vehicles'));
    }

    function vehicleDetails($vehicle_id)
    {
        $vehicle = Vehicle::where('vehicle_id', $vehicle_id)->first();
        return view('display_vehicle', compact('vehicle'));
    }
}
