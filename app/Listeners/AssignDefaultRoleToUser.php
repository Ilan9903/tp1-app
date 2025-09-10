<?php

namespace App\Listeners;

class AssignDefaultRoleToUser
{
    public function handle(UserCreatedEvent $event) {
        $event -> user -> assignRole('User') -> save();
    }
}
