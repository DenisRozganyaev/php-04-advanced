<?php

namespace App\Controllers;

use App\Services\Users\CreateService;
use App\Validators\Auth\SignUpValidator;
use Core\Controller;

class AuthController extends Controller
{
    public function login()
    {
        view('auth/login');
    }

    public function logout()
    {
    }

    public function register()
    {
        view('auth/register');
    }

    public function signup()
    {
        $fields = filter_input_array(INPUT_POST, $_POST);
        $validator = new SignUpValidator();

        if ($validator->validate($fields) && CreateService::call($fields)) {
            redirect('login');
        }
        dd($validator->getErrors());
    }

    public function verify()
    {
    }
}
