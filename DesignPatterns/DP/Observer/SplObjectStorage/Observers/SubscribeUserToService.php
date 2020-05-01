<?php
namespace DP\Observers;


use SplSubject;

/**
 * Class SubscribeUserToService
 * @package DP\Observers
*/
class SubscribeUserToService implements \SplObserver
{

    public function update(SplSubject $event)
    {
        dump('Subscribe user to Mailchimp: '. $event->user->email);
    }
}