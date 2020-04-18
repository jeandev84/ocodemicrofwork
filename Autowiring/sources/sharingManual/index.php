<?php

require_once __DIR__.'/vendor/autoload.php';

$container = new \Framework\Container\Container();

/*
$container->set('config', function () {
    return new Framework\Config\Config();
});

dump($container->get('config'));
dump($container->has('config'));
dump($container->get('fake'));
dump($container->config);
dump($container->config->get('app.name'));
dump($container->config->get('app.name'));
*/


$container->share('config', function () {
    return new Framework\Config\Config();
});

/* dump($container->config->get('app.name')); */


$container->share('database', function ($container) {

    return new \Framework\Database\Database($container->config);
});

/* dump($container->database->connect()); */


dump((new App\Controllers\HomeController($container->config, $container->database))->index());



