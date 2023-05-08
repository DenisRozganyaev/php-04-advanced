<?php

namespace App;

use App\Additional\ClassTwo;

class ClassOne
{
    public function __construct()
    {
        $three = new ClassTwo();

        d(__METHOD__);
    }
}