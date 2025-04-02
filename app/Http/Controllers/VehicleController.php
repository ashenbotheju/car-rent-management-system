<?php

namespace App\Http\Controllers;

use App\Models\Vehicles;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    // function vehicleOverview(){
    //     return view('display_vehicle');
    // }

    function vehicles(){
        $vehicles = Vehicles::paginate(3);
        return view('vehicles', compact('vehicles'));
    }

    function vehicleDetails($vehicle_id){
        $vehicle = Vehicles::where('vehicle_id', $vehicle_id)->first();
        return view('display_vehicle', compact('vehicle'));
    }
}
