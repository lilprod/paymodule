<?php

namespace App\Http\Controllers;

use Session;
use Stripe;
use App\Models\Payment;
use Carbon\Carbon;

use Illuminate\Http\Request;

class StripeController extends Controller
{
   /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('pages.stripe');
    }
   
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 0.7 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "SPARK Stripe Payment"
        ]);

        $payment = new Payment();
        $payment->order_id = 1;
        $payment->order_amount = $request->amount;
        $payment->description = 'SPARK Stripe Payment';
        $payment->paymentmode_id = 3;
        $payment->status = 1;
        $payment->save();
   
        //Session::flash('success', 'Payment successful!');
        return redirect()->route('home')->with('success', 'Payment successful!');
  
    }
}
