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
        $vehicles = Vehicle::paginate(6);
        return view('vehicles', compact('vehicles'));
    }
    function homeVehicles()
{
    $vehicles = Vehicle::take(3)->get(); // Get only the first 2 vehicles
    return view('welcome', compact('vehicles'));
}

    function vehicleDetails($vehicle_id)
    {
        $vehicle = Vehicle::where('vehicle_id', $vehicle_id)->first();
        return view('display_vehicle', compact('vehicle'));
    }
}
