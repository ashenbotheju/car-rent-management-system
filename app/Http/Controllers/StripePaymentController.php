<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\StripeClient;
use App\Mail\PaymentSuccessMail;
use App\Models\Reservation;
use Illuminate\Support\Facades\Mail;

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
        dd(env('STRIPE_SECRET')); // Add this line before using StripeClient

        $session = $stripe->checkout->sessions->retrieve($request->session_id);

        /** @var \App\Models\User $user */
        $user = \Illuminate\Support\Facades\Auth::user();

        $reservation = Reservation::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->first();

        if ($reservation) {
            $reservation->status = 'confirmed';
            $reservation->save();

            Mail::to($user->email)->send(new PaymentSuccessMail($reservation));

            return redirect()->route('home')->with('success', 'Payment successful and confirmation email sent.');
        }

        return redirect()->route('home')->with('error', 'Reservation not found.');
    }
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
    //mail function
    return redirect()->route('home')->with('success', 'Payment successful.');
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
}
