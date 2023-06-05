<?php
use Core\Router;

// notes/4/edit
Router::add(
    'notes/{id:\d+}/edit',
    [
        'controller' => \App\Controllers\NotesController::class,
        'action' => 'edit',
        'method' => 'GET'
    ]
);