<?php
use App\Session\Contracts\SessionStore;
use App\Views\View;


session_start();

require_once __DIR__.'/../vendor/autoload.php';

# Get environment
try {

    // $dotenv = (new \Dotenv\Dotenv(base_path()))->load();
    $dotenv = \Dotenv\Dotenv::create(base_path());

} catch (\Dotenv\Exception\InvalidPathException $e) {

}


# Container Dependency Injection
require_once base_path('bootstrap/container.php');

/*
dump(\App\Models\Eloquent\User::find(1));
dump(\App\Models\Eloquent\User::find(1)->name);
dump(\App\Models\Eloquent\User::where('email', 'jeanyao@ymail.com')->first()->name);
*/


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
