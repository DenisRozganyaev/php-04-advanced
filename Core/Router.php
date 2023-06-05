<?php

namespace Core;

class Router
{
    static protected array $routes = [], $params = [];
    static protected array $convertTypes = [
        'd' => 'int'
    ];

    // notes/{id: \d+}/edit
    static public function add(string $route, array $params = []): void
    {
        $route = preg_replace('/\//', '\\/', $route);
        $route = preg_replace('/\{([a-z_]+):([^}]+)}/', '(?P<$1>$2)', $route);
        $route = "/^{$route}$/i";

        dd($route);
        static::$routes[$route] = $params;
    }

    // notes/{id: \d+}/edit
    // notes/5/edit
    /**
     * [
     *  'controller' => '',
     *  'action' => '',
     *  'method' => 'GET',
     *  'id' => 5
     * ]
     * @param string $url
     * @return void
     */
    static public function dispatch(string $url)
    {
        d($url);
        $url = static::removeQueryVariables($url);
        $url = trim($url, '/');
        dd($url);
    }

    static protected function removeQueryVariables(string $url): string
    {
        // notes/5/edit(?var=value&) => notes/5/edit
        return preg_replace('/([\w\/]+)\?([\w\/=\d]+)/i', '$1', $url);
    }
}
