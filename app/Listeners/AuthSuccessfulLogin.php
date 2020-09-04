<?php

namespace App\Listeners;

use App\ActivityLog;
use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Carbon\Carbon;

class AuthSuccessfulLogin
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
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        Log::info('Auth->Login Successful :', array('event'=>$event, 'IP'=>Request::ip()));
        //
        $user = $event->user;
        $user->logged_at = Carbon::now();
        $user->logins++;
        $user->attempts = 0;
        $user->save();

        ActivityLog::create([
            'user_id' => Auth::user()->id,
            'name' => Auth::user()->name,
            'action' =>'Auth Successful',
            'data' => '',
            'url' => Request::getUri(),
            'ip' => Request::ip(),
            'roles' => json_encode(Auth::user()->roles),
        ]);
    }
}
