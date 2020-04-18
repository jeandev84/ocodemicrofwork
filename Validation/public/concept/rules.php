<?php

use Framework\Component\Validation\Validator;


require __DIR__.'/../vendor/autoload.php';

$validator = new Validator([
    'name' => 'Jean',
    'email' => ''
]);


$validator->setRules([
    'name' => [

    ],
    'email' => [
        //
    ]
]);



dump($validator);