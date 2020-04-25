<?php

use Framework\Component\Validation\Rules\BetweenRule;
use Framework\Component\Validation\Rules\MaxRule;
use Framework\Component\Validation\Rules\RequiredRule;
use Framework\Component\Validation\Validator;


require __DIR__.'/../vendor/autoload.php';

$validator = new Validator([
    'first_name' => '',
    'middle_name' => '',
    'last_name' => 'Garrett',
]);


$validator->setRules([
    'first_name' => [
        'required',
        'required_with:last_name,middle_name'
    ],
    'last_name' => [
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