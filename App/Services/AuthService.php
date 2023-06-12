<?php

namespace App\Services;

use App\Helpers\Session;
use App\Models\User;
use App\Validators\Auth\LoginValidator;

class AuthService
{
    static public function call(array $fields, LoginValidator $validator): bool
    {
        if ($validator->validate($fields)) {
            $user = User::findBy('email', $fields['email']);
            if ($validator->verifyPassword($fields['password'], $user->password)) {
                Session::setUserData($user->id, ['email' => $user->email]);
                return true;
            }
        }

        return false;
    }
}