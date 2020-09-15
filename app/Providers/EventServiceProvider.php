<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\UserApprovedEvent' => [
            'App\Listeners\UserApproved',
        ],

        'App\Events\UserCreatedEvent' => [
            'App\Listeners\UserCreated',
        ],

        'Illuminate\Auth\Events\Attempting' => [
            'App\Listeners\AuthAttempt',
        ],

        'Illuminate\Auth\Events\Login' => [
            'App\Listeners\AuthSuccessfulLogin',
        ],

        'Illuminate\Auth\Events\Logout' => [
            'App\Listeners\AuthSuccessfulLogout',
        ],

        'Illuminate\Auth\Events\Lockout' => [
            'App\Listeners\AuthLockout',
        ],

        'Illuminate\Auth\Events\Failed' => [
            'App\Listeners\AuthFailed',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
