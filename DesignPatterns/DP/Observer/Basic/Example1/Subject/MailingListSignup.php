<?php
namespace DP\Subject;

use DP\Contract\Observer;
use DP\Contract\SplSubject;


/**
 * Class MailingListSignup
 * @package DP\Subject
*/
class MailingListSignup implements  SplSubject
{

    /** @var array  */
    protected $observers = [];


    /** @var \DP\App\Entity\User  */
    protected $user;


    /**
     * MailingListSignup constructor.
     * @param \DP\App\Entity\User $user
    */
    public function __construct(\DP\App\Entity\User $user)
    {
         $this->user = $user;
    }

    /**
     * @param Observer $observer
     * @return mixed|void
    */
    public function attach(Observer $observer)
    {
         $this->observers[] = $observer;
    }


    /**
     * @param Observer $observer
     * @return mixed|void
     *
     * observers = [
     *  '0' => observe1,
     *  '1' => observe2,
     *  '2' => observe3
     * ];
    */
    public function detach(Observer $observer)
    {
         for ($i = 0; $i < count($this->observers); $i++)
         {
              if($this->observers[$i] == $observer)
              {
                    unset($this->observers[$i]);
              }

              $this->observers = array_values($this->observers);
         }
    }

    /**
     * @return mixed|void
    */
    public function notify()
    {
         foreach ($this->observers as $observer)
         {
             $observer->handle($this);
         }
    }


    /**
     * @return \DP\App\Entity\User
    */
    public function getUser()
    {
        return $this->user;
    }
}