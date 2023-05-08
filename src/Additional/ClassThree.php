<?php

namespace App\Additional;

use Models\User;

class ClassThree
{
    public function __construct()
    {
        $user = new User();
        d(__METHOD__);
    }
}