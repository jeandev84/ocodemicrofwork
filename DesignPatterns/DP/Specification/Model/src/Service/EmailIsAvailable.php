<?php
namespace DP\Service;


use DP\Repository\UserRepository;

/**
 * Class EmailIsAvailable
 * @package DP\Service
 */
class EmailIsAvailable
{

     /**
      * @var UserRepository
     */
      protected $repository;

     /**
      * EmailIsAvailable constructor.
      * @param UserRepository $repository
      */
      public function __construct(UserRepository $repository)
      {
           $this->repository = $repository;
      }


      /**
       * @param $email
       * @return bool
      */
      public function isSatisfiedBy($email)
      {
          if($this->repository->getUserByEmail($email))
          {
              return false;
          }

          return true;
      }
}