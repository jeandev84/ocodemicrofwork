<?php

require_once '../vendor/autoload.php';

$container = new \Slim\Container;

$container['db'] = function () {
    $dsn = 'mysql:host=localhost;dbname=ocode_restapi;charset=utf8';
    return new PDO($dsn, 'root', '');
};

$app = new \App\App($container);

/* dump($container['db']); */

# Load routes
require_once 'routes.php';
