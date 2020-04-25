<?php

$container = new League\Container\Container();


# Set Autowiring (Injection automatique)
$container->delegate(
    new \League\Container\ReflectionContainer()
);

# Add Services Providers
$container->addServiceProvider(new App\Providers\AppServiceProvider());
$container->addServiceProvider(new App\Providers\ViewServiceProvider());
$container->addServiceProvider(new App\Providers\ConfigServiceProvider());

/* var_dump($container->get(League\Route\RouteCollection::class)); */
