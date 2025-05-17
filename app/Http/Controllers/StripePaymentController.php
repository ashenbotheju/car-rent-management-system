<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;

class StripePaymentController extends Controller
{
    public function showForm()
    {
        return view('stripe.form');
    }

    public function processPayment(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'stripeToken' => 'required',
            'email' => 'required|email',
        ]);

        // Set your secret key. Remember to switch to your live secret key in production!
        // See your keys here: https://dashboard.stripe.com/account/apikeys
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            $charge = Charge::create([
                'amount' => (int) $id,
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => 'Test Payment from Laravel',
                'receipt_email' => $request->email,
            ]);

            return back()->with('success', 'Payment successful!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    }
}