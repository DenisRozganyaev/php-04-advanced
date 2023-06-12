<?php

namespace App\Validators;

use App\Validators\Base\BaseValidator;

class FoldersValidator extends BaseValidator
{
    protected array $rules = [
        'title' => '/.{3,255}$/i',
    ];

    protected array $errors = [
        'title' => 'Title should be more then 3 symbols but less then 255'
    ];
}
