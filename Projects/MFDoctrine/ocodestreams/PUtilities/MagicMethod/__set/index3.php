<?php

/**
 * Class User
*/
class User
{
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


}

$user = new User();
$user->set('email', 'somebody@codecourse.com');

var_dump($user);
