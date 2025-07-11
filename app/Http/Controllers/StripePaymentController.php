<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\StripeClient;
class StripePaymentController extends Controller
{


public function stripe()
{
    return view('stripe');
}

public function stripeCheckout(Request $request)
{
    $stripe = new StripeClient(env('STRIPE_SECRET'));

    $response = $stripe->checkout->sessions->create([
        'success_url' => route('stripe.checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
        'customer_email' => 'customer@example.com', // Use dynamic email
        'payment_method_types' => ['card'],
        'line_items' => [[
            'price_data' => [
                'product_data' => ['name' => $request->product],
                'unit_amount' => 100 * $request->price, // price in cents
                'currency' => 'LKR',
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',
    ]);

    return redirect($response['url']);
}

public function stripeCheckoutSuccess(Request $request)
{
    $stripe = new StripeClient(env('STRIPE_SECRET'));
    $session = $stripe->checkout->sessions->retrieve($request->session_id);
    // Handle post-payment logic here
    //update reservation status 
    //get latest reservation quering database
    $reservation = \App\Models\Reservation::where('user_id', auth()->id())
        ->orderBy('created_at', 'desc')
        ->first();
        
    if ($reservation) {
        $reservation->status = 'confirmed';
        $reservation->save();
    } else {
        return redirect()->route('home')->with('error', 'Reservation not found.');
    }
    return redirect()->route('home')->with('success', 'Payment successful.');
}
}