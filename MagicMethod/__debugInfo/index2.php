<?php

/**
 * Class User
*/
class User
{
    /** @var string */
    protected $name = 'Alex';

    /**
     * Debug info must return an array data
     * @return array
    */
    public function __debugInfo()
    {
        return [
            'User'
        ];
    }
}

$user = new User();

var_dump($user);
