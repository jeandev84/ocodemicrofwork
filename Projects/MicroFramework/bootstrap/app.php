<?php
session_start();

require_once __DIR__.'/../vendor/autoload.php';


/*
 * Kernel
*/

try {

    $dotenv = (new \Dotenv\Dotenv(base_path()))->load();

} catch (\Dotenv\Exception\InvalidPathException $e) {

}


$arrayLoader = new \App\Config\Loaders\ArrayLoader([
    'app' => base_path('config/app.php'),
    'cache' => base_path('config/cache.php'),
]);

/* dump($arrayLoader->parse()); */

$config = new App\Config\Config();
$config->load([$arrayLoader]);

/* dump($config->get('app.name.short')); */
dump($config->get('app.name.long', 'Codecourse'));


die;
require_once base_path('bootstrap/container.php');

$route = $container->get(League\Route\RouteCollection::class);


require_once base_path('routes/web.php');

$response = $route->dispatch(
    $container->get('request'), $container->get('response')
);


/* return $response; */