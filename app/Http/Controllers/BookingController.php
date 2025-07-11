<?php
namespace App\Http\Controllers;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller

{
public function CreateBooking(Request $request)
{
    $validatedData = $request->validate([
        'pickupdate' => 'required|date',
        'dropoffdate' => 'required|date|after_or_equal:pickupdate',
        'daily_rate' => 'required|numeric',
        'vehicle_id' => 'required|exists:vehicles,vehicle_id'
    ]);

    $startDate = Carbon::parse($validatedData['pickupdate'])->format('Y-m-d');
    $endDate = Carbon::parse($validatedData['dropoffdate'])->format('Y-m-d');

    // Check if the vehicle is already booked during the selected period
    $conflict = Reservation::where('vehicle_id', $validatedData['vehicle_id'])
        ->where('status', '!=', 'cancelled') // optional if you want to allow reuse after cancellation
        ->where(function ($query) use ($startDate, $endDate) {
            $query->whereDate('start_date', '<=', $endDate)
                  ->whereDate('end_date', '>=', $startDate);
        })
        ->exists();

    if ($conflict) {
        return back()->withErrors(['error' => 'This vehicle is already booked for the selected date range.']);
    }

    // Calculate total cost
    $days = Carbon::parse($startDate)->diffInDays(Carbon::parse($endDate)) + 1;
    $totalCost = $validatedData['daily_rate'] * $days;

    // Create reservation
    if (!auth()->check()) {
        return redirect()->back()->with('error2', 'You must be logged in to make a reservation.');
    }
    $reservationData = [
        'user_id'     => auth()->user()->id,
        'vehicle_id'  => $validatedData['vehicle_id'],
        'start_date'  => $startDate,
        'end_date'    => $endDate,
        'total_cost'  => $totalCost,
        'status'      => 'pending',
    ];

    $result = Reservation::create($reservationData);

    // return view('payment', [
    //     'reservation_id' => $result->reservation_id,
    //     'total_cost' => $result->total_cost
    // ]);
 return redirect()->route('stripe.checkout', [
    'price' => $reservationData['total_cost'], 
    'product' => $reservationData['vehicle_id']// or whatever field contains the vehicle name
]);
}
}
