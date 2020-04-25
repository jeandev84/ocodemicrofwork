<?php

use Framework\Component\Validation\Validator;


require __DIR__.'/../vendor/autoload.php';


$validator = new Validator([
    'email' => [
        'jeanyao@ymail.com',
        'a'
    ]
]);


$validator->setRules([
    'email.*' => [
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

