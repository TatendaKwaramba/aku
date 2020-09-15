<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

use GuzzleHttp\Client;
use App\Http\Requests;
use Yajra\Datatables\Datatables;
use App\Mail\Disbursements;
use App\User;
use App\Jobs\SubmitDisbursements;


class DisbursementsController extends Controller
{
    //
    public function getListDisbursments(){
        return view('disbursements.list');
    }

    public function bulkAddDisbursements(){
        return view('disbursements.bulkAddDisbursements');
    }

    public function disbursementsValidate(Request $request) 
    {
        Storage::delete('dibursements.csv');
        $file = $request->file('file')->storeAs(
            'disbursements', 'disbursements.csv'
        );
        return "Done";
    }

    public function getDisbursementsValidate(Request $request){

        $path =  \storage_path('app\disbursements\disbursements.csv');
        $data = array_map("str_getcsv", file($path));
        $csv_data = array_slice($data, 0);
        $header = array_shift($csv_data);

        foreach($csv_data as $row) {
            $csv[] = array_combine($header, $row);
        }
        // adding hidden columns
        foreach($csv as &$row){
            $row['state'] = "state";
            $row['status'] = "status";
            break;
        }

        
        //flag to skip the first header row;
        $flag = FALSE;
        foreach ($csv as &$row) {
            $row['state'] = '';

            if(($this->valid_mobile($row['mobile']))  && $this->valid_deposit($row['amount'])){
                $row['status'] = "PASS";
            }else {
                $row['status'] = "FAIL";
            }
        }

        $json_data = json_encode($csv);
        unset($csv[0]);
        if ($request->ajax()) {
            return Datatables::of($csv)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = ' <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Approve" class="btn  deleteItem">Approve</a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('disbursements.validated_csv', compact('csv_data', 'json_data'));
    }

    public function approve(Request $request){

        $path =  \storage_path('app\result\result.csv');
        $data = array_map("str_getcsv", file($path));
        $csv_data = array_slice($data, 0);

        unset($csv_data[0]);
        if ($request->ajax()) {
            return Datatables::of($csv_data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = ' <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Approve" class="btn  deleteItem">Approve</a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('disbursements.approve', compact('csv_data'));
    }

    public function validatePayment(Request $request){
        
        $json_data = json_decode($request->json);
        $data = $json_data;
        $client = new Client();
        $info = array(
            "agent_id" => 1472,
            "admin_id" => 1,
            "sms" => "Akupay: you have received a payment of 10.00 from Samsoftx..",
            "type" => "validate",
            "disbursements" => [
                [
                    "transId" => 1286463
                ]
            ]
        );

        $result = $client->post(env('BASE_URL') . '/disbursement/disburse', [
            'headers' => ['Content-type' => 'application/json'],
            
            'json' => $info
        ]);
        
        //return view('disbursements.approve', compact('data', 'json_data')); 
    }

    public function submitDisbursements(Request $request){
        
        ini_set('max_execution_time', '5000');
        $array = json_decode($request->json, true);
        $user = User::findOrFail(Auth::user()->id);
        $email = $user->email;
        SubmitDisbursements::dispatch($array, $email);

        return back()->with('success','Your Batch is being processed! An email will be sent to '.$email.' when done'); 

    }

    public function exportTemplate(){

        $filename = "disbursements.csv";
        $handle = fopen($filename, 'w+');
        $csv_headers = ['mobile', 'destination', 'amount', 'status'];

        fputcsv($handle, $csv_headers, );
    
        fclose($handle);
    
        $headers = array(
            'Content-Type' => 'text/csv',
        );
    
        return response()->download($filename, 'disbursements.csv', $headers);
    }

    public function getAddDisbursements(){
        return view('disbursements.add');
    }

    // Validation Functions
    public function valid_destination($mobile){
        if(!$mobile || !(preg_match('/^[0-9.\s]{9,15}+$/', $mobile))){
            return FALSE;
        }else{
            return TRUE;
        }
    }


    public function valid_mobile($mobile){
        if(!$mobile || !(preg_match('/^[0-9.\s]{9,12}+$/', $mobile))){
            return FALSE;
        }else{
            return TRUE;
        }
    }

    public function valid_name($name){
        if(!$name || !(\preg_match('/^[a-zA-Z]+$/', $name))){
            return FALSE;
        }else {
            return TRUE;
        }
    }

    public function valid_state($state){
        if(!(preg_match('/^ACTIVE$|^DISABLED$/', $state))){
            return FALSE;
        }else {
            return TRUE;
        }
    }

    public function valid_address($address){
        if(!$address || !(\preg_match('/^[a-zA-Z0-9,.\s]+$/', $address))){
            return FALSE;
        }else {
            return TRUE;
        }
    }

    public function valid_email($email){
        If(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return FALSE;
         }else {
             return TRUE;
         } 
    }

    public function valid_deposit($deposit){
        if(!(\preg_match('/^[0-9.\s]+$/', $deposit))){
            return FALSE;
        }else {
            return TRUE;
        }
    }
}
