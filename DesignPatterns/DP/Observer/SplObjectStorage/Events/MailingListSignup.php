<?php
namespace DP\Events;



use DP\Contract\Event;
use DP\User;


/**
 * Class MailingListSignup
 * @package DP\Events
*/
class MailingListSignup  extends Event
{

    public $user;


    /**
     * MailingListSignup constructor.
     * @param User $user
    */
    public function __construct(User $user)
    {
        parent::__construct();
        $this->user = $user;
    }
}

