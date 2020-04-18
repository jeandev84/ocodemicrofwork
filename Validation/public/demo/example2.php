<?php

use Framework\Component\Validation\Validator;


require __DIR__.'/../vendor/autoload.php';


$validator = new Validator([
    'email' => 'a'
]);

$validator->setAliases([
    'email' => 'Email address'
]);

$validator->setRules([
    'email' => [
        'optional',
        'email'
    ]
]);


if(! $validator->validate())
{
    dump($validator->getErrors());
}else{
    dump('Success');
}

