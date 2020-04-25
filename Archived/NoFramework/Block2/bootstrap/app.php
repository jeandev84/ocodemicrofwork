<?php
use App\Session\Contracts\SessionStore;
use App\Views\View;


session_start();

require_once __DIR__.'/../vendor/autoload.php';


###### Kernel ######

# Environement application
try {

    $dotenv = (new \Dotenv\Dotenv(base_path()))->load();

} catch (\Dotenv\Exception\InvalidPathException $e) {

}

# Container Dependency Injection
require_once base_path('bootstrap/container.php');



# Session from container
/* $session = $container->get(SessionStore::class); */

# Route collection from container
$route = $container->get(League\Route\RouteCollection::class);

# Middleware stated before routes
require_once base_path('bootstrap/middleware.php');

require_once base_path('routes/web.php');



# Entry Point of Application handle()
try {

    $response = $route->dispatch(
        $container->get('request'), $container->get('response')
    );

} catch (Exception $e) {
    # dump($e);
    # terminate() Get Errors
    $handler = new \App\Exceptions\ErrorHandler(
        $e,
        $container->get(SessionStore::class),
        $container->get('response'),
        $container->get(View::class)
    );
    $response = $handler->respond();
}
