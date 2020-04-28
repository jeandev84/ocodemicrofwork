<?php

require_once '../vendor/autoload.php';

$container = new \Slim\Container;

$container['db'] = function () {
    $dsn = 'mysql:host=localhost;dbname=ocode_restapi;charset=utf8';
    return new PDO($dsn, 'root', '');
};

/* dump($container['db']); */

$app = new \App\App($container);

// Add Middleware
$app->add(new App\Middleware\JsonResponseMiddleware());



# Load routes
require_once 'routes.php';
