<?php

class User
{
    protected $firstname = 'Alex';

    /**
     * @return string
    */
    public function getFirstName()
    {
        return $this->firstname;
    }

    /**
     * User constructor.
     * @param string $firstname
     *
     * Example Constructor set something out
    */
    public function __construct($firstname = 'Alex')
    {
        $this->firstname = $firstname;
    }
}


$user = new User('Brown');
echo $user->getFirstName() ."\n"; // Brown