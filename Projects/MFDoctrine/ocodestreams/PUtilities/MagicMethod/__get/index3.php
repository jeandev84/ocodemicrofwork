<?php

/**
 * Class User
*/
class User
{

    /** @var string[]  */
    protected $data = [
       'first_name' => 'Alex',
       'last_name'  => 'Garrett-Smith'
    ];

    /**
     * @param $key
     * @return string
    */
    public function __get($key)
    {
        return $this->data[$key] ?? null;
    }

    /**
     * @return string
    */
    public function fullName()
    {
        /* return trim($this->data['first_name'] . ' '. $this->data['last_name']); */
        return trim($this->first_name . ' '. $this->last_name);
    }

}

$user = new User();
var_dump($user->fullName());
var_dump($user->fullName);