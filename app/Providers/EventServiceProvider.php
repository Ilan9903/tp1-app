<?php

namespace App\Providers;

use App\Listeners\AssignDefaultRoleToUser;
use Carbon\Laravel\ServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Registered::class => [
            AssignDefaultRoleToUser::class,
        ]
    ];
}
