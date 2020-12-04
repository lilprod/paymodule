<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class FloozController extends Controller
{

    public function unique_code($limit)
    {
        return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
    }


    public function pay(Request $request)
    {
        //Validate phone_number,  order_amount fields
        
        $this->validate($request, [
            'phone_number' => 'required',
            'order_amount' => 'required',
        ]);

        $identifier = '';

        $identifier = $this->unique_code(9);

        $response = Http::post('https://paygateglobal.com/api/v1/pay', [
            'auth_token' => 'a81d1e51-bf4c-4fa1-ad94-ef30eb442c58',
            'phone_number' => $request->phone_number,
            'amount' => $request->order_amount,
            'description' => 'SPARK Flooz Payment',
            'identifier' => $identifier,
        ]);

        $result = $response->getBody()->getContents();

        $data = json_decode($result, true);

        if(!empty($data['error_code'])){
                
            return back()->with('error', 'Erreur Payment!');
            
        }else{
            
            if($data['status'] == 0){

                $resp = Http::post('https://paygateglobal.com/api/v1/status', [
                    'auth_token' => 'a81d1e51-bf4c-4fa1-ad94-ef30eb442c58',
                    'tx_reference' => $data['tx_reference'],
                ]);

                $reslt = $resp->getBody()->getContents();

                $obj = json_decode($reslt, true);

                    if($obj['status'] == 0){

                        $payment = new Payment();
                        $payment->order_id = 1;
                        $payment->order_amount = $request->order_amount;
                        $payment->description = $obj['status'];
                        $payment->tx_reference = $obj['tx_reference'];
                        $payment->identifier = $obj['identifier'];
                        $payment->payment_reference = $obj['payment_reference'];
                        $payment->paymentmode_id = 1;
                        $payment->payment_method = $obj['payment_method'];
                        $payment->date_payment = Carbon::now();
                        $payment->status = 1;
                        $payment->save();

                        return redirect()->route('home')->with('success', 'Paiement réussi avec succès');

                    }elseif($obj['status'] == 2){

                        return back()->with('error', 'Paiement En cours.');

                    }elseif($obj['status'] == 4){

                        return back()->with('error', 'Paiement Expiré.');

                    }elseif($obj['status'] == 6){

                        return back()->with('error', 'Erreur Paiement! Annulé.');

                    }

            }elseif($data['status'] == 2){

                return back()->with('error', 'Erreur Payment! Jeton d\' authentification invalide.');

            }elseif($data['status'] == 4){

                return back()->with('error', 'Erreur Paiement! Paramètres Invalides.');

            }elseif($data['status'] == 6){

                return back()->with('error', 'Error Paiement! Doublons détectées. Une transaction avec le même identifiant existe déja.');
            }
        
        }
    }
}
