<?php

use Core\Router;

//
//// notes/4/edit
//Router::add(
//    'notes/{id:\d+}/edit',
//    [
//        'controller' => \App\Controllers\NotesController::class,
//        'action' => 'edit',
//        'method' => 'get'
//    ]
//);

Router::add(
    'login',
    [
        'controller' => \App\Controllers\AuthController::class,
        'action' => 'login',
        'method' => 'GET'
    ]
);
Router::add(
    'logout',
    [
        'controller' => \App\Controllers\AuthController::class,
        'action' => 'logout',
        'method' => 'POST'
    ]
);
Router::add(
    'register',
    [
        'controller' => \App\Controllers\AuthController::class,
        'action' => 'register',
        'method' => 'GET'
    ]
);
Router::add(
    'auth/signup',
    [
        'controller' => \App\Controllers\AuthController::class,
        'action' => 'signup',
        'method' => 'POST'
    ]
);
Router::add(
    'auth/verify',
    [
        'controller' => \App\Controllers\AuthController::class,
        'action' => 'verify',
        'method' => 'POST'
    ]
);

Router::add(
    'dashboard',
    [
        'controller' => \App\Controllers\FoldersController::class,
        'action' => 'index',
        'method' => 'GET'
    ]
);

Router::add(
    'folders/{id:\d+}',
    [
        'controller' => \App\Controllers\FoldersController::class,
        'action' => 'show',
        'method' => 'GET'
    ]
);

Router::add(
    'folders/create',
    [
        'controller' => \App\Controllers\FoldersController::class,
        'action' => 'create',
        'method' => 'GET'
    ]
);

Router::add(
    'folders/store',
    [
        'controller' => \App\Controllers\FoldersController::class,
        'action' => 'store',
        'method' => 'POST'
    ]
);
