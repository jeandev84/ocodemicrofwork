<?php

/**
 * Class User
*/
class User
{

}

$user = new User();
$userTwo = new User();

/*
var_dump($user);
var_dump($userTwo);
object(User)#1 (0) {
}
object(User)#2 (0) {
}
*/

var_dump($user);
var_dump($user);

/*
object(User)#1 (0) {
}
object(User)#1 (0) {
}
*/