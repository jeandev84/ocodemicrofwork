<?php

use Framework\Component\Validation\Rules\BetweenRule;
use Framework\Component\Validation\Rules\MaxRule;
use Framework\Component\Validation\Rules\RequiredRule;
use Framework\Component\Validation\Validator;


require __DIR__.'/../vendor/autoload.php';

$validator = new Validator([
    'first_name' => '',
    'email' => ''
]);


$validator->setAliases([
    'first_name' => 'First name',
    'email' => 'Email address'
]);


$validator->setRules([
    'first_name' => [
        'required',
        'between:5,10',
    ],
    'email' => [
        'required',
        'email'
    ]
]);


if(! $validator->validate())
{
    dump($validator->getErrors());

}else {

    dump('Passed!');
}


/* dump($validator); */