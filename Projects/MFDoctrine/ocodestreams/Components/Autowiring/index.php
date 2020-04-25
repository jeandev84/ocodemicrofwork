<?php

use App\Controllers\HomeController;
use Framework\Config\Config;
use Framework\Database\Database;

require_once __DIR__ . '/vendor/autoload.php';

$container = new \Framework\Container\Container();

/*
$container->share(\Framework\Database\Database::class, function ($container) {
    return new Database($container->get(Config::class));
});

dump((new App\Controllers\HomeController($container->get(Config::class), $container->get(Database::class)))->index());
*/

# Autowiring process resolving paramater not shared
// dump($container->get(HomeController::class)->index());


# Autowiring process resolving paramater already shared
$container->share(\Framework\Database\Database::class, function ($container) {
    return new Database($container->get(Config::class));
});


dump($container->get(HomeController::class)->index());





