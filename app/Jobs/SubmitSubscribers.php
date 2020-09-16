<?php

namespace App\Jobs;

use GuzzleHttp\Client;
use App\Mail\CsvMailer;
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

class SubmitSubscribers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data = array();
    protected $email;
    protected $batch;
    public $tries = 5;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($array, $email, $batch)
    {
        //
        $this->data = $array;
        $this->email = $email;
        $this->batch = $batch;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $array = $this->data;
        
        if($array){    
        $data = array();
        $client = new Client();
        $flag = FALSE;
        foreach ($array as $rec) {
            if(!$flag){
                array_push($data, $rec);
                $flag = TRUE;
            }
            
            if($rec['status'] == "PASS"){

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
                $result = $client->request('POST', env('BASE_URL') .'/client_crud/add', [
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
                    $rec[7] = "Successfully Registered";
                }elseif($response[0]['code'] == 400){
                    $rec[7] = "Invalid Data";
                }else {
                    $rec[7] = "Error";
                }

                $rec['batch'] = $this->batch;
                array_push($data, $rec);  

            }

        }

        //Download CVS
        Storage::delete('results.csv');
        Storage::put('results/results.csv', '');
        $filepath = \storage_path('app\results\results.csv');
        $handle = fopen($filepath, 'w+');
        $csv_headers = ['mobile', 'firstname', 'lastname', 'address', 'email', 'batch', 'state', 'status'];

        foreach ($data as $rec) {
            fputcsv($handle, $rec);
        }

        Mail::to($this->email)->send(new CsvMailer);
        fclose($handle);


        }else{
            $email = 'kwarambaandy@gmail.com';
            Mail::to($email)->send();
        }
        
    }
}
