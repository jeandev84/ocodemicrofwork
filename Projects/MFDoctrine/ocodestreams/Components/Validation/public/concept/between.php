<?php

use Framework\Component\Validation\Rules\BetweenRule;
use Framework\Component\Validation\Rules\MaxRule;
use Framework\Component\Validation\Rules\RequiredRule;
use Framework\Component\Validation\Validator;


require __DIR__.'/../vendor/autoload.php';

$validator = new Validator([
    'first_name' => 'Alex'
]);


$validator->setRules([
    'first_name' => [
        'required',
        'max:5', #or new MaxRule(5)
        'between:5,10', # or (new BetweenRule(5, 10))
    ]
]);


if(! $validator->validate())
{
    dump($validator->getErrors());

}else {

    dump('Passed!');
}


/* dump($validator); */