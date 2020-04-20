<?php

class User
{ 
    protected $data = [
        'email' => 'alex@codecourse.com'
    ];

    public function __get($key)
    {
        return $this->data[$key] ?? null;
    }
}

$user = new User();
var_dump($user->email);