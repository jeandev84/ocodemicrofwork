<?php
namespace DP\Subject;

use DP\Contract\Observer;
use DP\Contract\SplSubject;
use DP\Subject\Traits\Subjectable;


/**
 * Class MailingListSignup
 * @package DP\Subject
*/
class MailingListSignup implements  SplSubject
{

    use Subjectable;


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
     * @return \DP\App\Entity\User
    */
    public function getUser()
    {
        return $this->user;
    }
}