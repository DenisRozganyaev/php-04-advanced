<?php

namespace App\Services\Users;

use App\Models\User;

class CreateService
{
    static public function call($fields = []): bool
    {
        unset($fields['password_confirm']);

        $fields['password'] = password_hash($fields['password'], PASSWORD_BCRYPT);

        return User::create($fields);
    }
}