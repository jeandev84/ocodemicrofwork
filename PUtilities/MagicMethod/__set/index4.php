<?php

/**
 * Class User
*/
class User
{
    /** @var string[]  */
    protected $data = [
        'email' => 'joe@codecourse.com'
    ];

    /**
     * @param $key
     * @param $value
    */
    public function set($key, $value)
    {
          $this->data[$key] = $value;
    }


    /**
     * @param $name
     * @param $value
    */
    public function __set($key, $value)
    {
        $this->set($key, $value);
    }
}

$user = new User();
$user->email = 'dale@codecourse.com';

var_dump($user);



/**
 * Class Resource
 */
class Resource
{
    /** @var string[]  */
    protected $data = [
        'view' => '/resources/views/'
    ];


    /**
     * @param $name
     * @param $value
     */
    public function __set($key, $value)
    {
        $this->data[$key] = $value;
    }
}

$resource = new Resource();
$resource->view = '/templates/views/';

var_dump($resource);
