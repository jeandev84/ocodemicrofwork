<?php

require __DIR__.'/helpers/functions.php';
require __DIR__ . '/../vendor/autoload.php';


$app = new \Framework\App();

$container = $app->getContainer();


# Sharing
$container['errorHandler'] = function () {
    /* die('404'); */

    return function ($response) {
        /* dump($response, true); */
        return $response->setBody('Page not found')
            ->withStatus(404);
    };
};


$container['config'] = function () {
    return [
        'db_driver' => 'mysql',
        'db_host'   => 'localhost',
        'db_name'   => 'ocode_mini_framework',
        'db_user'   => 'root',
        'db_pass' => '',
        'db_charset' => 'utf8'
    ];
};


$container['db'] = function ($c) {

    return new \PDO(
        sprintf('%s:host=%s;dbname=%s;charset=%s',
            $c->config['db_driver'],
            $c->config['db_host'],
            $c->config['db_name'],
            $c->config['db_charset']
        ),
        $c->config['db_user'],
        $c->config['db_pass']
    );
};


# Routing
/*
$app->get('/', function () {
   echo  'Home';
});


$app->post('/signup', function () {
    echo  'Users';
});



$app->map('/users', function () {
    echo  'Users';
}, ['GET', 'POST']);


Example 1:
$app->get('/', [App\Controllers\HomeController::class, 'index']);
$app->get('/', [new App\Controllers\HomeController(), 'index']);


Example 2:
$app->get('/', [App\Controllers\HomeController::class, 'index']);
$app->get('/home', [App\Controllers\HomeController::class, 'home']);

$app->get('/', [new App\Controllers\DemoController($container->db), 'index']);
*/


$app->get('/', [new App\Controllers\HomeController($container->db), 'index']);

/*
$app->get('/home', function ($response) {
   debug($response, true);
});
*/


# Run application
$app->run();
