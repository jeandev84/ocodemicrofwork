<?php

class Address
{
    public $line;

    public function __construct($line)
    {   
        $this->line = $line;
    }
}

class User
{
    public $address;

    public function __construct(Address $address)
    {
        $this->address = $address;
    }

    public function __clone()
    {
        $this->address = clone $this->address;
    }
}

$address = new Address('24 Code Road');
$user = new User($address);
$clonedUser = clone $user;

$address->line = 'A new address line';

var_dump("Address was changed from {$clonedUser->address->line} to {$user->address->line}");