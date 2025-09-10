<?php

namespace App\Listeners;

use App\Models\User;

class AssignDefaultRoleToUser
{
    public function handle(User $user) {
        $user -> assignRole('User') -> save();
    }
}
