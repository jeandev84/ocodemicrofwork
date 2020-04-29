<?php

use App\Auth\JwtAuth;
use App\Controllers\HomeController;
use App\Controllers\Auth\LoginController;
use App\Controllers\MeController;


# Home controller
$app->get('/', HomeController::class . ':index');


# Auth (Login)
$app->post('/auth/login', LoginController::class . ':index');


# Response (Auth)
$app->get('/me', MeController::class . ':index')
   ->add(new \App\Middleware\Authenticate($container->get(JwtAuth::class)));
