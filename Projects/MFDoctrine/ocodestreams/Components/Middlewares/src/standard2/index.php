<?php
use App\Core\App;


require_once __DIR__.'/vendor/autoload.php';

# instance of application
$middlewareStask = new \App\Core\Middleware\MiddlewareStack();
$app = new App($middlewareStask);

# add middlewares
$app->add(new \App\Middleware\FirstMiddleware());
$app->add(new \App\Middleware\SecondMiddleware());


# run application
$app->run();