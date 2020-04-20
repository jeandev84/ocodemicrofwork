<?php

class User
{
    public $email = 'alex@codecourse.com';
}

$user = new User();
$oldUser = clone $user;

$user->email = 'billy@codecourse.com';

var_dump("Email was changed from {$oldUser->email} to {$user->email}");
