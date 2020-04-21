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


require_once base_path('bootstrap/container.php');


$route = $container->get(League\Route\RouteCollection::class);


require_once base_path('routes/web.php');

# Entry Point of Application
try {

    $response = $route->dispatch(
        $container->get('request'), $container->get('response')
    );

} catch (Exception $e) {

    dump($e);
    die;
}
