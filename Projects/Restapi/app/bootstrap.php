<?php

require_once '../vendor/autoload.php';

$container = new \Slim\Container;

$container['db'] = function () {
    return 'db';
};

$app = new \App\App($container);

require_once 'routes.php';
