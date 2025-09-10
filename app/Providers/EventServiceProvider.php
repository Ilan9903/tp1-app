<?php

namespace App\Providers;

use App\Listeners\AssignDefaultRoleToUser;

class EventServiceProvider extends
{
    public function boot(): void

    User:
    {
        AssignDefaultRoleToUser::class, 'handle';
    };
}
