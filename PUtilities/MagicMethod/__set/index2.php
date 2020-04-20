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
     * @param $email
    */
    public function setEmail($email)
    {
          $this->data['email'] = $email;
    }
}

$user = new User();
$user->setEmail('dale@codecourse.com');

var_dump($user);
