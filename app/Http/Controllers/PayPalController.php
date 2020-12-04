<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class PayPalController extends Controller
{
    protected $provider;

	public function __construct() {
	    $this->provider = new ExpressCheckout();
	}
    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function payment()
    {
        $data = [];
        $data['items'] = [
            [
                'name' => 'ItSolutionStuff.com',
                'price' => 100,
                'desc'  => 'Description for ItSolutionStuff.com',
                'qty' => 1
            ]
        ];
  
        $data['invoice_id'] = 1;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = route('payment.success');
        $data['cancel_url'] = route('payment.cancel');
        $data['total'] = 100;
  
        $provider = new ExpressCheckout;
  
        $response = $provider->setExpressCheckout($data);
  
        $response = $provider->setExpressCheckout($data, true);
  
        return redirect($response['paypal_link']);
    }
   
    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function cancel()
    {

        $invoice_id = Session::get('invoice_id');

        Session::forget('invoice_id');

        $payment = Payment::findOrFail($invoice_id);

        $payment->delete();

        return redirect()->back()->with('error', 'Your appointment was not registered because the payment was canceled! Please try again!');
    }
  
    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function success(Request $request)
    {
        $token = $request->get('token');

        //$PayerID = $request->get('PayerID');

        // initaly we paypal redirects us back with a token
        // but doesn't provice us any additional data
        // so we use getExpressCheckoutDetails($token)
        // to get the payment details

        $response = $this->provider->getExpressCheckoutDetails($token);

        $payment_id = $response['INVNUM'];

        // find payment by id
        $payment = Payment::find($payment_id);

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {

        	// set payment status
            $payment->status = 1;
            $payment->date_payment = Carbon::now();

        	// save the payment
        	$payment->save();

        	return redirect('/')->with('success', 'Order ' . $payment->id . ' has been paid successfully!');

        }

        // if response ACK value is not SUCCESS or SUCCESSWITHWARNING
        // we return back with error
        // Delete the payment
        $payment->delete();
  
        return redirect()->back()->with('error', 'Error processing PayPal payment for Order ' . $payment_id . '!');
    }
}
