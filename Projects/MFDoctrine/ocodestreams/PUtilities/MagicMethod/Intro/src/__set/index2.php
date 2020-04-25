<?php

class User
{
    protected $data = [
        'email' => 'alex@codecourse.com'
    ];

    public function set($key, $value)
    {
        $this->data[$key] = $value;
    }
}

$user = new User();
$user->set('email', 'dale@codecourse.com');

var_dump($user);
