<?php

namespace App\Listeners;

use App\ActivityLog;
use Illuminate\Auth\Events\Logout;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;

class AuthSuccessfulLogout
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
     * @param  Logout  $event
     * @return void
     */
    public function handle(Logout $event)
    {
        //
        Log::info('Auth->Logout Successful: ', array($event));

        ActivityLog::create([
            'user_id' => Auth::user()->id,
            'name' => Auth::user()->name,
            'action' =>'Logout Successful',
            'data' => '',
            'url' => Request::getUri(),
            'ip' => Request::ip(),
            'roles' => json_encode(Auth::user()->roles),
        ]);
    }
}
