<?php

namespace App\Listeners;

use App\Events\UserApprovedEvent;
use App\Mail\AccountApproved;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class UserApproved
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
     * @param  UserApprovedEvent $event
     * @return void
     */
    public function handle(UserApprovedEvent $event)
    {
        Mail::to($event->getUser()->email)->send(new \App\Mail\UserApproved($event->getUser()));
    }
}
