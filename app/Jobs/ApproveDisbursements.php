<?php

namespace App\Jobs;

use GuzzleHttp\Client;
use App\Mail\ApproveMail;
use App\Mail\FailedApprove;
use App\User;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApproveDisbursements implements ShouldQueue
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
        //
        $data = array();
        $data = $this->data;
        $client = new Client();

        foreach($data as $rec){
            $results = DB::table('transactions')->select('transid', 'mobile', 'amount', 'state')->get();

            if($results[0]->state == 'Successfully Initiated'){
                $info = array(
                    "agent_id" => 1472,
                    "admin_id" => 1,
                    "sms" => "Akupay: you have received a new payment",
                    "type" => "validate",
                    "disbursements" => [
                        [
                            "transId" => $rec
                        ]
                    ]
                );
        
                $result = $client->post(env('BASE_URL') . '/disbursement/disburse', [
                    'headers' => ['Content-type' => 'application/json'],
                    
                    'json' => $info
                ]);
                
                DB::table('transactions')
                    ->where('transid', $rec)
                    ->update(['state' => 'Approved']);
                }
            
            }

            $message = array(
                "message" => 'Bulk transaction approval process is complete!'
            );
            Mail::to($this->email)->send(new ApproveMail($message));

    }

    public function failed(Throwable $exception)
    {
        // Send user notification of failure, etc...
        Mail::to($this->email)->send(new FailedApprove);
    }
}
