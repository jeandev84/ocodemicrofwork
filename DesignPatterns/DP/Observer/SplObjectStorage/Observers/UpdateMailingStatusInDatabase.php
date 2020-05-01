<?php
namespace DP\Observers;


use SplSubject;

/**
 * Class UpdateMailingStatusInDatabase
 * @package DP\Observers
*/
class UpdateMailingStatusInDatabase implements \SplObserver
{

    public function update(SplSubject $event)
    {
        dump('Update user in db. '. $event->user->id);
    }
}