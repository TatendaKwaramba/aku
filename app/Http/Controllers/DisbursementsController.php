<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

use GuzzleHttp\Client;
use App\Http\Requests;
use Yajra\Datatables\Datatables;
use App\Mail\Disbursements;
use App\User;
use App\Jobs\SubmitDisbursements;
use App\Jobs\ApproveDisbursements;


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

        $data_array = array();
        $path =  \storage_path('app/disbursements/disbursements.csv');
        $data = array_map("str_getcsv", file($path));
        $csv_data = array_slice($data, 0);
        $header = array_shift($csv_data);

        foreach($csv_data as $row) {
            $csv[] = array_combine($header, $row);
        }
        // adding hidden columns
        foreach($csv as &$row){
            $row['batch'] = "batch";
            $row['state'] = "state";
            $row['status'] = "status";
            break;
        }

        
        $header = array(
            'transid' => 'transid',
            'mobile' => 'mobile',
            'firstname' => 'firstname',
            'lastname' => 'lastname',
            'amount' => 'amount',
            'batch' => 'batch',
            'state' => 'state',
            'status' => 'status'
        );
        $flag = FALSE;
        foreach ($csv as &$row) {
            if(!$flag){
                array_push($data_array, $header);
                $flag = TRUE;
            }
            $row['batch'] = '';
            $row['state'] = '';

            if(($this->valid_mobile($row['mobile']))  && $this->valid_deposit($row['amount'])){
                $row['status'] = "PASS";
            }else {
                $row['status'] = "FAIL";
            }

            array_push($data_array, $row);
        }

        //return $data_array;
        $json_data = json_encode($data_array);
        unset($data_array[0]);
        if ($request->ajax()) {
            return Datatables::of($data_array)
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
        
        $transactions = DB::table('transactions')->select('transid', 'mobile', 'amount', 'state', 'batch', 'maker')
                                                ->where('maker', '<>', Auth::user()->id)
                                                ->orderBy('transid', 'desc')                                        
                                                ->get();
        
        if ($request->ajax()) {
            return Datatables::of($transactions)
                    ->addIndexColumn()
                    ->addColumn('checkbox', function($row){
                        if($row->state == 'Approved'){
                            return '<div><input id="'.$row->transid.'" class="checks" type="checkbox" disabled/><label for="'.$row->transid.'"></label></div>';
                        } else {
                            if($row->state == 'Successfully Initiated'){
                                if($row->maker == Auth::user()->id){
                                    return '';
                                }
                                return '<div><input id="'.$row->transid.'" type="checkbox" name="transid[]" class="checkall" value="'.$row->transid.'" /><label for="'.$row->transid.'"></label></div>';
                            } 
                        }
                    })
                    ->addColumn('action', function($row){
                        if($row->state == 'Approved'){
                            return '<button class="btn" disabled>Approved</button>';
                        } else {
                            if($row->state !== 'Successfully Initiated'){
                                return '<a href="/disbursements/'.$row->transid.'/delete" data-toggle="tooltip" data-original-title="Verify" class="btn-floating waves-effect waves-light red"><i class = "material-icons">clear</i></a>';
                            }
                            if($row->maker == Auth::user()->id){
                                return '';
                            }
                            $btn = '<a href="/disbursements/'.$row->transid.'/approve" data-toggle="tooltip" data-original-title="Verify" class="btn-floating waves-effect waves-light blue"><i class = "material-icons">check</i></a>
                            <a href="/disbursements/'.$row->transid.'/delete" data-toggle="tooltip" data-original-title="Verify" class="btn-floating waves-effect waves-light red"><i class = "material-icons">clear</i></a>';
                            return $btn;
                        }
                    })
                    ->rawColumns(['action', 'checkbox'])
                    ->make(true);
        }
        $csv_data = \json_encode($transactions);
        return view('disbursements.approve', compact('csv_data'));
    }

    public function validatePayment(Request $request, $transid){
        
        $json_data = json_decode($request->json);
        $data = $json_data;
        $client = new Client();
        $results = DB::table('transactions')
                            ->select('state', 'maker')
                            ->where('transid', '=', $transid)
                            ->get();
        if($results[0]->maker == Auth::user()->id){
            return back()->with('error','Cannot approve transactions that you submitted');
        }
        else {
            if($results[0]->state == "Successfully Initiated"){
                $info = array(
                    "agent_id" => 1472,
                    "admin_id" => 1,
                    "sms" => "Akupay: you have received a new payment",
                    "type" => "validate",
                    "disbursements" => [
                        [
                            "transId" => $transid
                        ]
                    ]
                );
        
                $result = $client->post(env('BASE_URL') . '/disbursement/disburse', [
                    'headers' => ['Content-type' => 'application/json'],
                    
                    'json' => $info
                ]);
                
                DB::table('transactions')
                    ->where('transid', $transid)
                    ->update(['state' => 'Approved']);
        
                return back()->with('success','Transaction has been successfully approved');
            }

        }
                
        return back()->with('error','Could not approve the transaction. Please if its properly initiated');
        //return view('disbursements.approve', compact('data', 'json_data')); 
    }

    public function multiValidatePayment(Request $request){
        $data = $request->input('transid');
        ini_set('max_execution_time', '5000');
        $user = User::findOrFail(Auth::user()->id);
        $email = $user->email;
        $maker = $user->id;
        ApproveDisbursements::dispatch($data, $email, $maker);

        return back()->with('success','Transactions are being processed, an email will be send to '.$email.' when the process has completed');
    }

    public function submitDisbursements(Request $request){
        
        $batch_name = $request->input('batchname');
        ini_set('max_execution_time', '5000');
        $array = json_decode($request->json, true);
        $user = User::findOrFail(Auth::user()->id);
        $email = $user->email;
        $maker = $user->id;
        SubmitDisbursements::dispatch($array, $email, $batch_name, $maker);

        return back()->with('success','Your Batch is being processed! An email will be sent to '.$email.' when done'); 

    }

    public function deleteTransaction(Request $request, $transid){
        DB::table('transactions')->where('transid', $transid)->delete();
        return back()->with('success', 'transaction successfully deleted');
    }

    public function exportTemplate(){

        $filename = "disbursements.csv";
        $handle = fopen($filename, 'w+');
        $csv_headers = ['transid', 'mobile', 'amount'];
        $sample = ['1', '263771895678', '48.8'];

        fputcsv($handle, $csv_headers);
        fputcsv($handle, $sample);
    
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
