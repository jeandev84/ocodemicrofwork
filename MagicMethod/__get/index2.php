<?php

/**
 * Class User
*/
class User
{

    /** @var string[]  */
    protected $data = [
       'email' => 'alex@codecourse.com'
    ];


    /**
     * @param $key
     * @return string|null
    */
    public function __get($key)
    {
        return $this->data[$key] ?? null;
    }
}

$user = new User();
var_dump($user->name); // NULL
var_dump($user->email); //