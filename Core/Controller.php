<?php

namespace Core;

use App\Validators\Base\BaseValidator;

class Controller
{
    public function before(string $action, array $params = []): bool
    {
        return true;
    }

    public function after(string $action) {}

    protected function getErrors(array $fields, BaseValidator $validator, $errors = []): array
    {
        return [
            'fields' => $fields,
            'errors' => array_merge($validator->getErrors(), $errors)
        ];
    }
}
