<?php

namespace App\Validators\Auth;

use App\Models\User;
use App\Validators\Base\BaseValidator;

class Base extends BaseValidator
{
    public function checkEmailOnExists(string $email): bool
    {
        $result = (bool)User::findBy('email', $email);

        if ($result) {
            $this->setError('email', 'Email already exists!');
        }

        return $result;
    }
}
