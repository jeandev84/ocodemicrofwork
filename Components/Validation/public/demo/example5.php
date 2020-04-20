<?php

use Framework\Component\Validation\Validator;


require __DIR__.'/../vendor/autoload.php';


$validator = new Validator([
    'emails' => [
        'alex@codecourse.com',
        'a',
        'b',
        ''
    ]
]);


$validator->setRules([
    # all email must to be an email address
    'emails' => [
        'email', 'optional'
    ],
    # The first email is required
    'emails.0' => [
        'required'
    ]
]);


if(! $validator->validate())
{
    dump($validator->getErrors());
}else{
    dump('Success');
}

