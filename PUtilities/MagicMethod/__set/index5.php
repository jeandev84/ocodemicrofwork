<?php

/**
 * Class User
*/
class User
{

    /*
    protected $data = [
        'email' => 'joe@codecourse.com'
    ];
    */

    /** @var array */
    protected $data = [];


    /**
     * User constructor.
     * @param array $data
    */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @param $key
     * @param $value
    */
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


