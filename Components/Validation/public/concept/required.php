<?php

use Framework\Component\Validation\Rules\RequiredRule;
use Framework\Component\Validation\Validator;


require __DIR__.'/../vendor/autoload.php';

$validator = new Validator([
    'name' => 'Jean'
]);


$validator->setRules([
    'name' => [
        new RequiredRule()
    ]
]);

$validator->validate();
/*
if(! $validator->validate())
{

}else {

}
*/

/* dump($validator); */