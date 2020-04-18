<?php

use Framework\Component\Validation\Rules\EmailRule;
use Framework\Component\Validation\Rules\RequiredRule;
use Framework\Component\Validation\Validator;


require __DIR__.'/../vendor/autoload.php';

$validator = new Validator([
    'first_name' => 'Jean',
    'email' => 'jeanyao@ymail.com'
]);


$validator->setRules([
   'first_name' => [
       new RequiredRule()
   ],
   'email' => [
        new RequiredRule(),
        new EmailRule()
   ]
]);


if(! $validator->validate())
{
   dump($validator->getErrors());

}else {

   dump('Passed!');
}


/* dump($validator); */