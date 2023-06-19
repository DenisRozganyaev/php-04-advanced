<?php

namespace App\Controllers;

use App\Helpers\Session;
use App\Services\AuthService;
use App\Services\Users\CreateService;
use App\Validators\Auth\LoginValidator;
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
        Session::destroy();
        redirect('login');
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

        view('auth/register', $this->getErrors($fields, $validator));
    }

    public function verify()
    {
        $fields = filter_input_array(INPUT_POST, $_POST);
        $validator = new LoginValidator();

        if (AuthService::call($fields, $validator)) {
            redirect('dashboard');
        }

        view('auth/login', $this->getErrors($fields, $validator));
    }

    public function before(string $action, array $params = []): bool
    {
        if (in_array($action, ['login', 'register']) && Session::check()) {
            if (!empty($_SERVER['HTTP_REFERER'])) {
                redirectBack();
            } else {
                redirect();
            }
        }

        return parent::before($action);
    }
}
