<?php

/**
 * Class User
*/
class User
{
    /** @var string */
    protected $name = 'Alex';
}

$user = new User();

var_dump($user);

/*
echo serialize($user) . "<br>";
var_dump(unserialize(serialize($user)));
*/