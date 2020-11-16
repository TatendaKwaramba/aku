<?php

namespace App\Jobs;

use GuzzleHttp\Client;
use App\Mail\Disbursements;
use App\Mail\FailedDisbursements;
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
use Illuminate\Support\Facades\DB;

class SubmitDisbursements implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data = array();
    protected $email;
    protected $batch;
    protected $maker;
    public $tries = 5;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, $email, $batch, $maker)
    {
        //
        $this->data = $data;
        $this->email = $email;
        $this->batch = $batch;
        $this->maker = $maker;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = array();
        $array = array();
        $array = $this->data;
        //
        $client = new Client();
        if($array){   
        $flag = FALSE;
        foreach ($array as $rec) {
            if(!$flag){
                array_push($data, $rec);
                $flag = TRUE;
            }
            
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
                    "agent_id" => 11,
                    "admin_id" => 1,
                    "sms" => "Akupay: you have received a payment of ".$rec['amount'],
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
                    $rec['transid'] = $response[0]['transaction']['id'];
                }elseif($response[0]['code'] == 01){
                    $rec['state'] = "Transactional Amount exceeds current balance";
                } else {
                    $rec['state'] = "Error";
                }

                $rec['batch'] = $this->batch;
                if($rec['state'] == 00){
                    DB::table('transactions')->insert([
                        'transid' => $rec['transid'], 
                        'mobile' => $rec['mobile'], 
                        'amount' => $rec['amount'], 
                        'batch' => $rec['batch'], 
                        'state' => $rec['state'], 
                        'status' => $rec['status'],
                        'maker' =>  $this->maker,
                        'created_at' => $response[0]['transaction']['date']
                    ]);

                }

                array_push($data, $rec);

            }

        }

        //Storage::delete('results.csv');
        Storage::put('result/result.csv', '');
        $filepath = \storage_path('app/result/result.csv');
        $handle = fopen($filepath, 'w+');
        $csv_headers = ['transid', 'mobile', 'amount', 'batch', 'state', 'status'];

        foreach ($data as $rec) {
            fputcsv($handle, $rec);
        }

        Mail::to($this->email)->send(new Disbursements);
        fclose($handle);


        }
    }

    public function failed(Throwable $exception)
    {
        // Send user notification of failure, etc...
        $message = 'Bulk transaction submission failed, Please check your network and try again.';
        Mail::to($this->email)->send(new FailedDisbursements);
    }
}
