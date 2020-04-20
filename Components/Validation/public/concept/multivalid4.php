<?php

use Framework\Component\Validation\Rules\BetweenRule;
use Framework\Component\Validation\Rules\MaxRule;
use Framework\Component\Validation\Rules\RequiredRule;
use Framework\Component\Validation\Validator;


require __DIR__.'/../vendor/autoload.php';

$validator = new Validator([
    'emails' => [
        'boss@codecourse.com',
        'alex@codecourse.com'
    ]
]);



$validator->setRules([
    'emails.0' => [
        'required'
    ],
    'emails.*' => [
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