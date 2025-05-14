<?php

namespace App\Http\Controllers;
use App\Models\Vehicles;
use Illuminate\Http\Request;
use App\Models\Reservation;
use Carbon\Carbon;

class BookingController extends Controller
{
    //
    public function CreateBooking(Request $request)
    {
      
        // Validate the form data
        $validatedData = $request->validate([
            
            'pickupdate' => 'required',
            'dropoffdate' => 'required',
            'daily_rate' => 'required',
            'vehicle_id' => 'required'
        ]);

        //if reservation date range available
    $reservationdata =[
        'user_id' =>auth()->user()->id,
        'vehicle_id' => $validatedData['vehicle_id'],
        'start_date' => $validatedData['pickupdate'],
        'end_date' => $validatedData['dropoffdate'],
        'total_cost' =>$validatedData['daily_rate'] * (Carbon::parse($validatedData['dropoffdate'])->diffInDays(Carbon::parse($validatedData['pickupdate'])) + 1),
        'status' => 'pending',
    ];
     Reservation::create($reservationdata);
       }
}
