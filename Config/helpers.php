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

function currentLink(string $path): bool
{
    return trim($_SERVER['REQUEST_URI'], '/') === $path;
}

function redirect(string $path = ''): void
{
    header('Location: ' . url($path));
    exit;
}

function redirectBack(string $path = ''): void
{
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

function showInputError(string $key, array $errors = []): string
{
    return !empty($errors[$key])
        ? sprintf('<div class="mb-3 alert alert-danger" role="alert">%s</div>', $errors[$key])
        : '';
}
