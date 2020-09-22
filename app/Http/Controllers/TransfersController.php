<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Client;

class TransfersController extends Controller
{
    // Verify the account number
    public function verifyAccount(Request $request){
        $data = $request->input('data');

        $client = new Client();
        $result = $client->get('https://api.paystack.co/bank/resolve?account_number='.$data->account_number.'&bank_code='.$data->bank_code, [
            'headers' => ['Content-type' => 'application/json',
                          'Authorization' => 'Bearer sk_test_20def2078ad108d69ad54212aec9d1599540a1f1'],
        ]);

        if($result){
            //create payload
            $info = array( 
                "type" => "nuban", 
                "name" => "John Doe", 
                "account_number" => "0001234567", 
                "bank_code" => "058", 
                "currency" => "NGN"
            );

            $result = $client->post('https://api.paystack.co/transferrecipient', [
                'headers' => ['Content-type' => 'application/json',
                              'Authorization' => 'Bearer sk_test_20def2078ad108d69ad54212aec9d1599540a1f1'],
                
                'json' => $info
            ]);
            
        }

        if($result){
            //create payload
            $info = array(
                 "source" => "balance", 
                 "amount" => "3794800", 
                 "recipient" => "RCP_t0ya41mp35flk40", 
                 "reason" => "Holiday Flexing" 
            );

            $result = $client->post('https://api.paystack.co/transfer', [
                'headers' => ['Content-type' => 'application/json',
                              'Authorization' => 'Bearer sk_test_20def2078ad108d69ad54212aec9d1599540a1f1'],
                
                'json' => $info
            ]);
        }
        
    }

    // Create a transfer recipient
    public function createTransferRecipient(Request $request){

    }
    // Initiate transfer
    // Listen for transfer status
}
