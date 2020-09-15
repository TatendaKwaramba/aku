<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

use GuzzleHttp\Client;
use App\Http\Requests;
use Yajra\Datatables\Datatables;
use App\Mail\CsvMailer;
use App\User;
use App\Jobs\SubmitSubscribers;

class ClientController extends Controller
{
    public function getListClient(){
        return view('clients.list');
    }

    public function bulkAddClients(){
        return view('clients.bulkAddClients');
    }

    public function bulkValidate(Request $request) 
    {
        Storage::delete('subscribers.csv');
        $file = $request->file('file')->storeAs(
            'subscribers', 'subscribers.csv'
        );
        return "Done";
    }

    public function getBulkValidate(Request $request) 
    {
            $path =  \storage_path('app\subscribers\subscribers.csv');
            $data = array_map("str_getcsv", file($path));
            $csv_data = array_slice($data, 0);
            $header = array_shift($csv_data);

            foreach($csv_data as $row) {
                $csv[] = array_combine($header, $row);
            }

            // adding hidden columns
            foreach($csv as &$row){
                $row['deposit'] = "deposit";
                $row['state'] = "state";
                $row['status'] = "status";
                break;
            }
            //flag to skip the first header row;
            $flag = FALSE;
            foreach ($csv as &$row) {
                if(!$flag){ 
                    $flag = TRUE;
                    continue; 
                }

                $row['deposit'] = "0";
                $row['state'] = "ACTIVE";

                if(!(($this->valid_mobile($row['mobile'])) && ($this->valid_name($row['firstname'])) && ($this->valid_name($row['lastname'])))){
                    $row['status'] = "FAIL";
                }else {
                    if(!($this->valid_address($row['address']))){
                        // invalid address
                        $row['status'] = "Invalid Address";
                    }elseif(!($this->valid_email($row['email']))){
                        // invalid email address
                        $row['status'] = "Invalid Email";
                    }
                    $row['status'] = "PASS";
                }
            }

            $json_data = json_encode($csv);
            unset($csv[0]);
            if ($request->ajax()) {
                return Datatables::of($csv)
                        ->addIndexColumn()
                        ->make(true);
            }
        
        return view('clients.validated_csv', compact('csv_data', 'json_data'));  
    }

    public function submitUsers(Request $request){
   
        ini_set('max_execution_time', '5000');
        $array = json_decode($request->json, true);

        $user = User::findOrFail(Auth::user()->id);
        $email = $user->email;

        //Dispatch a Job
        SubmitSubscribers::dispatch($array, $email);
        
        return back()->with('success','Your Batch is being processed! An email will be sent to '.$email.' when done');

    }

    public function exportTemplate(){

            $filename = "subscribers.csv";
            $handle = fopen($filename, 'w+');
            $csv_headers = ['mobile', 'firstname', 'lastname', 'address', 'email'];

            fputcsv($handle, $csv_headers );
        
            fclose($handle);
        
            $headers = array(
                'Content-Type' => 'text/csv',
            );
        
            return response()->download($filename, 'subscribers.csv', $headers);
    }

    public function disburmentsValidate(Request $request){
        $file = $request->file('file');
        if ($request->hasFile('file')) {
            $path = $request->file('file')->getRealPath();
            $data = array_map("str_getcsv", file($path));
            $csv_data = array_slice($data, 0);

            //flag to skip the first header row;
            $flag = FALSE;
            foreach ($csv_data as &$row) {
                if(!$flag){ 
                    $flag = TRUE;
                    continue; 
                }

                if(($this->valid_mobile($row[0])) && $this->valid_destination($row[1])  && $this->valid_deposit($row[2])){
                    $row[3] = "PASS";
                }else {
                    $row[3] = "FAIL";
                }
            }

            $json_data = json_encode($csv_data);
        }

        return view('clients.validated_csv', compact('csv_data', 'json_data'));
    }

    public function submitDisbursment(Request $request){
        return $request->input('json');
    }

    public function exportDisbursmentsTemplate(){

        $filename = "disbursments.csv";
        $handle = fopen($filename, 'w+');
        $csv_headers = ['mobile', 'destination', 'amount', 'status'];

        fputcsv($handle, $csv_headers);
    
        fclose($handle);
    
        $headers = array(
            'Content-Type' => 'text/csv',
        );
    
        return response()->download($filename, 'disbursments.csv', $headers);
}

    public function getAddClient(){
        return view('clients.add');
    }

    public function getUpdateClient(){
        return view('clients.update');
    }

    // Validatio Functions
    public function valid_destination($mobile){
        if(!$mobile || !(preg_match('/^[0-9]{9}+$/', $mobile))){
            return FALSE;
        }else{
            return TRUE;
        }
    }


    public function valid_mobile($mobile){
        if(!$mobile || !(preg_match('/^[0-9\s]{9,12}+$/', $mobile))){
            return FALSE;
        }else{
            return TRUE;
        }
    }

    public function valid_name($name){
        if(!$name || !(\preg_match('/^[a-zA-Z\s]+$/', $name))){
            return FALSE;
        }else {
            return TRUE;
        }
    }

    public function valid_state($state){
        if(!(preg_match('/^ACTIVE$|^INACTIVE$/', $state))){
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
