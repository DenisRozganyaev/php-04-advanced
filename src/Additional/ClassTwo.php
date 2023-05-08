<?php
namespace App\Additional;

use Models\User;

class ClassTwo
{
    public function __construct()
    {
        $three = new ClassThree();
        $user = new User();

        d(__METHOD__);
    }
}