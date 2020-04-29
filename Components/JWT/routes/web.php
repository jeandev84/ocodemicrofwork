<?php

use App\Controllers\HomeController;
use App\Controllers\Auth\LoginController;


$app->get('/', HomeController::class . ':index');


# Auth
$app->post('/auth/login', LoginController::class . ':index');
