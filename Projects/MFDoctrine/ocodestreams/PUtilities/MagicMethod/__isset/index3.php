<?php

/**
 * Class User
*/
class User
{
    /** @var array  */
    protected $data = [
        'email' => 'jeanyao@ymail.com'
    ];

    public function __isset($key)
    {
        return isset($this->data[$key]);
    }
}

$user = new User();
var_dump(isset($user->email));
var_dump(isset($user->first_name));