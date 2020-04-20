<?php

/**
 * Class User
 */
class User
{
    public $email = 'joe@codecourse.com';
}

$user = new User();
$oldUser = clone $user;

$user->email = 'jeanyao@ymail.com';

var_dump("Email was changed from {$oldUser->email} to {$user->email}");


/*
var_dump($user);
var_dump($oldUser);

object(User)#1 (1) {
  ["email"]=>
  string(18) "joe@codecourse.com"
}
object(User)#2 (1) {
  ["email"]=>
  string(18) "joe@codecourse.com"
}
*/