<?php

/**
 * Class User
*/
class User
{

    /** @var array */
    protected $data = [];


    /**
     * User constructor.
     * @param array $data
    */
    public function __construct(array $data)
    {
       # Dynamically set property
       foreach ($data as $key => $value)
       {
            /* $this->{$key} = $value; Bad way!!! */
            $this->data[$key] = $value; // Good Way
       }
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


