<?php


use src\util\Router;

require __DIR__ . '/vendor/autoload.php';

try {
    $requestUri = $_SERVER['REQUEST_URI'];
    $parsedUrl = parse_url($requestUri);
    $route = $parsedUrl['path'];
    $router = new Router;
    $router->run($route);
} catch (Exception $exception) {
    echo $exception;
}
