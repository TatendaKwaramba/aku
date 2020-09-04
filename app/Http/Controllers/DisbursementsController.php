<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DisbursementsController extends Controller
{
    //
    public function getListDisbursments(){
        return view('disbursements.list');
    }

    public function bulkAddDisbursements(){
        return view('disbursements.bulkAddDisbursements');
    }

    public function disbursementsValidate(Request $request){
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

        return view('disbursements.validated_csv', compact('csv_data', 'json_data'));
    }

    public function submitDisbursements(Request $request){
        $array = json_decode($request->json);
        $data = array();

        $flag = FALSE;
        foreach ($array as $rec) {
            if(!$flag){ 
                $flag = TRUE;
                continue; 
            }

            if(TRUE){
                array_push($data, [
                    "agent_id" => 1472,
                    "admin_id" => 1,
                    "sms" => "Akupay: you have received a payment of 10.00 from Samsoftx.",
                    "type" => "initiate",
                    "disbursements" => [
                        [
                            "id" => "L41",
                            "mobile" => $rec[0],
                            "destination" => $rec[1],
                            "amount" => $rec[2]
                        ]
                    ]
                ]);
            }

        }

        return $data;
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
        if(!$mobile || !(preg_match('/^[0-9]{9,15}+$/', $mobile))){
            return FALSE;
        }else{
            return TRUE;
        }
    }


    public function valid_mobile($mobile){
        if(!$mobile || !(preg_match('/^[0-9]{9,12}+$/', $mobile))){
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
