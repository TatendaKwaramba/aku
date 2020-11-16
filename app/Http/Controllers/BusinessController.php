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
        $deposit = $data['deposit'];
        $commission = $data['commission'];

        //$bank code
        //$bank name
        //currency
        $json_data = json_encode($data);
        return view('business.transfers.add', compact('data', 'json_data', 'name', 'account', 'id', 'deposit', 'commission'));
    }

    public function transfer(Request $request){
        $dat = $request->input();
        
        if(($dat['deposit'] > 0) && ($dat['commission'] > 0)){
            return redirect('/business/view')->with('status', 'Please choose one either balance or commission');
        }

        if($dat['deposit'] > $dat['dep']){
            return redirect('/business/view')->with('status', 'Insufficient Balance Left');
        }

        if($dat['commission'] > $dat['com']){
            return redirect('/business/view')->with('status', 'Insufficient Commission Left');
        }

        if($dat['deposit'] > 0){
           $val = $dat['deposit'];
           $reason = "deposit"; 
        }else {
            $val = $dat['commission'];
            $reason = "commission";
        }

        $data = array();
        $db = array();

        $bank_code = DB::table('bank')->select('code')
                                    ->where('name', $dat['bank'])
                                    ->get();

        $client = new Client();

        //Create Transfer Recipient
        if(true){
            $account = $dat['account'];
            $code = $bank_code;
            $agentid = $dat['id'];
            //create payload
            $info = array( 
                "type" => "nuban", 
                "name" => $dat['name'],
                "account_number" => "0000000000", 
                "bank_code" => "011", 
                "currency" => "NGN",
                "description" => $agentid
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
            } catch (\GuzzleHttp\Exception\RequestException $e) {
                $error = $e->getResponse();
                report($e);
                
                $msg = json_decode($error->getBody(), true);
                $ms = (array)$msg;
                $err = $ms['message'];
                return redirect('/business/view')->with('status', 'Initiating Transfer Failed. '.$err.'');
            }
            
        }


        // Initiate Transfer
        if($data['status']){
            //create payload
            $info = array(
                 "source" => "balance", 
                 "amount" => $val, 
                 "recipient" => $data['data']['recipient_code'], 
                 "reason" => $reason 
            );

            try{
                $resultt = $client->post('https://api.paystack.co/transfer', [
                    'headers' => ['Content-type' => 'application/json',
                                  'Authorization' => 'Bearer sk_test_ae43cf1e9654d0be6067f2c9a4feede25a4a9a96'],
                    
                    'json' => $info
                ]);
            }catch (\GuzzleHttp\Exception\RequestException $e) {
                $error = $e->getResponse();
                report($e);
                
                $msg = json_decode($error->getBody(), true);
                $ms = (array)$msg;
                $err = $ms['message'];
                return redirect('/business/view')->with('error', 'Transfer Failed. '.$err.'');
            }

            $responseDatta = json_decode($resultt->getBody(), true);
            $db = (array)$responseDatta;

            //initiate reduction
            if($db['data']['status'] == 'success'){
                try {
                    //code...
                    //initiateReduction($val, $dat['id'], $db['data']['transfer_code'], $db['data']['reason']);
                    $deposit = "0";
                    $commission = "0";
                    $trans_code = $db['data']['transfer_code'];
            
                    if($reason == "deposit"){
                        $deposit = $val;
                    }
                    if($reason == "commission"){
                        $commission = $val; 
                    }
            
                    $float = array(
                        "type" => "initiate_reduction",
                        "commission" => $commission,
                        "deposit" => $deposit,
                        "agent_id" => $dat['id'],
                        "admin_id" => Auth::user()->id
                    );
            
                    //send payload
            
                        $ress = $client->post(env('BASE_URL') . '/agent_crud/manage_evalue', [
                            'headers' => ['Content-type' => 'application/json'],
                            
                            'json' => $float
                        ]);
                    
                        $resData = json_decode($ress->getBody(), true);
                        $rs = (array)$resData;
                        // return $rs;
                            
            
                    DB::table('transfers')
                    ->where('transfer_code', $trans_code)
                    ->update(['status' => 'success']);

                } catch (\Throwable $th) {
                    throw $th;
                }
                
            }
            
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

                return redirect('/business/view')->with('status', 'Transfer Initiation Was Successful. You will receive an OTP code for verification, valid for the next 30 minutes');

            } else {
                return redirect('/business/view')->with('status', 'Transfer Initiation was not successful. Please try again');
            }

        }
    }


    public function showMessage(Request $request){

        $data = array();
        $data = $request->all();

        /*

        {
            
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
        }

        */
    
    
            //if true update db and return success
            if($data['data']['status'] == 'success'){
                
                $deposit = "0";
                $commission = "0";
                $id = $data['data']['description'];
                //create payload
                if($data['data']['reason'] == "deposit"){
                    $deposit = "".$data['data']['amount']."";
                }
                if($data['data']['reason'] == "commission"){
                    $commission = "".$data['data']['amount'].""; 
                }
                $id = (int)$data['id'];
                if(($deposit == "0") && ($commission == "0")){
                    return redirect('/business/view')->with('status', 'An error occured with this transaction.');
                }
                $float = array(
                    "type" => "initiate_reduction",
                    "commission" => $commission,
                    "deposit" => $deposit,
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
                    // return $rs;
    
                DB::table('transfers')
                ->where('transfer_code', $data['transfer_code'])
                ->update(['status' => 'success']);
    
                return redirect('/business/view')->with('status', 'Transfer completed successfully');
            } else {
                return redirect('/business/view')->with('status', 'Transfer did not complete successfully, Please check with Paystack Dashboard');
            }
    }

    public function getVerify(Request $request){
        
        $transfers = DB::table('transfers')->select('id', 'name', 'reference', 'transfer_code', 'reason', 'amount', 'initiated_by', 'agent_id', 'transfered_at')
                                                ->where('status', 'otp')
                                                ->orderBy('transfered_at', 'asc')                                        
                                                ->get();
        
        if ($request->ajax()) {
            return Datatables::of($transfers)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                            $btn = '<a href="/business/'.$row->agent_id.'/'.$row->transfer_code.'/'.$row->reason.'/send" data-toggle="tooltip" data-original-title="Verify" class="btn-floating waves-effect waves-light blue"><i class = "material-icons">check</i></a>';
                            return $btn;
                        }
                    )
                    ->make(true);
        }

        return view('business.verify');
    }

    public function verify(Request $request, $id, $transfercode, $reason){
        return view('business.transfers.verification', compact('transfercode', 'id', 'reason'));
    }

    public function sendVerification(Request $request){
        $data = array();
        $data = $request->all();

        //create payload
        $info = array(
            "transfer_code" => $data['transfer_code'],
            "otp" => $data['otp']
        );

        $client = new Client();
        //send verification
        try {
            $result = $client->post('https://api.paystack.co/transfer/finalize_transfer', [
                'headers' => ['Content-type' => 'application/json',
                              'Authorization' => 'Bearer sk_test_dedd2e4695debbf40c06b9e6d7920d4aab95810d'],
                
                'json' => $info
            ]);
    
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $error = $e->getResponse();
            report($e);
            
            $msg = json_decode($error->getBody(), true);
            $ms = (array)$msg;
            $err = $ms['message'];
            return back()->with('error', 'Verification Failed. '.$err.'');
        }

        $responseData = json_decode($result->getBody(), true);
        $res = (array)$responseData;
    
    
            //if true update db and return success
            if($res['data']['status'] == 'success'){
                
                $deposit = "0";
                $commission = "0";
                //create payload
                if($data['reason'] == "deposit"){
                    $deposit = "".$res['data']['amount']."";
                }
                if($data['reason'] == "commission"){
                    $commission = "".$res['data']['amount'].""; 
                }
                $id = (int)$data['id'];
                if(($deposit == "0") && ($commission == "0")){
                    back()->with('error', 'An error occured with this transaction.');
                }
                $float = array(
                    "type" => "initiate_reduction",
                    "commission" => $commission,
                    "deposit" => $deposit,
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
                    // return $rs;
    
                DB::table('transfers')
                ->where('transfer_code', $data['transfer_code'])
                ->update(['status' => 'success']);
    
                return back()->with('success', 'Transfer completed successfully');
            } else {
                return back()->with('error', 'Transfer did not complete successfully, Please check with Paystack Dashboard');
            }
        

    }

    public function initiateReduction($val, $id, $transfercode, $reason){

        $deposit = "0";
        $commission = "0";

        if($reason == "deposit"){
            $deposit = $val;
        }
        if($reason == "commission"){
            $commission = $val; 
        }

        $float = array(
            "type" => "initiate_reduction",
            "commission" => $commission,
            "deposit" => $deposit,
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
            // return $rs;

        DB::table('transfers')
        ->where('transfer_code', $transfercode)
        ->update(['status' => 'success']);
    }

}
