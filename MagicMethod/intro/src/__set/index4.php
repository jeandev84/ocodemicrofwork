<?php

class User
{
    protected $data = [];

    public function __construct($data)
    {
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }
    }

    public function __set($key, $value)
    {
        $this->data[$key] = $value;
    }
}

$user = new User([
    'email' => 'alex@codecourse.com',
    'name' => 'Alex Garrett-Smith'
]);

var_dump($user);

$user->email = 'dale@codecourse.com';

var_dump($user);