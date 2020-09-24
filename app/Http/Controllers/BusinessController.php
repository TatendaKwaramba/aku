<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use GuzzleHttp\Client;

class BusinessController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getAddBusiness()
    {
        return view('business.add');
    }

    public function getViewBusiness()
    {
        return view('business.view');
    }

    public function getAddSupervisor()
    {
        return view('business.supervisors.add');
    }

    public function getViewSupervisor()
    {
        return view('business.supervisors.view');
    }

    public function getAddManger()
    {
        return view('business.managers.add');
    }

    public function getViewManager()
    {
        return view('business.managers.view');
    }

    public function getPendingValidations()
    {
        return view('business.validation.view');
    }

    public function getPendingBankTransfers()
    {
        return view('business.bank_validation.view');

    }

    public function addTransfer(Request $request){
        $data = $request->input();
        $name = $data['name'];
        $account = $data['account'];
        //$bank code
        //$bank name
        //currency
        $json_data = json_encode($data);
        return view('business.transfers.add', compact('data', 'json_data', 'name', 'account'));
    }

    public function transfer(Request $request){
        $data = $request->input();

        $client = new Client();

        if(true){
            //create payload
            $info = array( 
                "type" => "nuban", 
                "name" => $data['name'], 
                "account_number" => "0000000000", 
                "bank_code" => "011", 
                "currency" => "NGN"
            );

            $result = $client->post('https://api.paystack.co/transferrecipient', [
                'headers' => ['Content-type' => 'application/json',
                              'Authorization' => 'Bearer sk_test_20def2078ad108d69ad54212aec9d1599540a1f1'],
                
                'json' => $info
            ]);

            $responseData = json_decode($result->getBody(), true);
            $data = (array)$responseData;
            //return $data;
            
        }

        if($data['status']){
            //create payload
            $info = array(
                 "source" => "0000000000", 
                 "amount" => "800", 
                 "recipient" => "RCP_mgp6kxvvryojp3d", 
                 "reason" => "Holiday Flexing" 
            );

            $resultt = $client->post('https://api.paystack.co/transfer', [
                'headers' => ['Content-type' => 'application/json',
                              'Authorization' => 'Bearer sk_test_20def2078ad108d69ad54212aec9d1599540a1f1'],
                
                'json' => $info
            ]);

            $responseDatta = json_decode($resultt->getBody(), true);
            return $responseDatta;
        }
        
    }

    public function showMessage(Request $request){

        /*{
            "event": "transfer.success",
            "data": {
              "domain": "live",
              "amount": 10000,
              "currency": "NGN",
              "source": "balance",
              "source_details": null,
              "reason": "Bless you",
              "recipient": {
                "domain": "live",
                "type": "nuban",
                "currency": "NGN",
                "name": "Someone",
                "details": {
                  "account_number": "0123456789",
                  "account_name": null,
                  "bank_code": "058",
                  "bank_name": "Guaranty Trust Bank"
                },
                "description": null,
                "metadata": null,
                "recipient_code": "RCP_xoosxcjojnvronx",
                "active": true
              },
              "status": "success",
              "transfer_code": "TRF_zy6w214r4aw9971",
              "transferred_at": "2017-03-25T17:51:24.000Z",
              "created_at": "2017-03-25T17:48:54.000Z"
            }
          }*/

        $data = $request->all();

        if($data->event == 'transfer.success'){
            DB::table('transfers')->insert([
                'event' => $data['event'], 
                'amount' => $data['data']->amount, 
                'source' => $data['data']->source, 
                'transfer_code' => $data['data']->transfer_code,  
                'date' => $data['data']->transferred_at
            ]);
            return back()->with('success','Transfer to '.$data->recipient['name'].' has been done successfully');
        }else {
            return back()->with('error','Transfer was unsuccessful!!');
        }
    }


}
