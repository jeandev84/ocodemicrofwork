<?php

use Framework\Component\Validation\Rules\BetweenRule;
use Framework\Component\Validation\Rules\MaxRule;
use Framework\Component\Validation\Rules\RequiredRule;
use Framework\Component\Validation\Validator;


require __DIR__ . '/../vendor/autoload.php';

$validator = new Validator([
  'email' => '',
  'first_name' => 'Alexander'
]);



$validator->setRules([
   'email' => [
       'email', 'optional'
   ],
   'first_name' => [
       'optional',
       'max:5'
   ]
]);


if(! $validator->validate())
{
   dump($validator->getErrors());

}else {

   dump('Passed!');
}


/* dump($validator); */