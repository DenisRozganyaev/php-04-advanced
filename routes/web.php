<?php

use Core\Router;

Router::add(
    '',
    [
        'controller' => \App\Controllers\FoldersController::class,
        'action' => 'index',
        'method' => 'GET'
    ]);

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
        'method' => 'GET'
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

/**
 * Folders
 */

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

Router::add(
    'folders/{id:\d+}/edit',
    [
        'controller' => \App\Controllers\FoldersController::class,
        'action' => 'edit',
        'method' => 'GET'
    ]
);

Router::add(
    'folders/{id:\d+}/update',
    [
        'controller' => \App\Controllers\FoldersController::class,
        'action' => 'update',
        'method' => 'POST'
    ]
);

Router::add(
    'folders/{id:\d+}/destroy',
    [
        'controller' => \App\Controllers\FoldersController::class,
        'action' => 'destroy',
        'method' => 'POST'
    ]
);

/**
 * Notes
 */

Router::add(
    'notes/{id:\d+}',
    [
        'controller' => \App\Controllers\NotesController::class,
        'action' => 'show',
        'method' => 'GET'
    ]
);

Router::add(
    'notes/create',
    [
        'controller' => \App\Controllers\NotesController::class,
        'action' => 'create',
        'method' => 'GET'
    ]
);

Router::add(
    'notes/store',
    [
        'controller' => \App\Controllers\NotesController::class,
        'action' => 'store',
        'method' => 'POST'
    ]
);

Router::add(
    'notes/{id:\d+}/edit',
    [
        'controller' => \App\Controllers\NotesController::class,
        'action' => 'edit',
        'method' => 'GET'
    ]
);

Router::add(
    'notes/{id:\d+}/update',
    [
        'controller' => \App\Controllers\NotesController::class,
        'action' => 'update',
        'method' => 'POST'
    ]
);

Router::add(
    'notes/{id:\d+}/destroy',
    [
        'controller' => \App\Controllers\NotesController::class,
        'action' => 'destroy',
        'method' => 'POST'
    ]
);
