<?php

/**
 * Class Address
 */
class Address
{
    public $line;


    /**
     * Address constructor.
     */
    public function __construct($line)
    {
        $this->line = $line;
    }
}


/**
 * Class User
 */
class User
{

    /** @var Address  */
    public $address;


    /**
     * User constructor.
     * @param Address $address
     */
    public function __construct(Address $address)
    {
        $this->address = $address;
    }

    public function __clone()
    {
        # Clone address to origin address
        $this->address = clone $this->address;
    }
}


# Access By Reference
$address = new Address('24 Code Road');
$user = new User($address);
$clonedUser = clone $user;

$address->line = 'A new address line';

# string(59) "Address was changed from 24 Code Road to A new address
var_dump("Address was changed from {$clonedUser->address->line} to {$user->address->line}");


/*
var_dump($user);
object(User)#2 (1) {
  ["address":protected]=>
  object(Address)#1 (1) {
    ["line"]=>
    string(18) "A new address line"
  }
}
==================================
var_dump($user);
var_dump($clonedUser);

object(User)#2 (1) {
  ["address":protected]=>
  object(Address)#1 (1) {
    ["line"]=>
    string(18) "A new address line"
  }
}
object(User)#3 (1) {
  ["address":protected]=>
  object(Address)#4 (1) {
    ["line"]=>
    string(12) "24 Code Road"
  }
}

*/
