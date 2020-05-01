<?php
namespace DP\Repository;


use DP\Entity\User;


/**
 * Class UserRepository
 * @package DP\Repository
*/
class UserRepository
{

    /**
     * @param string $email
     * @return string
     */
     public function getUserByEmail(string $email)
     {
         return true; // or return new User()
     }
}