<?php

use Framework\Component\Validation\Validator;


require __DIR__.'/../vendor/autoload.php';


$validator = new Validator([
    'users' => [
        [
            'email' => 'alex'
        ],
        [
            'email' => ''
        ]
    ]
]);


$validator->setRules([
    'users.*.email' => [
        'required',
        'email'
    ]
]);


if(! $validator->validate())
{
    dump($validator->getErrors());
}else{
    dump('Success');
}

