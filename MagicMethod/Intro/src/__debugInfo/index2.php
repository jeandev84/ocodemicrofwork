<?php

class User
{
    protected $someOther = 'abc';

    protected $data = [
        'email' => 'alex@codecourse.com',
    ];

    public function __debugInfo()
    {
        return get_object_vars($this);
    }
}

$user = new User();

var_dump($user);
