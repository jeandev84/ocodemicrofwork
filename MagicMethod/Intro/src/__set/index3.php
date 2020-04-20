<?php

class User
{
    protected $data = [
        'email' => 'alex@codecourse.com'
    ];

    public function __set($key, $value)
    {
        $this->data[$key] = $value;
    }
}

$user = new User();
$user->email = 'dale@codecourse.com';

var_dump($user);
