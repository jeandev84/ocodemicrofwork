<?php

use Framework\Component\Validation\Rules\RequiredRule;
use Framework\Component\Validation\Validator;


require __DIR__.'/../vendor/autoload.php';

$validator = new Validator([
    'first_name' => 'Jean',
    'email' => 'jeanyao@ymail.com'
]);


$validator->setRules([
    'first_name' => [
        'required'
    ],
    'email' => [
        new RequiredRule(),
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