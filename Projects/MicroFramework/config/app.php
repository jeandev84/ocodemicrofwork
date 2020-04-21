<?php

/*
Example Get a short name from config
return [
   'name' => [
       'short' => getenv('APP_NAME')
   ]
];
*/

return [
    'name' => env('APP_NAME'),
    'debug' => env('APP_DEBUG', false),

    'providers' => [
        'App\Providers\AppServiceProvider',
        'App\Providers\ViewServiceProvider',
        'App\Providers\DatabaseServiceProvider',
        'App\Providers\SessionServiceProvider',
        'App\Providers\ViewShareServiceProvider',
        'App\Providers\HashServiceProvider'
     ],

    'middlewares' => [
        'App\Middleware\ShareValidationErrors',
        'App\Middleware\ClearValidationErrors',
    ]
];