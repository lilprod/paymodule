<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Srmklive\PayPal\Services\ExpressCheckout;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    protected $provider;

    public function __construct()
    {
        $this->provider = new ExpressCheckout;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$request = app('request'); 

        //$amount = $request->amount;

        //return view('pages.index', compact('amount'));

        return view('pages.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getFlooz()
    {
        return view('pages.flooz');
    }


    public function unique_code($limit)
    {
        return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postMode(Request $request)
    {
        //Validate method payment field
        $this->validate($request, [
            'mode' => 'required',
        ]);

        if($request->mode == 1){

            return redirect()->route('get_flooz');

        }elseif($request->mode == 2){

            $data = [];

            $data['items'] = [
                [
                    'name' => 'SPARKPAY',
                    'price' => 1,
                    'desc'  => 'SPARK PayPal Payment',
                    'qty' => 1
                ]
            ];

            $payment = new Payment();
            $payment->order_id = 1;
            $payment->order_amount = 1;
            $payment->description = 'SPARK PayPal Payment';
            $payment->paymentmode_id = 2;
            $payment->status = 0;
            $payment->save();
      
            $data['invoice_id'] = $payment->id;
            $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
            $data['return_url'] = route('payment.success');
            $data['cancel_url'] = route('payment.cancel');
            $data['total'] = 1;

            Session::put('invoice_id', $payment->id);
      
            $response = $this->provider->setExpressCheckout($data);
      
            $response = $this->provider->setExpressCheckout($data, true);
      
            return redirect($response['paypal_link']);
            
        }else{

            return redirect()->route('stripe');

        }
    }
}
