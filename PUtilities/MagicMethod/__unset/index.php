<?php

/**
 * Class User
*/
class User
{

    /** @var array  */
    protected $data = [];

    /**
     * @param $key
     * @param $value
    */
    public function __set($key, $value)
    {
        $this->data[$key] = $value;
    }

    /**
     * @param $key
     * @return bool
    */
    public function __isset($key)
    {
       return isset($this->data[$key]);
    }

    /**
     * @param $key
    */
    public function __unset($key)
    {
        unset($this->data[$key]);
    }
}

$user = new User();

# Set property or data
$user->name = 'Alex';

# Isset property
var_dump(isset($user->name));
echo "\n";
var_dump(isset($user->email));

var_dump($user);

# Unset property (remove property name)
unset($user->name);

var_dump($user);