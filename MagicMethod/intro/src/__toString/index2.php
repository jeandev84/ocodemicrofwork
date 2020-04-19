<?php

class User
{
    protected $data = [
        'email' => 'alex@codecourse.com',
        'name' => 'Alex Garrett-Smith',
    ];

    public function __toString()
    {
        return $this->toJson();
    }

    public function toJson()
    {
        return json_encode($this->data);
    }
}

$user = new User();

echo $user;