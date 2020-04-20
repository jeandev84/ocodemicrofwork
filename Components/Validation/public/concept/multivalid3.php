<?php

use Framework\Component\Validation\Rules\BetweenRule;
use Framework\Component\Validation\Rules\MaxRule;
use Framework\Component\Validation\Rules\RequiredRule;
use Framework\Component\Validation\Validator;


require __DIR__.'/../vendor/autoload.php';

$validator = new Validator([
    'users' => [
        [
            'email' => 'jeanyao@ymail.com',
            'first_name' => 'Jean'
        ],
        [
            'email' => 'brown@site.com',
            'first_name' => 'Brown'
        ],
        [
            'email' => 'joe@fgos.ru',
            'first_name' => 'Doe'
        ]
    ]
]);



$validator->setRules([
    'users.*.email' => [
        'required',
        'email'
    ],
    'users.*.first_name' => [
        'required'
    ]
]);


if(! $validator->validate())
{
    dump($validator->getErrors());

}else {

    dump('Passed!');
}


/* dump($validator); */