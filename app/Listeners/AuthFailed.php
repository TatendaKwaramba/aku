<?php

namespace App\Listeners;

use App\Mail\AccountBlocked;
use Illuminate\Auth\Events\Failed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class AuthFailed
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Failed  $event
     * @return void
     */
    public function handle(Failed $event)
    {
        $user = $event->user;
        if($user === null){
            Log::alert('UNKNOWN User failed to login.', [ $event->credentials]);
        }else{
            Log::info('User failed to login.', ['credentials' => $event->credentials, $user]);

            $user->attempts++;

            if($user->attempts >= 3){
                //Block user
                $user->status = null; //pending account
                $user->times_blocked++;

                Mail::to($user->email)->send(new AccountBlocked($user));
            }
            $user->save();
        }
    }
}
