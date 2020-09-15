<?php

namespace App\Jobs;

use GuzzleHttp\Client;
use App\Mail\Disbursements;
use App\User;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class SubmitDisbursements implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data = array();
    protected $email;
    public $tries = 5;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, $email)
    {
        //
        $this->data = $data;
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $array = array();
        $data = array();
        $array = $this->data;

        //
        $client = new Client();
        if($array){   
        $flag = FALSE;
        foreach ($array as $rec) {
            
            if($rec['status'] == "PASS"){

                // Fetch mobile account destination
                $result = $client->get('http://api.akupay.ng:8100/api/v1/client/account/'.$rec['mobile'], [
                    'headers' => ['Content-type' => 'application/json']
                ]);
                 

                //store response
                $res = $result->getBody()->getContents();
                $response = json_decode($res, TRUE);
                
                $account = $response['account'];


                //create payload
                $info = array(
                    "agent_id" => 1472,
                    "admin_id" => 1,
                    "sms" => "Akupay: you have received a payment of 10.00 from Samsoftx.",
                    "type" => "initiate",
                    "disbursements" => [
                        [
                            "id" => $rec['transid'],
                            "mobile" => $rec['mobile'],
                            "destination" => $account, //fetch destination
                            "amount" => $rec['amount']
                        ]
                    ]
                );

                //send data
                $result = $client->post(env('BASE_URL') . '/disbursement/disburse', [
                    'headers' => ['Content-type' => 'application/json'],
                    
                    'json' => $info
                ]);

                //store response
                $res = $result->getBody()->getContents();
                $response = json_decode($res, TRUE);
                
                
                if($response[0]['code'] == 00){
                    $rec['state'] = "Successfully Initiated";
                }elseif($response[0]['code'] == 01){
                    $rec['state'] = "Client does not exist";
                } else {
                    $rec['state'] = "Error";
                }

                array_push($data, $rec);

            }

        }

        //Download CVS
        //Storage::delete('results.csv');
        Storage::put('result/result.csv', '');
        $filepath = \storage_path('app\result\result.csv');
        $handle = fopen($filepath, 'w+');
        $csv_headers = ['transid', 'mobile', 'amount', 'state', 'status'];

        foreach ($dat as $rec) {
            fputcsv($handle, $rec);
        }

        Mail::to($this->email)->send(new Disbursements);
        fclose($handle);


        }else{
            $email = 'kwarambaandy@gmail.com';
            Mail::to($email)->send();
        }
    }
}
