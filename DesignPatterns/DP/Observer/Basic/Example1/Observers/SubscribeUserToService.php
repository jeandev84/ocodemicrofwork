<?php
namespace DP\Observers;


use DP\Contract\Observer;


/**
 * Class SubscribeUserToService
 * @package DP\Observers
*/
class SubscribeUserToService implements Observer
{

    /**
     * @param $event
     * @return mixed|void
    */
    public function handle($event)
    {
         dump('Subscribe user to Mailchimp : ' . $event->getUser()->email);
    }
}