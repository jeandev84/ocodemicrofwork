<?php

class User
{ 
    protected $data = [
        'first_name' => 'Alex',
        'last_name' => 'Garrett-Smith',
    ];

    public function __get($key)
    {
        return $this->data[$key] ?? null;
    }

    public function fullName()
    {
        return trim($this->first_name . ' ' . $this->last_name);
    }
}

$user = new User();
var_dump($user->fullName());