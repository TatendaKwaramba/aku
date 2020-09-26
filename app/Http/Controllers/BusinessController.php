<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;


use App\Exceptions\Handler;
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
        $id = $data['id'];
        //$bank code
        //$bank name
        //currency
        $json_data = json_encode($data);
        return view('business.transfers.add', compact('data', 'json_data', 'name', 'account', 'id'));
    }

    public function transfer(Request $request){
        $dat = $request->input();
        $data = array();
        $db = array();

        $client = new Client();

        if(true){
            //create payload
            $info = array( 
                "type" => "nuban", 
                "name" => $dat['name'],
                "account_number" => "0000000000", 
                "bank_code" => "011", 
                "currency" => "NGN"
            );
        
            try {
                // 
                $result = $client->post('https://api.paystack.co/transferrecipient', [
                    'headers' => ['Content-type' => 'application/json',
                                  'Authorization' => 'Bearer sk_test_ae43cf1e9654d0be6067f2c9a4feede25a4a9a96'],
                    
                    'json' => $info
                ]);
    
                $responseData = json_decode($result->getBody(), true);
                $data = (array)$responseData;
            } catch (Throwable $e) {
                report($e);
        
                return back();
            }

            
        }

        if($data['status']){
            //create payload
            $info = array(
                 "source" => "balance", 
                 "amount" => $dat['deposit'], 
                 "recipient" => $data['data']['recipient_code'], 
                 "reason" => "Test Data" 
            );

            $resultt = $client->post('https://api.paystack.co/transfer', [
                'headers' => ['Content-type' => 'application/json',
                              'Authorization' => 'Bearer sk_test_ae43cf1e9654d0be6067f2c9a4feede25a4a9a96'],
                
                'json' => $info
            ]);

            $responseDatta = json_decode($resultt->getBody(), true);
            $db = (array)$responseDatta;
            
            if($db['status']){

                DB::table('transfers')->insert([
                    'id' => $db['data']['id'],
                    'message' => $db['message'],
                    'transfer_code' => $db['data']['transfer_code'],
                    'reference' => $db['data']['reference'],  
                    'name' => $data['data']['name'],
                    'reason' => $db['data']['reason'],
                    'status' => $db['data']['status'],
                    'amount' => $db['data']['amount'],
                    'initiated_by' => Auth::user()->id,
                    'agent_id' => $dat['id'],
                    'transfered_at' => $data['data']['createdAt'],   
                ]);

                return view('business.view')->with('success','Transfer was successfully initiated, You will recieve an OTP code approval');

            } else {
                return view('business.view')->with('error','Transfer was unsuccessful!!');
            }

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

        DB::table('transfers')->insert([
            'event' => $data['event'], 
            'amount' => $data['data']->amount, 
            'source' => $data['data']->source, 
            'transfer_code' => $data['data']->transfer_code,  
            'date' => $data['data']->transferred_at
        ]);

        if($data->event == 'transfer.success'){
            return back()->with('success','Transfer to '.$data->recipient['name'].' has been done successfully');
        }else {
            return back()->with('error','Transfer was unsuccessful!!');
        }
    }

    public function getVerify(Request $request){
        
        $transfers = DB::table('transfers')->select('id', 'name', 'reference', 'transfer_code', 'amount', 'initiated_by', 'agent_id', 'transfered_at')
                                                ->where('status', 'otp')
                                                ->orderBy('transfered_at', 'asc')                                        
                                                ->get();
        
        if ($request->ajax()) {
            return Datatables::of($transfers)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                            $btn = '<a href="/business/'.$row->agent_id.'/'.$row->transfer_code.'/send" data-toggle="tooltip" data-original-title="Verify" class="btn blue deleteItem">Verify</a>';
                            return $btn;
                        }
                    )
                    ->make(true);
        }

        return view('business.verify');
    }

    public function verify(Request $request, $id, $transfercode){
        return view('business.transfers.verification', compact('transfercode', 'id'));
    }

    public function sendVerification(Request $request){
        $data = $request->all();

        //create payload
        $info = array(
            "transfer_code" => $data['transfer_code'],
            "otp" => $data['otp']
        );

        $client = new Client();
        //send verification
        $result = $client->post('https://api.paystack.co/transfer/finalize_transfer', [
            'headers' => ['Content-type' => 'application/json',
                          'Authorization' => 'Bearer sk_test_ae43cf1e9654d0be6067f2c9a4feede25a4a9a96'],
            
            'json' => $info
        ]);

        $responseData = json_decode($result->getBody(), true);
        $res = (array)$responseData;


        //if true update db and return success
        if($res['data']['status'] == 'success'){
            
            
            //create payload
            $amount = "".$res['data']['amount']."";
            $id = (int)$data['id'];
            $float = array(
                "type" => "initiate_topup",
                "commission" => "0",
                "deposit" => $amount,
                "agent_id" => $id,
                "admin_id" => Auth::user()->id
            );

            //send payload

                $ress = $client->post(env('BASE_URL') . '/agent_crud/manage_evalue', [
                    'headers' => ['Content-type' => 'application/json'],
                    
                    'json' => $float
                ]);
            
                $resData = json_decode($ress->getBody(), true);
                $rs = (array)$resData;
                return $rs;

            DB::table('transfers')
            ->where('transfer_code', $data['transfer_code'])
            ->update(['status' => 'success']);

            return back()->with('success', 'Transfer completed successfully');
        } else {
            return back()->with('error', 'Transfer did not complete successfully, Please check with Paystack Dashboard');
        }

    }

}
