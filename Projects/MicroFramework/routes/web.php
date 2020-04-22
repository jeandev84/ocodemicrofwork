<?php

/*
$route->get('/', 'App\Controllers\HomeController::index')
      ->setName('home');

$route->get('/', function ($request, $response) use ($container){
    return (new App\Controllers\HomeController($container->get(App\Views\View::class)))->index($request, $response);
})->setName('home');
*/

$route->get('/', 'App\Controllers\HomeController::index')
      ->setName('home');


$route->group('/auth', function ($route)  {

    $route->get('/signin', 'App\Controllers\Auth\LoginController::index')->setName('auth.login');
    $route->post('/signin', 'App\Controllers\Auth\LoginController::signin');


    $route->post('/logout', 'App\Controllers\Auth\LogoutController::logout')->setName('auth.logout');

    $route->get('/register', 'App\Controllers\Auth\RegisterController::index')->setName('auth.register');
    $route->post('/register', 'App\Controllers\Auth\RegisterController::register');
});


