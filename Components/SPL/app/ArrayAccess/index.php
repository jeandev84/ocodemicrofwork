<?php


require __DIR__.'/../vendor/autoload.php';

/*
$container = new \Framework\DI\Container();

$container->bind('config', function () {
    return [
       'db_host' => '127.0.0.1',
       'db_name' => 'project',
       'db_user' => 'root',
       'db_password' => '',
       'db_options' => []
    ];
});

dump($container->get('config'));

// echo $container['config'];

*/

$container = new \Framework\DI\Container();
$container['config'] = function () {

    return [
        'db_host' => '127.0.0.1',
        'db_name' => 'project',
        'db_user' => 'root',
        'db_password' => '',
        'db_options' => []
    ];

};

dump($container['config']);

dump($container);