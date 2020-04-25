<?php

use Framework\Component\Validation\Validator;


require __DIR__.'/../vendor/autoload.php';


$validator = new Validator([
    'email' => 'a'
]);

/*
$validator = new Validator([
    'email' => 'jeanyao@ymail.com'
]);

$validator->setRules([
    'email' => [
        new RequiredRule(),
        new EmailRule(),
    ]
]);

$validator->setRules([
    'email' => [
         'required',
         'email',
         'max:5',
         'between:1,10'
    ]
]);

$validator->setRules([
    'email' => [
         'optional',
         'email'
    ]
]);
*/

if(! $validator->validate())
{
    dump($validator->getErrors());
}else{
    dump('Success');
}

