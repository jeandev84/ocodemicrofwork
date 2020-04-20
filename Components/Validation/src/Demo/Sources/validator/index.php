<?php

use App\Validation\Validator;
use App\Validation\Rules\EmailRule;
use App\Validation\Rules\RequiredRule;

require_once 'vendor/autoload.php';

$validator = new Validator([
    'emails' => [
        'alex@codecourse.com',
        'a',
        'b'
    ]
]);

$validator->setRules([
    'emails.*' => [
        'email', 'optional'
    ],
    'emails.0' => [
        'required'
    ]
]);

if (!$validator->validate()) {
    dump($validator->getErrors());
} else {
    dump('Success');
}