<?php

class User
{
    protected $data = [
        'email' => 'alex@codecourse.com'
    ];

    public function __isset($key)
    {
        return isset($this->data[$key]);
    }
}

$class = new User();

var_dump(isset($class->email));