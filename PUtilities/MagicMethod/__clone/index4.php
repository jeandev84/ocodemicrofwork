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
    protected $address;


    /**
     * User constructor.
     * @param Address $address
    */
    public function __construct(Address $address)
    {
        $this->address = $address;
    }
}

# Access By Reference
$address = new Address('24 Code Road');
$user = new User($address);

$address->line = 'A new address line';

var_dump($user);
