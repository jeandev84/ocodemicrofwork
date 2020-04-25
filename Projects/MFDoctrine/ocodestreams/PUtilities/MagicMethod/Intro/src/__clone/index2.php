<?php

class User
{

}

$user = new User();
$userTwo = clone $user;

var_dump($user);
var_dump($userTwo);