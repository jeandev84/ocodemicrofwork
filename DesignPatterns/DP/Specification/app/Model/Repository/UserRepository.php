<?php
namespace DP\Repository;


use DP\Entity\User;


/**
 * Class UserRepository
 * @package DP\Repository
*/
class UserRepository
{

    /** @var  */
    protected $user;


    /**
     * UserRepository constructor.
     * @param $user
    */
    public function __construct(User $user)
    {
         $this->user = $user;
    }

     /**
      * @return string
     */
     public function getUserByEmail(string $email)
     {
         return $this->user->where('email', $email);
     }
}