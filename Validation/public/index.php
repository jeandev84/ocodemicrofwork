<?php

use Framework\Component\Validation\Rules\BetweenRule;
use Framework\Component\Validation\Rules\MaxRule;
use Framework\Component\Validation\Rules\RequiredRule;
use Framework\Component\Validation\Validator;


require __DIR__.'/../vendor/autoload.php';

$validator = new Validator([
    //'name' => 'Kouassi',
    'users' => [
       [
           'email' => 'jeanyao@ymail.com',
           'first_name' => 'Jean'
           /*
           'likes' => [
               'coding', 'reading'
           ]
           */
       ],
        [
            'email' => 'jeanyao',
            'first_name' => 'Brown'
        ],
        [
            'email' => '',
            'first_name' => 'Ashley'
        ]
    ]
]);


$validator->setRules([
   'users.*.email' => [
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