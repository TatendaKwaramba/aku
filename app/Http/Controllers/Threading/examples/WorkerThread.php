<?php

class workerThread extends Thread {
    public function __construct($array)
    {
        $this->data = $array;
    }

    public function run(){
        $array = $this->data;
        $data = array();
        $client = new Client();
        $flag = FALSE;
        foreach ($array as $rec) {
            if(!$flag){
                array_push($data, $rec); 
                $flag = TRUE;
                continue; 
            }

            if($rec['state'] !== "FAIL"){

                //create payload
                $info = array(
                    "imei" => "357925071763103",
                    "admin_id" => 1,
                    "channel" => "ANDROID",
                    "clients" => [[
                        "cardId" => "",
                        "clientClassOfServiceId" => [
                            "id" => 14
                        ],
                        "email" => $rec['email'],
                        "pin" => "",
                        "deposit" => 0,
                        "lastname" => $rec['lastname'],
                        "agentId" => [
                            "id" => 914
                        ],
                        "firstname" => $rec['firstname'],
                        "address" => $rec['address'],
                        "documentId" => [
                            "vatRegistered" => false,
                            "gender" => "Male",
                            "idNumber" => "04065570X07"
                        ],
                        "mobile" => $rec['mobile'],
                        "idNumber" => "04065570X07"
                    ]]
                );

                //send data
                $result = $client->post(env('BASE_URL') .'/client_crud/add', [
                    'headers' => ['Content-type' => 'application/json'],
                    'json' => $info
                ]);

                //store response
                $res = $result->getBody()->getContents();
                $response = json_decode($res, TRUE);

                if($response[0]['code'] == 00){
                    $rec[7] = "Successfully Registered";
                }elseif($response[0]['code'] == 01){
                    $rec[7] = "Error 2";
                }elseif($response[0]['code'] == 111){
                    $rec[7] = "User Already Exists";
                }elseif($response[0]['code'] == 400){
                    $rec[7] = "Invalid Data";
                }else {
                    $rec[7] = "Error";
                }

                array_push($data, $rec);  

            }

        }

        //Download CVS
        Storage::delete('results.csv');
        Storage::put('results/results.csv', '');
        $filepath = \storage_path('app\results\results.csv');
        $handle = fopen($filepath, 'w+');
        $csv_headers = ['mobile', 'firstname', 'lastname', 'state', 'address', 'email', 'deposit', 'status'];

        foreach ($data as $rec) {
            fputcsv($handle, $rec);
        }
    
        $user = User::findOrFail(Auth::user()->id);

        Mail::to($user->email)->send(new CsvMailer);
        fclose($handle);

    }
}

?>