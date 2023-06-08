<?php

use Config\Config;

function config(string $name): string|null
{
    return Config::get($name);
}

function view(string $view, array $args = [])
{
    \Core\View::render($view, $args);
}

function url(string $path = ''): string
{
    return SITE_URL . '/' . $path;
}

function redirect(string $path = ''): void
{
    header('Location: ' . url($path));
    exit;
}
